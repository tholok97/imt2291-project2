<?php
/**
 * This script is used for getting ratings on a video.
 * If called with method GET and variable 'vid' it is used to get all comments for a video from system.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");

// Check if correct information is given:
if (isset($_GET['vid'])) {                                       // If correct variables is given.
    $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
    $comments = $videoManager->getComments(htmlspecialchars($_GET['vid']));    // Get all comments for a video.
    echo json_encode($comments);                                               // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>