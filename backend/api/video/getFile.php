<?php

// returns videofile or subtitle of video from db
// EXPECTS:
//  $_GET['vid'] -> vid of video
//  $_GET['type'] -> either "video" (to get the videofile) or "subtitle" (to get the subtitle to video)

require_once dirname(__FILE__) . '../../../src/constants.php';
require_once dirname(__FILE__) . '../../../src/classes/DB.php';
require_once dirname(__FILE__) . '../../../src/classes/VideoManager.php';

//Set headers, which is slightly different than the rest of the api headers, and therefore added here.
header("Access-Control-Allow-Origin: ".Config::AccessControlAllowOrigin);
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, Content-Type");

$result = null;

$videoManager = new VideoManager(DB::getDBConnection());

$videoInfo = $videoManager->get(htmlspecialchars($_GET['vid']));

// If ok, output correct output (videofile or subtitle).
if ($videoInfo['status'] == "ok") {
    if ($_GET['type'] == "video") {
        $file = dirname(__FILE__) . '/../../' . $videoInfo['video']->url;
        //echo $file;
        if (file_exists($file)) {                                                   // If file exist, show, if not give message.
            header('Content-type: ' . $videoInfo['video']->mime);
            readfile($file);
        }
        else {
            echo "No videofile found";
        }
    }
    else if ($_GET['type'] == "subtitle") {
        $file = dirname(__FILE__) . '/../../' . $videoInfo['video']->subtitlesUrl;
        if (file_exists($file)) {                                                  // If file exist, show, if not give message.
            readfile($file);
        }
        else {
            echo "No subtitles";
        }
    }
    else {
        echo "Not supported type input.";
    }
}
else {
    echo "Error: " + $videoInfo['errorMessage'];
}

