#getThumbnail

Call by going to "api/playlist/getThumbnail.php".

Get the thumbnail to a playlist.

##GET-method:

###Variables:
"pid": The id of the playlist to get the thumbnail from.

###Return

Returns JSON with average rating.

####Return statements if not error:
A png image.

####Return statements if error is:
Something.

####How to get an image:

You can for example get the image by setting the url (with get variables) inside the src-element of an img-tag.