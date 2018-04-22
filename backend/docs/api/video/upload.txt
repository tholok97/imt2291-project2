#Upload

Uploads video.

Call by going to "api/video/upload.php".

You need to be logged in as teacher or admin to use this function.

##POST-method:

###JSON-variables:
{
    "vid": The id of our video.
    "title": Video's new title.
    "description": Video's new description.
    "topic": Video's new topic.
    "course_code": Video's new course-code.
}

###Files:
We also need the files 'video' and 'thumbnail'.

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
    "errorMessage": null,
}