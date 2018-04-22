#Search

Call by going to "api/user/search.php".

If both sending in GET and POST variables/JSON the GET variables will be used.

##POST-method:

###Input:

####JSON-variables:
{
    "search": The string we search for.
    "options" (optionally): An array of where to search (see example below). Default is firstname and lastname.
}

####Input-example (with all options enabled):
{
	"auth": "GGASSFWWDDSGhfgrGFsd",
	"search": "Test",
	"options": ['username', 'firstname', 'lastname']
}

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"uids": An array with user-id's (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "uids": [
        "1"
    ],
    "message": ""
}


##GET-method:

###Input:

####Variables:
"search": The string we search for.

The options used when using get is firstname and lastname.

###Return

Returns JSON with the search result.

####Return statements if not error:
"status": "ok",
"errorMessage": null,
"uids": An array of user-id's (see example below).

####Return statements if error is:
"status": "fail",
"errorMessage": An error-message

####Return example (if not error):

{
    "status": "ok",
    "uids": [
        "1"
    ],
    "message": ""
}