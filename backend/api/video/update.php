<?php
/**
 * This script is used for getting a video.
 * If called with method POST and variable 'id' it is used to get a video from system.
 * We also has a variable 'increase', if set to false, this will not increase the number of views in database.
 * 
 * We always need the variable 'auth' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';


/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Check if correct information is given:
if (isset($_POST['auth'])                               // If correct variables is given.
    && isset($_POST['vid'])
    && isset($_POST['uid'])
    && isset($_POST['title'])
    && isset($_POST['description'])
    && isset($_POST['topic'])
    && isset($_POST['course_code'])) {
    
    if (htmlspecialchars($_POST['auth']) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        $result = $videoManager->update(                            // Update video info.
            htmlspecialchars($_POST['vid']),
            htmlspecialchars($_POST['uid']),
            htmlspecialchars($_POST['title']),
            htmlspecialchars($_POST['description']),
            htmlspecialchars($_POST['topic']),
            htmlspecialchars($_POST['course_code']));    
        
        echo json_encode($result);                          // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "Not a correct api-key is given"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>