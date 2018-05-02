#getUserRating

Call by going to "api/video/getUserRating.php".

##GET-method:

###Variables:
"vid": The id of our video.
"uid": The id of the user to get the rating info from.

###Return

Returns JSON with a users rating for a specific video.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"rating": This user's rating

####Return statements if error is:
"status": "fail",
"errorMessage": An errorMessage,
"rating": 0

####Return example (if not error):

{
    "status": "ok",
    "rating": "4.0000",
    "errorMessage": ""
}

####Return example (if error like you have not rated that video):

{
    "status": "fail",
    "errorMessage": "Vi fikk ikke noe resultat"
    "rating": null
}