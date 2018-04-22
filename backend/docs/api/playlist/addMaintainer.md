#addMaintainer

Add a new maintainer to playlist.

Call by going to "api/playlist/addMaintainer.php".

You need to be signed in with correct user.

##POST-method:

###JSON-variables:
{
    "uid": The user id of the user to add.
    "pid": The playlist id.
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": ""

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": ""
}