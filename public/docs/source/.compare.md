---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->
## Oauth2 server

Documentation: https://oauth.net/2/


Get client credentials access token:

POST: http://localhost/oauth/token

Body: {

   client_id: 12
   
   client_secret: jYwXAmnQVjEQZ0BOsb69bZIEj2XaWGOOTlSTNcOW
   
   grant_type: client_credentials
  
}

#Account resource

Allow client can get list or specific account information.

Class UserResourceController
<!-- START_1aff981da377ba9a1bbc56ff8efaec0d -->
## Get list accounts

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "/api/v1/users" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/users");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 19,
            "email": "jacky@gmail.com",
            "verified": "0",
            "verification_token": "ryB38UaLBVrRYYBvk9uD63NOiFSTwzCraPr3dEhO",
            "creation_date": "2019-07-14 14:41:36",
            "last_update": "2019-07-14 14:41:36"
        },
        {
            "id": 20,
            "email": "jacky+1@gmail.com",
            "verified": "0",
            "verification_token": "lrRQnIG1f8HEPzwtoVmBtGRi3sajHQZQimxv4BJp",
            "creation_date": "2019-07-14 16:04:47",
            "last_update": "2019-07-14 16:04:47"
        },
        {
            "id": 21,
            "email": "jacky+11@gmail.com",
            "verified": "0",
            "verification_token": "5ZIUdiY1tDizRaTARKV0V3lJaH3biTimqdYYWO8j",
            "creation_date": "2019-07-15 15:42:18",
            "last_update": "2019-07-15 15:42:18"
        },
        {
            "id": 22,
            "email": "jacky+22@gmail.com",
            "verified": "1",
            "verification_token": null,
            "creation_date": "2019-07-15 17:20:48",
            "last_update": "2019-07-15 17:33:09"
        }
    ]
}
```

### HTTP Request
`GET api/v1/users`


<!-- END_1aff981da377ba9a1bbc56ff8efaec0d -->

<!-- START_cedc85e856362e0e3b46f5dcd9f8f5d0 -->
## Get specific user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "/api/v1/users/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/users/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": "Access denied!"
}
```

### HTTP Request
`GET api/v1/users/{user}`


<!-- END_cedc85e856362e0e3b46f5dcd9f8f5d0 -->

#User authentication

Class AuthController available for user signup, login and verify request
<!-- START_8c0e48cd8efa861b308fc45872ff0837 -->
## User login

> Example request:

```bash
curl -X POST "/api/v1/login" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"eum","password":"quibusdam"}'

```

```javascript
const url = new URL("/api/v1/login");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "eum",
    "password": "quibusdam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "access_token": "uO3Qa_G76J6ARt1zUjXVxquyZ2amEp2fp3Owh5b3lWumGiT6qk",
        "token_type": "Bearer",
        "expires_at": "2020-07-15 17:09:43"
    }
}
```

### HTTP Request
`POST api/v1/login`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of user registered.
    password | string |  required  | The password of user.

<!-- END_8c0e48cd8efa861b308fc45872ff0837 -->

<!-- START_3ab4d7754472397e018957fa8110ac8c -->
## User logout

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "/api/v1/logout" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/logout");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": "User success response!"
}
```

### HTTP Request
`GET api/v1/logout`


<!-- END_3ab4d7754472397e018957fa8110ac8c -->

<!-- START_4cf43ae7106797d008aa14ddcc36599a -->
## User signup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "/api/v1/signup" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"email":"sint","password":"delectus","password_confirmation":"voluptate"}'

```

```javascript
const url = new URL("/api/v1/signup");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "email": "sint",
    "password": "delectus",
    "password_confirmation": "voluptate"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "email": "jacky@gmail.com",
        "verified": "0",
        "verification_token": "5ZIUdiY1tDizRaTARKV0V3lJaH3biTimqdYYWO8j",
        "last_update": "2019-07-15 15:42:18",
        "creation_date": "2019-07-15 15:42:18",
        "id": 1
    }
}
```

### HTTP Request
`POST api/v1/signup`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    email | string |  required  | The email of user.
    password | string |  required  | The password of user.
    password_confirmation | string |  required  | The password confirmation.

<!-- END_4cf43ae7106797d008aa14ddcc36599a -->

<!-- START_81657d16c1a8c01d49a35b993e210e0f -->
## Verify user account

> Example request:

```bash
curl -X GET -G "/api/v1/verify/1" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/verify/1");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{}
```

### HTTP Request
`GET api/v1/verify/{token}`


<!-- END_81657d16c1a8c01d49a35b993e210e0f -->

#User profile

Class ProfileController
<!-- START_cd0df6f69b0247f994a6ccfe27afb1a7 -->
## User show own profile

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET -G "/api/v1/profile" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL("/api/v1/profile");

let headers = {
    "Authorization": "Bearer {token}",
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 2,
        "user_id": 21,
        "first_name": "jacky",
        "last_name": "vu",
        "gender": "male",
        "address": "Vietnam",
        "phone": "1234567",
        "creation_date": "2019-07-15 15:45:27",
        "last_update": "2019-07-15 15:45:27"
    }
}
```

### HTTP Request
`GET api/v1/profile`


<!-- END_cd0df6f69b0247f994a6ccfe27afb1a7 -->

<!-- START_718ca1cf95e5e36ed6d871a10bf16ecd -->
## Store user profile

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST "/api/v1/profile" \
    -H "Authorization: Bearer {token}" \
    -H "Content-Type: application/json" \
    -d '{"first_name":"optio","last_name":"perferendis","gender":"rerum","address":"facilis","phone":"iste"}'

```

```javascript
const url = new URL("/api/v1/profile");

let headers = {
    "Authorization": "Bearer {token}",
    "Content-Type": "application/json",
    "Accept": "application/json",
}

let body = {
    "first_name": "optio",
    "last_name": "perferendis",
    "gender": "rerum",
    "address": "facilis",
    "phone": "iste"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 2,
        "user_id": 21,
        "first_name": "jacky",
        "last_name": "vu",
        "gender": "male",
        "address": "Vietnam",
        "phone": "1234567",
        "creation_date": "2019-07-15 15:45:27",
        "last_update": "2019-07-15 15:45:27"
    }
}
```

### HTTP Request
`POST api/v1/profile`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    first_name | string |  required  | The first name of user.
    last_name | string |  required  | The last name of user.
    gender | string |  required  | The gender of user.
    address | string |  required  | The address of user.
    phone | string |  required  | The phone of user.

<!-- END_718ca1cf95e5e36ed6d871a10bf16ecd -->


