#logout

Logout from the system.

Call by going to "api/user/logout.php".

##POST-method:

###JSON-variables:

No variables needed

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
}