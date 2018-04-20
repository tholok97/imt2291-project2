#swapVideo

Swap videos in playlist.

Call by going to "api/playlist/swapVideo.php".

##POST-method:

###JSON-variables:
{
    "pos1": Video-position 1 in playlist.
    "pos2": Video-position 2 in playlist.
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