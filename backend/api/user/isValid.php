<?php
/**
 * This script is used for checking if a user-id is valid.
 * If called with method GET and correct variables (see docs), you can check this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");


// Check if correct information is given:
if (isset($_GET['uid'])) {                               // If correct variables is given.

    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        
    $result = $userManager->isValidUser(htmlspecialchars($_GET['uid']));   // Check if user exist.
    
    echo json_encode($result);                          // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables is given"));
}
?>