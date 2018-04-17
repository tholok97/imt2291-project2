<?php
/**
 * This script is used for getting a video.
 * If called with method POST and correct variables (see docs), you can update a video on our system.
 * 
 * You need to be logged in (api/user/login.php) to use this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders();

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->vid)
    && isset($json->title)
    && isset($json->description)
    && isset($json->topic)
    && isset($json->course_code)) {
    
    if (isset($_SESSION['uid'])) {                                    // If logged in.
        $userManager = new UserManager(DB::getDBConnection());        // Start a new videomanager-instance.
        $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));  //Get info about user.
        if ($user['status'] == "ok" && $user['privilege_level'] >= 1) {     // If gotten info about user and users privilege-level is teacher or above.
            $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
            $result = $videoManager->update(                            // Update video info.
                htmlspecialchars($json->vid),
                htmlspecialchars($_SESSION['uid']),
                htmlspecialchars($json->title),
                htmlspecialchars($json->description),
                htmlspecialchars($json->topic),
                htmlspecialchars($json->course_code));    
        
            echo json_encode($result);                          // Return.
        }
        else {
            echo json_encode(array("status" => "fail", "errorMessage" => "You are not privilege enough to update a video."));
        }
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "You need to be logged in to be able to update a video."));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>