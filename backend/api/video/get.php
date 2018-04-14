<?php
/**
 * This script is used for getting a video.
 * If called with method GET and variable 'id' it is used to get a video from system.
 * We also has a variable 'increase', if set to false, this will not increase the number of views in database.
 * 
 * We always need the variable 'key' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';

/*session_start();

header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: GET");
/*header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");*/
header("Content-Type: application/json; charset=utf-8");

// Check if correct information is given:
if (isset($_GET['key']) && isset($_GET['id'])) {                // If correct variables is given.
    if (htmlspecialchars($_GET['key']) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        $increase_views = true;                                         // Shall we increase views.
        if (isset($_GET['increase']) && $_GET['increase'] == false) {   // If variable is set to false, we shall not.
            $increase_views = false;
        }
        $video = $videoManager->get(htmlspecialchars($_GET['id']), $increase_views);    // Get video-info.
        echo json_encode($video);                                                       // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "Not a correct api-key is given"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>