<?php
/**
 * This script is used for getting a video.
 * If called with method POST and correct variables (see docs), you can upload a video on our system.
 * 
 * You need to be logged in (api/user/login.php) to use this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';

session_start();

header("Access-Control-Allow-Origin: ".Config::AccessControlAllowOrigin);
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->title)                               // If correct variables is given.
    && isset($json->description)
    && isset($json->topic)
    && isset($json->course_code)) {
    
    // Check if video is given:
    if (isset($_FILES['video']) && isset($_FILES['thumbnail'])) {
        if (isset($_SESSION['uid'])) {                                      // If logged in.
            $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));  //Get info about user.
            if ($user['status'] == "ok" && $user['privilege_level'] >= 1) {     // If gotten info about user and users privilege-level is teacher or above.
                $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
                $result = $videoManager->upload()  (                            // Update video info.
                    htmlspecialchars($json->title),
                    htmlspecialchars($json->description),
                    htmlspecialchars($_SESSION['uid']),
                    htmlspecialchars($json->topic),
                    htmlspecialchars($json->course_code),
                    htmlspecialchars($_FILES['video']),
                    htmlspecialchars($_FILES['thumbnail']));    
                
                echo json_encode($result);                          // Return.
            }
            else {
                echo json_encode(array("status" => "fail", "errorMessage" => "You need to be privilege teacher or above to upload video"));
            }
        }
        else {                                          // If not correct api-key, give error.
            echo json_encode(array("status" => "fail", "errorMessage" => "You need to be logged in to upload video"));
        }
    }
    else {
        echo json_encode(array("status" => "fail", "errorMessage" => "No video or thumbnail given"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>