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
"numberOfRatings": Number of persons who have rated the video,
"rating": Average rating

####Return statements if error is:
"status": "fail",
"errorMessage": An errorMessage,
"numberOfRatings": 0,
"rating": 0

####Return example (if not error and at least one rating in database):

{
    "status": "ok",
    "rating": "4.0000",
    "numberOfRatings": "1",
    "errorMessage": ""
}

####Return example (if error like you have already rated that video):

{
    "status": "fail",
    "errorMessage": "Har allerede lagt til en rating. Rating er 4"
}