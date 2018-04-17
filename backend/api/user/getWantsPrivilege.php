<?php
/**
 * This script is used for getting the info of a user on the system.
 * If called with method POST and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';

session_start();

/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");


// Check if only correct users:
if (isset($_SESSION['uid'])) {                               // If correct variables is given.
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
    $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));
    if ($user['status'] == "ok" && $user['privilege_level'] >= 2) {
        $result = $userManager->getUser(htmlspecialchars($_GET['uid']));   // Get info about a user if user exist.
        
        echo json_encode($result);                          // Return.
    }
    else {                                                  // If not priviledged enough or not correct uid.
        echo json_encode(array("status" => "fail", "message" => "You are not logged in with a priviledged enough user"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "You are not logged in"));
}
?>