#login

Login on the system.

Call by going to "api/user/login.php".

##POST-method:

###JSON-variables:
{
    "username": The username.
    "password": The password.
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": null,
"uid": The user id of the just signed in user

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