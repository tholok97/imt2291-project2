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
        "vid": "16",
        "title": "Big buck bunny sample",
        "description": "En video fra Blender",
        "url": "uploadedFiles/1/videos/16",
        "uid": "1",
        "topic": "Videoer fra Blender foundation",
        "course_code": "IMT2891",
        "timestamp": "2018-02-06 10:00:31",
        "view_count": 98,
        "mime": "video/mp4",
        "size": "4837755",
        "position": null
    }
}