#getLoggedInUser

Get the user signed in.

Call by going to "api/user/getLoggedInUser.php".

##GET-method:

###Variables:

No variables needed.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": "",
"user": User info, see example.

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "user": {
        "uid": "2",
        "username": "guri@example.com",
        "firstname": "Guri",
        "lastname": "Olsen",
        "privilege_level": "0"
    },
    "message": ""
}