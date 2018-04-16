<?php
/**
 * This script is used for getting all videos a user has.
 * If called with method GET and variable 'uid' it is used to get all videos from user with the that id from system.
 * See docs for more info.
 * 
 * We always need the variable 'auth' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';


/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Check if correct information is given:
if (isset($_GET['auth']) && isset($_GET['uid'])) {                // If correct variables is given.
    if (htmlspecialchars($_GET['auth']) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        $videos = $videoManager->getAllUserVideos(htmlspecialchars($_GET['uid']));    // Get video-info.
        echo json_encode($videos);                                                       // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "Not a correct api-key is given"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>