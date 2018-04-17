#deletePrivilegeRequest

Delete privilige-request.

Call by going to "api/user/deletePrivilegeRequest.php".

You need to be logged in as admin to use this function.

##POST-method:

###JSON-variables:
{
    "uid": The user id for the user to delete.
    "privilege": The privilege level you.
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