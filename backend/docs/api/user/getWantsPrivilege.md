#getWantsPrivilege

Show an admin all who wants another privilege level.

Call by going to "api/user/getWantsPrivilege.php".

You need to be logged in as admin to use this function.

**EDIT**: Added user objects in wants when successfully returns

##GET-method:

###Variables:

No variables needed

###Return

Returns JSON.

####Return statements if not error:
"status": "ok",
"wants": Array with objects, see example,
"message": "",

####Return statements if error is:
"status": "fail",
"message": An error-message

####Return example (if not error):

```
{
    "status": "ok",
    "wants": [
        {
            "0": "1",
            "1": "1",
            "uid": "1",
            "privilege_level": "1",
            "user": {
                "uid":"1",
                "username":"test@test",
                "firstname":"test",
                "lastname":"test",
                "privilege_level":"0"
            }
        },
        {
            "0": "3",
            "1": "1",
            "uid": "3",
            "privilege_level": "2"
            "user": {
                "uid":"3",
                "username":"anotheruser@mail",
                "firstname":"test",
                "lastname":"test",
                "privilege_level":"1"
            }
        }
    ],
    "message": ""
}
```
