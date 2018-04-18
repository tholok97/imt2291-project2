#get

Get a playlist.

Call by going to "api/playlist/get.php".

##GET-method:

###Variables:

"pid": The playlist id of the playlist to get.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": "",
"playlist": Playlist info, see example.

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "playlist": {
        "pid": "1",
        "title": "Testspilleliste",
        "description": "Dette er en testspilleliste",
        "videos": [
            {
                "vid": "20",
                "title": "Ny tittel",
                "description": "Ny testegreier",
                "url": "uploadedFiles/1/videos/20",
                "uid": "1",
                "topic": "Tester",
                "course_code": "IMT2234",
                "timestamp": "2018-02-06 10:22:10",
                "view_count": 96,
                "mime": "video/mp4",
                "size": "4837755",
                "position": "1"
            },
            {
                "vid": "16",
                "title": "Big buck bunny sample updated!!!!",
                "description": "En video fra Blender",
                "url": "uploadedFiles/1/videos/16",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2891",
                "timestamp": "2018-02-06 10:00:31",
                "view_count": 103,
                "mime": "video/mp4",
                "size": "4837755",
                "position": "2"
            }
        ],
        "maintainers": [
            {
                "uid": "1",
                "username": "guri@example.com",
                "firstname": "Guri",
                "lastname": "Nordmann",
                "privilege_level": "1"
            }
        ]
    }
}