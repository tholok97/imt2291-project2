<?php
/**
 * This script is used for logging in on the system.
 * If called with method POST and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders();

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->username)                               // If correct variables is given.
    && isset($json->password)) {
    
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
    $result = $userManager->login(                                 // Try to login.
        htmlspecialchars($json->username),
        htmlspecialchars($json->password));
    
    if($result['status'] == "ok") {                     // If logged in/possible to login, set session.
        $_SESSION['uid'] = $result['uid'];
    }
    echo json_encode($result);                          // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables is given"));
}
?>