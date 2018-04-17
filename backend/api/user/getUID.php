<?php
/**
 * This script is used for getting the uid of a user on the system.
 * If called with method GET and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");


// Check if correct information is given:
if (isset($_GET['username'])) {                               // If correct variables is given.

    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        
    $result = $userManager->getUID(htmlspecialchars($_GET['username']));   // Check if user exist.
    
    echo json_encode($result);                          // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables is given"));
}
?>