#GetAllUserVideos

Call by going to "api/video/GetAllUserVideos.php".

##GET-method:

###Variables:
"uid": The id of the user to get videos from.

###Return

Returns JSON with info about all users videos.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"videos": (array with objects, see return example below)

####Return statements if error is:
"status": "fail",
"errorMessage": An errorMessage

####Return example (if not error):

{
    "status": "ok",
    "errorMessage": null,
    "videos": [
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "28",
                "title": "Big buck bunny",
                "description": "Ntgd drgd",
                "url": "uploadedFiles/1/videos/28",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2000",
                "timestamp": "2018-02-20 19:42:57",
                "view_count": 1,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "27",
                "title": "Big Buck Bunny sample",
                "description": "Dette er en kortversjon av Big Buck Bunny.",
                "url": "uploadedFiles/1/videos/27",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2000",
                "timestamp": "2018-02-20 19:32:45",
                "view_count": 4,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
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
                "vid": "25",
                "title": "Big Buck Bunny sample",
                "description": "Big Buck Bunny kortversjon.\r\n\r\nDette er en kortversjon av animasjonsfilmen fra Blender Foundation.\r\n\r\nEndret for andre gang.",
                "url": "uploadedFiles/1/videos/25",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2891",
                "timestamp": "2018-02-18 19:06:25",
                "view_count": 108,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "24",
                "title": "Big buck bunny",
                "description": "En video fra Blender",
                "url": "uploadedFiles/1/videos/24",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2891",
                "timestamp": "2018-02-14 14:30:30",
                "view_count": 91,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        },
        {
            "status": "ok",
            "errorMessage": null,
            "video": {
                "vid": "23",
                "title": "Big buck bunny",
                "description": "En video fra Blender",
                "url": "uploadedFiles/1/videos/23",
                "uid": "1",
                "topic": "Videoer fra Blender foundation",
                "course_code": "IMT2891",
                "timestamp": "2018-02-12 14:32:33",
                "view_count": 95,
                "mime": "video/mp4",
                "size": "4837755",
                "position": null
            }
        }
    ]
}