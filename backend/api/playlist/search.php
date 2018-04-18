<?php
/**
 * This script is used for searching after playlists.
 * If called with method GET and variable 'search' to get a list of possible playlists, see docs for more info.
 * If called with method POST and variable 'search' and an array 'options' to get a list of possible playlists after a spesific criteria (options), see docs.
 */

require_once dirname(__FILE__) . '/../../config.php';
require_once dirname(__FILE__) . '/../../src/constants.php';
require_once dirname(__FILE__) . '/../../src/classes/PlaylistManager.php';
require_once dirname(__FILE__) . '/../../src/functions/functions.php';

session_start();

setApiHeaders("POST, GET");

// Get json as string and convert it to a object:
$json_str = file_get_contents('php://input');
$json = json_decode($json_str);

// Check if correct information is given:
if (isset($_GET['search'])) {                // If correct variables is given.
    $playlistManager = new PlaylistManager(DB::getDBConnection());        // Start a new <videomanager-instance.
        
    //Set some default options:
    $options = ['title', 'description'];
        
    $playlists = $playlistManager->searchPlaylistsMultipleFields(htmlspecialchars($_GET['search']));  // Get videos that matches the search-string.
    echo json_encode($playlists);                                                       // Return.
}
else if(isset($json->search)) {
    $playlistManager = new PlaylistManager(DB::getDBConnection());        // Start a new <videomanager-instance.
    $options = null;
    if (isset($json->options)) {                //If any options, send it in by typecasting.
        $options = (array) $json->options;
    }
    else {                                      //If not any options set, set a default value.
        $options = ['title', 'description'];
    }

    $playlists = $playlistManager->searchPlaylistsMultipleFields(htmlspecialchars($json->search),$options);  // Get videos that matches the search-string.
    echo json_encode($playlists);                                                       // Return.
}
else {                                              // If not all variables is given, give error.
    echo json_encode(array("status" => "fail", "errorMessage" => "Not all variables is given"));
}
?>