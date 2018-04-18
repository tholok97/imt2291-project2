<?php
/**
 * This script is used for removing a maintainer to a playlist in the system.
 * If called with method POST and correct variables (see docs), you can do this.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);


// Check if correct information is given:
if (isset($json->uid)                               // If correct variables is given.
    && isset($json->pid)) {

    if (isset($_SESSION['uid'])) {                              // Check if logged in.
        $playlistManager = new PlaylistManager(DB::getDBConnection());          // Get a new Playlistmanager
        
        // Check if logged in user is a maintainer:
        $users = $playlistManager->getMaintainersOfPlaylist(htmlspecialchars($json->pid));  // Get all maintainers.
        $isMaintainer = false;
        foreach($users['users'] as $user) {                                                 // Go through all.
            if ($user->uid == htmlspecialchars($_SESSION['uid'])) {
                $isMaintainer = true;                                                       // If maintainer, set to true.
            }
        }
        if ($isMaintainer) {                                                             // Check if maintainer.
          
            $result = $playlistManager->removePlaylist(                            // Remove a playlist.
                htmlspecialchars($json->pid));
    
            echo json_encode($result);                          // Return.
        }
        else {                                              // If not teacher or above, give error.
            echo json_encode(array("status" => "fail", "message" => "You are not a maintainer of this playlist"));
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