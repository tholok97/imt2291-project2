<?php
/**
 * This script is used forfor getting all playlists a user evtually maintains.
 * If called with method GET and correct variables (see docs), you can do this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/UserManager.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");


// Check if logged in:
    if (isset($_SESSION['uid'])) {                              // Check if logged in.
        $userManager = new UserManager(DB::getDBConnection());        // Start a new usermanager-instance.
        if ($userManager->isValidUser(htmlspecialchars($_SESSION['uid']))['valid']) {       // Check if logged in user is valid.
            $playlistManager = new PlaylistManager(DB::getDBConnection());
            $result = $playlistManager->getPlaylistsUserMaintains(                            // which playlists is logged in user subscribed to?
                htmlspecialchars($_SESSION['uid'])
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
?>