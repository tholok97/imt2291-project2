<?php
/**
 * This script is used for adding a new user to the system.
 * If called with method POST and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';

session_start();

/*header("Access-Control-Allow-Origin: ".$config['AccessControlAllowOrigin']);*/
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin");
header("Content-Type: application/json; charset=utf-8");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->privilege) && isset($json->uid)) {                               // If correct variables is given.
    if (isset($_SESSION['uid']) && $userManager->getUser(htmlspecialchars($_SESSION['uid']))['priviledge'] == 2) {
        $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.

        $result = $userManager->grantPrivilegeLevel(   // Try to request another privilege to user.
            htmlspecialchars($json->uid['uid']),
            htmlspecialchars($json->privilege)
        );
        echo json_encode($result);                          // Return.
    }
    else {
        echo json_encode(array("status" => "fail", "message" => "You are not logged in"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables is given"));
}
?>