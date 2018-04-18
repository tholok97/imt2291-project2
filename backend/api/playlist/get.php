<?php
/**
 * This script is used for getting a playlist.
 * If called with method GET and variable 'pid' it is used for this.
 * See docs for more info.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("GET");

// Check if correct information is given:
if (isset($_GET['pid'])) {                // If correct variables is given.
    $playlistManager = new PlaylistManager(DB::getDBConnection());        // Start a new <videomanager-instance.
    $result = $playlistManager->getPlaylist(htmlspecialchars($_GET['pid']));    // Get the result we need.
    echo json_encode($result);                                                       // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>