#getFile

Call by going to "api/video/getFile.php".

Get a video or subtitle file.

##GET-method:

###Variables:
"vid": The id of the video to get the file from.
"type": Either "video" or "subtitle"

###Return

A file.

####Return statements if not error:
Returns the file without mime-type.

####Return statements if error is:
A simple message

####How to get a video:

You can for example get the video by setting the url (with get variables) inside the src-element of an video-tag and setting the type-element to the mime-type of the video.

####How to get a subtitle:

You can add it in a track-tag inside the video-tag, see https://www.html5rocks.com/en/tutorials/track/basics/