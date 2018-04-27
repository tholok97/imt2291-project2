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

setApiHeaders("POST");

print_r($_POST);

// Check if correct information is given:
if (isset($_POST['vid'])
    && isset($_POST['title'])
    && isset($_POST['description'])
    && isset($_POST['topic'])
    && isset($_POST['course_code'])
    && isset($_POST['thumbnail'])) {
    
    if (isset($_SESSION['uid'])) {                                    // If logged in.
        $userManager = new UserManager(DB::getDBConnection());        // Start a new videomanager-instance.
        $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));  //Get info about user.
        if ($user['status'] == "ok" && $user['privilege_level'] >= 1) {     // If gotten info about user and users privilege-level is teacher or above.
            $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
            if (isset($_FILES['subtitles'])) {                              // If subtitles is set.
                $result = $videoManager->update(                            // Update video info.
                    htmlspecialchars($_POST['vid']),
                    htmlspecialchars($_SESSION['uid']),
                    htmlspecialchars($_POST['title']),
                    htmlspecialchars($_POST['description']),
                    htmlspecialchars($_POST['topic']),
                    htmlspecialchars($_POST['course_code']),
                    $_POST['thumbnail'],
                    $_FILES['subtitles']
                );
            }
            else {
                $result = $videoManager->update(                            // Update video info.
                    htmlspecialchars($_POST['vid']),
                    htmlspecialchars($_SESSION['uid']),
                    htmlspecialchars($_POST['title']),
                    htmlspecialchars($_POST['description']),
                    htmlspecialchars($_POST['topic']),
                    htmlspecialchars($_POST['course_code']),
                    $_POST['thumbnail'],
                    null
                );
            }
                
        
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