#update

Update a playlist.

Call by going to "api/playlist/update.php".

##POST-method:

###JSON-variables:
{
    "title": The new title.
    "description": The new description.
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