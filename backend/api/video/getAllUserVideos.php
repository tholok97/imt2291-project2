<?php
/**
 * This script is used for getting all videos a user has.
 * If called with method GET and variable 'uid' it is used to get all videos from user with the that id from system.
 * See docs for more info.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");

// Check if correct information is given:
if (isset($_GET['uid'])) {                // If correct variables is given.
    $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
    $videos = $videoManager->getAllUserVideos(htmlspecialchars($_GET['uid']));    // Get video-info.
    echo json_encode($videos);                                                       // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>
