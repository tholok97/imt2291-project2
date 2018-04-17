#getUID

Check if a user is valid.

Call by going to "api/user/isValid.php".

##GET-method:

###Variables:

"uid": The user-id to check.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"valid": true/false,
"message": ""

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "valid": true,
    "message": ""
}