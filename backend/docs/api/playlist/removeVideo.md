#removeVideo

Remove a video from playlist.

Call by going to "api/playlist/removeVideo.php".

##POST-method:

###JSON-variables:
{
    "vid": The video id to remove from playlist.
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