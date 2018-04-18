#search

Call by going to "api/video/search.php".

If both sending in GET and POST variables/JSON the GET variables will be used.

##POST-method:

###Input:

####JSON-variables:
{
    "search": The string we search for.
    "options" (optionally): An object of where to search (see example below). Default is title and description.
}

####Input-example (with all options enabled):
{
	"auth": "GGASSFWWDDSGhfgrGFsd",
	"search": "Test",
	"options": {
		"title": true,
		"description": true,
		"topic": true,
		"course_code": true,
		"timestamp": true,
		"firstname": true,
		"lastname": true
	}
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"result": An array of get-results (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "result": [
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "26",
                "title": "Test redigert",
                "description": "GDfsfe\r\njfhf\r\n\r\n\r\ngjfyf En fin test\r\n\r\nTester igjen.",
                "url": "uploadedFiles/1/videos/26",
                "uid": "1",
                "topic": "Test",
                "course_code": "IMT2000",
                "timestamp": "2018-02-19 19:06:11",
                "view_count": 33,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "2",
                "title": "Test",
                "description": "This is a big test",
                "url": "uploadedFiles/1/videos/2",
                "uid": "1",
                "topic": "Test",
                "course_code": "IMT2224",
                "timestamp": "2018-02-06 08:50:58",
                "view_count": 99,
                "mime": "video/mp4",
                "size": "0",
                "position": null
            }
        }
    ],
    "errorMessage": null
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
"result": An array of get-results (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "result": [
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "26",
                "title": "Test redigert",
                "description": "GDfsfe\r\njfhf\r\n\r\n\r\ngjfyf En fin test\r\n\r\nTester igjen.",
                "url": "uploadedFiles/1/videos/26",
                "uid": "1",
                "topic": "Test",
                "course_code": "IMT2000",
                "timestamp": "2018-02-19 19:06:11",
                "view_count": 33,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "2",
                "title": "Test",
                "description": "This is a big test",
                "url": "uploadedFiles/1/videos/2",
                "uid": "1",
                "topic": "Test",
                "course_code": "IMT2224",
                "timestamp": "2018-02-06 08:50:58",
                "view_count": 99,
                "mime": "video/mp4",
                "size": "0",
                "position": null
            }
        }
    ],
    "errorMessage": null
}