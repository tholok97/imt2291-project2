<?php
/**
 * This script is used for comment on a video.
 * If called with method POST and correct variables (see docs), you can add a comment to a video on our system.
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

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->auth)                               // If correct variables is given.
    && isset($json->vid)
    && isset($json->uid)
    && isset($json->text)) {
    
    if (htmlspecialchars($json->auth) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
        $result = $videoManager->comment(                       // Comment a video.
            htmlspecialchars($json->text),
            htmlspecialchars($json->uid),
            htmlspecialchars($json->vid));
        
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