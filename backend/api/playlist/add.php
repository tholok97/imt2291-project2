<?php
/**
 * This script is used for adding a new playlist to the system.
 * If called with method POST and correct variables (see docs), you can log in on the ststem.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST");

// Get json as string and convert it to a object:

/*
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);
*/

// Check if correct information is given:
if (isset($_POST['title'])          && $_POST['title']       != ""
 && isset($_POST['description'])    && $_POST['description'] != "" 
 && isset($_FILES['thumbnail'])     /*&& $_FILES['thumbnail']  != ""*/) {     

    if (isset($_SESSION['uid'])) {                              // Check if logged in.
        $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        $user = $userManager->getUser(htmlspecialchars($_SESSION['uid']));      // Get info about logged in user.
        if ($user['status'] == "ok" && $user['user']->privilege_level >= 1) {   // Check if logged in user can do this (is teacher or higher).
            $playlistManager = new PlaylistManager(DB::getDBConnection());
            $result = $playlistManager->addPlaylist(                            // Add a new playlist.
                htmlspecialchars($_POST['title']),  //change json to [_POST]
                htmlspecialchars($_POST['description']),
                $_FILES['thumbnail']
            );
    
            $result2 = null;
            // If result ok, add user as maintainer.
            if ($result['status'] == "ok") {
                $result2 = $playlistManager->addMaintainerToPlaylist(
                    htmlspecialchars($_SESSION['uid']),
                    htmlspecialchars($result['pid'])
                );
            }
            
            $totalResult['addPlaylist'] = $result;
            $totalResult['addMaintainer'] = $result2;
            echo json_encode($totalResult);                          // Return.
        }
        else {                                              // If not teacher or above, give error.
            echo json_encode(array("status" => "fail", "message" => "You are not privileged to do this"));
        }
    }
    else {                                              // If not logged in, give error.
        echo json_encode(array("status" => "fail", "message" => "You are not logged in"));
    }
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "message" => "Not all variables/files are given"));
}
?>