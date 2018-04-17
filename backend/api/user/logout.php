<?php
/**
 * This script is used for rating a video.
 * If called with method POST and correct variables (see docs), you can add a comment to a video on our system.
 * 
 * We always need the variable 'auth' to be set with the correct key to be able to use the api.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders();



// Check if correct information is given:
if (isset($_SESSION['uid'])) {                              // If correct variables is given.
    session_unset($_SESSION['uid']);
    echo json_encode(array("status" => "ok"));                          // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "You are not logged in"));
}
?>