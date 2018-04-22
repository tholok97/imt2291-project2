#getNextPosition

Get next position in a playlist.

Call by going to "api/playlist/getNextPosition.php".

##GET-method:

###Variables:

"pid": The playlist id of the playlist to get.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": "",
"position": Position.

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "position": 4
}