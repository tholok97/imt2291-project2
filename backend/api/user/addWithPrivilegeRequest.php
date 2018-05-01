<?php
/**
 * This script is used for adding a new user to the system, and potentially 
 * adding a privilege request
 *
 * If called with method POST and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->username)                               // If correct variables is given.
    && isset($json->firstname)
    && isset($json->lastname)
    && isset($json->password)
    && isset($json->privilege)) {

    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.

    $user = new User(                                       // Make new user object.
        htmlspecialchars($json->username),
        htmlspecialchars($json->firstname),
        htmlspecialchars($json->lastname),
        0                                                   // Default priviledge level to 0 (student).
    );

    $result = $userManager->addUser(                                 // Try to add new user.
        $user,
        htmlspecialchars($json->password)
    );
    
    if ($result['status'] == 'ok') {

        if ($json->privilege > 0) {

            // could add user, now do privilege request (if needed)

            $request_result = $userManager->requestPrivilege($result['uid'], $json->privilege);

            if ($request_result['status'] == 'ok') {

                echo json_encode($result);                          // Return.
                exit();

            } else {

                $result['status'] = 'fail';
                $result['message'] = $request_result['message'];

                echo json_encode($result);                          // Return.
                exit();
            }

        } else {
            echo json_encode($result);                          // Return.
            exit();
        }

    } else {

        // couldn't add user, return fail
        
        echo json_encode($result);                          // Return.

    }

}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables is given"));
}
?>
