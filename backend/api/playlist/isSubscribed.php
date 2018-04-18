<?php
/**
 * This script is used forfor checking if user is subscribing to a particular playlist.
 * If called with method GET and correct variables (see docs), you can do this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");


// Check if correct information is given:
if (isset($_GET['pid'])) {                               // If correct variables is given.

    if (isset($_SESSION['uid'])) {                              // Check if logged in.
        $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        if ($userManager->isValidUser(htmlspecialchars($_SESSION['uid']))['valid']) {       // Check if logged in user is valid.
            $playlistManager = new PlaylistManager(DB::getDBConnection());
            $result = $playlistManager->isSubscribed(                            // is logged in user subscribed?
                htmlspecialchars($_SESSION['uid']),
                htmlspecialchars($_GET['pid'])
            );
    
            echo json_encode($result);                          // Return.
        }
        else {                                              // If not teacher or above, give error.
            echo json_encode(array("status" => "fail", "message" => "You are not a valid user"));
        }
    }
    else {                                              // If not logged in, give error.
        echo json_encode(array("status" => "fail", "message" => "You are not logged in"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables/files is given"));
}
?>