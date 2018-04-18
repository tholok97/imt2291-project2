#addVideo

Add a video to playlist.

Call by going to "api/playlist/addVideo.php".

##POST-method:

###JSON-variables:
{
    "vid": The video id of the video to add.
    "pid": The playlist id.
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": "",

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": ""
}