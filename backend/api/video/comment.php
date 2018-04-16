<?php
/**
 * This script is used for comment on a video.
 * If called with method POST and correct variables (see docs), you can add a comment to a video on our system.
 * 
 * You need to be logged in (api/user/login.php) to use this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/VideoManager.php';

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
if (isset($json->vid)                               // If correct variables is given.
    && isset($json->text)) {
    
    $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
    if (isset($_SESSION['uid']) && $userManager->getUser(htmlspecialchars($_SESSION['uid']))['status'] == "ok") { // If logged in.
        $videoManager = new VideoManager(DB::getDBConnection());        // Start a new videomanager-instance.
        $result = $videoManager->comment(                       // Comment a video.
            htmlspecialchars($json->text),
            htmlspecialchars($_SESSION['uid']),
            htmlspecialchars($json->vid));
        
        echo json_encode($result);                          // Return.
    }
    else {                                          // If not correct api-key, give error.
        echo json_encode(array("status" => "fail", "errorMessage" => "You are not logged in"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>