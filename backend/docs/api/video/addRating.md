#addRating

Rate a video.

Call by going to "api/video/addRating.php".

You need to be logged in to use this function.

##POST-method:

###JSON-variables:
{
    "vid": The id of our video.
    "rating": The rating (a number).
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"cid": The id of the rating

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "errorMessage": null,
    "cid": "0"
}