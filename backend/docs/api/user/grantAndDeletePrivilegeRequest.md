# grantAndDeletePrivilegeRequest

Privilege is granted and request is deleted

Call by going to "api/user/grantAndDeletePrivilegeRequest.php".

You need to be logged in as admin to use this function.

##POST-method:

###JSON-variables:
{
    "uid": The user id to person to grant it to.
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
