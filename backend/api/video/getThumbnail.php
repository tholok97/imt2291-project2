<?php

// returns thumbnail of video from db
// EXPECTS:
//  $_GET['vid'] -> vid of video

require_once dirname(__FILE__) . '../../../src/constants.php';
require_once dirname(__FILE__) . '../../../src/classes/DB.php';

//Set headers, which is slightly different than the rest of the api headers, and therefore added here.
header("Access-Control-Allow-Origin: ".Config::ACCESS_CONTROL_ALLOW_ORIGIN);
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Headers: Origin, Content-Type");

$thumbnail = null;
$ok = false;

try {

    $dbh = DB::getDBConnection();

    $stmt = $dbh->prepare('SELECT thumbnail FROM video WHERE vid=:vid');
    $stmt->bindParam(':vid', $_GET['vid']);
    $ok = $stmt->execute();


    if ($ok) {
        $thumbnail = $stmt->fetchAll()[0];
    }

} catch (PDOException $ex) {
    echo 'Coudn\'t load image: ' . $ex->getMessage();
}

// if everything went right -> echo image
if ($ok) {

    header('Content-type: image/png');

    echo $thumbnail['thumbnail'];
} else {
    echo 'something went wrong..';
}

