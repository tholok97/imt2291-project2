#getUID

Get a user's id.

Call by going to "api/user/getUID.php".

##GET-method:

###Variables:

"username": The username of the user to get id from.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"uid": The user id,
"message": ""

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "uid": "1",
    "message": ""
}