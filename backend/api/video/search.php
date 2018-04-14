<?php
/**
 * This script is used for getting a video.
 * If called with method GET and variable 'search' to get a list of possible videos, see docs for more info.
 * If called with method POST and variable 'search' and an array 'options' to get a list of possible videos after a spesific criteria (options), see docs.
 * 
 * We always need the variable 'auth' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';


/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: GET, POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);

// Check if correct information is given:
if (isset($_GET['auth']) && isset($_GET['search'])) {                // If correct variables is given.
    if (htmlspecialchars($_GET['auth']) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        
        //Set some default options:
        $options['title'] = true;
        $options['description'] = true;
        
        $video = $videoManager->search(htmlspecialchars($_GET['search']));  // Get videos that matches the search-string.
        echo json_encode($video);                                                       // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "Not a correct api-key is given"));
    }
}
else if(isset($json->auth) && isset($json->search)) {
    if (htmlspecialchars($json->auth) == Constants::API_KEY) { // If correct api-key is given.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        $options = null;
        if (isset($json->options)) {                //If any options, send it in by typecasting.
            $options = (array) $json->options;
        }
        else {                                      //If not any options set, set a default value.
            $options['title'] = true;
            $options['description'] = true;
        }

        $video = $videoManager->search(htmlspecialchars($json->search),$options);  // Get videos that matches the search-string.
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