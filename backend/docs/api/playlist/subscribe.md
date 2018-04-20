#subscribe

Subscribe to playlist.

Call by going to "api/playlist/subscribe.php".

You need to be signed in.

##GET-method:

###Variables:

"pid": The playlist to subscribe to.

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"message": ""

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

{
    "status": "ok",
    "message": ""
}