<?php
/**
 * This script is used for checking if logged in and get that info.
 * If called with method GET and correct variables (see docs), you can see if you are logged in.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");


// Check if correct information is given:
if (isset($_SESSION['uid'])) {                               // If correct variables is given.
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
    $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));      // Get info about logged in user.
    
    echo json_encode($user);                          // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "You are not logged in."));
}
?>