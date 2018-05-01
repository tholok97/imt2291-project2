#Get

Call by going to "api/video/get.php".

##GET-method:

###Variables:
"vid": The id of our video.
"increase" (optional): if we shall increase number of views or not (true/false). Default true.

###Return

Returns JSON with info about a video.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"video": (object, see return example below)

####Return statements if error is:
"status": "fail",
"errorMessage": An errorMessage

####Return example (if not error):

{
    "status": "ok",
    "errorMessage": null,
    "video": {
        "vid": "59",
        "title": "Tss",
        "description": "Tdfd",
        "url": "uploadedFiles/1/videos/59",
        "subtitlesUrl": "uploadedFiles/1/subtitles/59",
        "uid": "1",
        "topic": "Gdfd",
        "course_code": "Gdfd",
        "timestamp": "2018-04-24 10:08:40",
        "view_count": 10,
        "mime": "video/mp4",
        "size": "4837755",
        "position": null
    }
}