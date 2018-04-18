#add

Add a new playlist.

Call by going to "api/playlist/add.php".

##POST-method:

###JSON-variables:
{
    "title": The playlists title.
    "description": The description.
}

###Files:
We also need the file 'thumbnail'.

###Return

Returns JSON.

####Return statements if not error:
"addPlaylist": {
    "status": "ok",
    "pid": Playlist id of the new playlist,
    "message": ""
}
"addMaintainer": {
    "status": "ok",
    "message": ""
}


####Return statements if error is:
"addPlaylist": {
    "status": "fail",
    "message": An error message
}
"addMaintainer": {
    "status": "ok",
    "message": An error message
}

####Return example (if not error):

{
    "addPlaylist": {
        "status": "ok",
        "message": "",
        "pid": "4"
    }
    "addMaintainer": {
        "status": "ok",
        "message": ""
    }
}