<?php
/**
 * This script is used for searching after users.
 * If called with method GET and variable 'search' to get a list of possible users, see docs for more info.
 * If called with method POST and variable 'search' and an array 'options' to get a list of possible videos after a spesific criteria (options), see docs.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST, GET");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);

// Check if correct information is given:
if (isset($_GET['search'])) {                // If correct variables is given.
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        
    //Set some default options:
    $options = ['firstname', 'lastname'];
        
    $result = $userManager->searchMultipleFields(htmlspecialchars($_GET['search']), $options);  // Get videos that matches the search-string.
    echo json_encode($result);                                                       // Return.
}
else if(isset($json->search)) {
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
    $options = null;
    if (isset($json->options)) {                //If any options, send it in by typecasting.
        $options = (array) $json->options;
    }
    else {                                      //If not any options set, set a default value.
        $options = ['firstname', 'lastname'];
    }

    $result = $userManager->searchMultipleFields(htmlspecialchars($json->search),$options);  // Get videos that matches the search-string.
    echo json_encode($result);                                                       // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>