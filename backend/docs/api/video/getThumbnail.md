#getThumbnail

Call by going to "api/video/getThumbnail.php".

Get the thumbnail to a video.

##GET-method:

###Variables:
"vid": The id of the video to get the thumbnail from.

###Return

Returns JSON with average rating.

####Return statements if not error:
A png image.

####Return statements if error is:
Something.

####How to get an image:

You can for example get the image by setting the url (with get variables) inside the src-element of an img-tag.