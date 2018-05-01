#Comment

Call by going to "api/video/comment.php".

You need to be logged in to use this function.

##POST-method:

###JSON-variables:
{
    "vid": The id of our video.
    "text": The comment user wrote.
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"errorMessage": null,

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "cid": "8",
    "errorMessage": null
}