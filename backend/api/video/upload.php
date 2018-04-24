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
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST");

// Get json as string and convert it to a object:
/*$json_str = file_get_contents('php://input');
$json = json_decode($json_str);*/


// Check if correct information is given:
if (isset($_POST['title']) && $_POST['title'] != ""                               // If correct variables is given.
    && isset($_POST['description']) && $_POST['description'] != "" 
    && isset($_POST['topic']) && $_POST['topic'] != ""
    && isset($_POST['course_code']) && $_POST['course_code'] != ""
    && isset($_POST['thumbnail']) && $_POST['thumbnail'] != "") {
    
    // Check if video is given:
    if (isset($_FILES['video'])) {
        if (isset($_SESSION['uid'])) {                                      // If logged in.
            $userManager = new UserManager(DB::getDBConnection());        // Start a new videomanager-instance.
            $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));  //Get info about user.
            if ($user['status'] == "ok" && $user['user']->privilege_level >= 1) {     // If gotten info about user and users privilege-level is teacher or above.
                $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
                    $result = null;                                                     //Just be sure to have it set here.
                    if (isset($_FILES['subtitles'])) {                                  // Upload with subtitles.
                        $result = $videoManager->upload(                            // Upload video and subtitles.
                            htmlspecialchars($_POST['title']),
                            htmlspecialchars($_POST['description']),
                            htmlspecialchars($_SESSION['uid']),
                            htmlspecialchars($_POST['topic']),
                            htmlspecialchars($_POST['course_code']),
                            $_FILES['video'],
                            $_POST['thumbnail'],
                            $_FILES['subtitles']
                        );
                    }
                    else {                                                              // Not any subtitles given.
                        $result = $videoManager->upload(                            // Upload video and subtitles.
                            htmlspecialchars($_POST['title']),
                            htmlspecialchars($_POST['description']),
                            htmlspecialchars($_SESSION['uid']),
                            htmlspecialchars($_POST['topic']),
                            htmlspecialchars($_POST['course_code']),
                            $_FILES['video'],
                            $_POST['thumbnail'],
                            null
                        );
                    }
                        
                
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