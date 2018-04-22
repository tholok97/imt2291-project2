#Search

Call by going to "api/user/search.php".

If both sending in GET and POST variables/JSON the GET variables will be used.

##POST-method:

###Input:

####JSON-variables:
{
    "search": The string we search for.
    "options" (optionally): An array of where to search (see example below). Default is title and description.
}

####Input-example (with all options enabled):
{
	"auth": "GGASSFWWDDSGhfgrGFsd",
	"search": "Test",
	"options": ["title", "description"]
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"playlists": An array with playlist-objects (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "playlists": [
        {
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
                },
                {
                    "vid": "5",
                    "title": "Big buck bunny sample",
                    "description": "En video fra Blender",
                    "url": "uploadedFiles/1/videos/5",
                    "uid": "1",
                    "topic": "Videoer fra Blender foundation",
                    "course_code": "IMT2891",
                    "timestamp": "2018-02-06 08:53:50",
                    "view_count": 97,
                    "mime": "",
                    "size": "0",
                    "position": "3"
                }
            ],
            "maintainers": [
                {
                    "uid": "1",
                    "username": "Heru",
                    "firstname": "Yngve",
                    "lastname": "Hestem",
                    "privilege_level": "2"
                },
                {
                    "uid": "2",
                    "username": "Guro",
                    "firstname": "Guri",
                    "lastname": "Olsen",
                    "privilege_level": "1"
                }
            ]
        }
    ]
}


##GET-method:

###Input:

####Variables:
"search": The string we search for.

The options used when using get is title and description.

###Return

Returns JSON with the search result.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"playlists": An array of playlist-objects (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "playlists": [
        {
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
                },
                {
                    "vid": "5",
                    "title": "Big buck bunny sample",
                    "description": "En video fra Blender",
                    "url": "uploadedFiles/1/videos/5",
                    "uid": "1",
                    "topic": "Videoer fra Blender foundation",
                    "course_code": "IMT2891",
                    "timestamp": "2018-02-06 08:53:50",
                    "view_count": 97,
                    "mime": "",
                    "size": "0",
                    "position": "3"
                }
            ],
            "maintainers": [
                {
                    "uid": "1",
                    "username": "Heru",
                    "firstname": "Yngve",
                    "lastname": "Hestem",
                    "privilege_level": "2"
                },
                {
                    "uid": "2",
                    "username": "Guro",
                    "firstname": "Guri",
                    "lastname": "Olsen",
                    "privilege_level": "1"
                }
            ]
        }
    ]
}