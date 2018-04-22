#getRating

Call by going to "api/video/getRating.php".

##GET-method:

###Variables:
"vid": The id of our video.

###Return

Returns JSON with average rating.

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

####Return example (if error or not any ratings in database):

{
    "status": "fail",
    "rating": 0,
    "numberOfRatings": 0,
    "errorMessage": "Vi fikk ikke noe resultat"
}