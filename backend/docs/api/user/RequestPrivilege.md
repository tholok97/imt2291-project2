#requestPrivilege

Ask an admin to get another privilege level to you.

Call by going to "api/user/requestPrivilege.php".

You need to be logged in to use this function.

##POST-method:

###JSON-variables:
{
    "privilege": The privilege level you want.
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