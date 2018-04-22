#isSubscribed

Get all playlists user maintains.

Call by going to "api/playlist/getUserMaintains.php".

You need to be signed in.

##GET-method:

###Variables:

"pid": The playlist to check up to.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": "",
"subscribed": true/false

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": "",
    "subscribed": "true"
}