#getComments

Call by going to "api/video/getComments.php".

##GET-method:

###Variables:
"vid": The id of our video.

###Return

Returns JSON with all comments a video has.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"video": (object, see return example below)

####Return statements if error is:
"status": "fail",
"errorMessage": An errorMessage

####Return example (if not error and at least one comment in database):

{
    "status": "ok",
    "comments": [
        {
            "text": "This is a comment",
            "cid": "8",
            "vid": "3",
            "uid": "1",
            "timestamp": "2018-04-15 14:17:52",
            "userInfo": {
                "status": "ok",
                "user": {
                    "uid": "1",
                    "username": "Ola65",
                    "firstname": "Ola",
                    "lastname": "Nordmann",
                    "privilege_level": "2"
                },
                "message": ""
            }
        },
        {
            "cid": "9",
            "vid": "3",
            "uid": "1",
            "text": "This is a comment 2",
            "timestamp": "2018-04-15 14:41:55",
            "userInfo": {
                "status": "ok",
                "user": {
                    "uid": "1",
                    "username": "Ola65",
                    "firstname": "Ola",
                    "lastname": "Nordmann",
                    "privilege_level": "2"
                },
                "message": ""
            }
        }
    ],
    "errorMessage": null
}

####Return example (if not error and not any comments in database):

{
    "status": "ok",
    "comments": [
        {
            "text": "Ingen kommentarer"
        }
    ],
    "errorMessage": null
}