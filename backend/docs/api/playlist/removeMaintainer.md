#removeMaintainer

Remove a maintainer from playlist.

Call by going to "api/playlist/removeMaintainer.php".

##POST-method:

###JSON-variables:
{
    "uid": The user id of user to remove.
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