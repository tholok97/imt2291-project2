#add

Add a new user.

Call by going to "api/user/add.php".

##POST-method:

###JSON-variables:
{
    "username": The username.
    "password": The password.
    "firstname": The firstname.
    "lastname": The lastname.
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"uid": User id of the new user,
"message": "",

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "uid": "4"
}