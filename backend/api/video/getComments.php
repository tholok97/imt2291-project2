<?php
/**
 * This script is used for getting a comment for a video.
 * If called with method GET and variable 'vid' it is used to get all comments for a video from system.
 * 
 * We always need the variable 'auth' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';


/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Check if correct information is given:
if (isset($_GET['auth']) && isset($_GET['vid'])) {                // If correct variables is given.
    if (htmlspecialchars($_GET['auth']) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        $comments = $videoManager->getComments(htmlspecialchars($_GET['vid']));    // Get all comments for a video.
    print_r(utf8_encode_deep($comments));
    //echo json_encode(str_split(utf8_encode_deep($comments)));                                                       // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "Not a correct api-key is given"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>