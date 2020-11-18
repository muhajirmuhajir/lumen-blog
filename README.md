# Lumen Blog API Kelompok 1

   |Nama                     |NIM       |Kelas|
   |-------------------------|---------------|-|
   |Alvan Dwi Akbar A.       |185150701111005|A|
   |Moh Izza Auladina L.     |185150707111009|B|
   |Joey Vilbert             |185150707111001|B|
   |Muhajir                  |185150701111010|A|
   |Yanuar Octavianus        |185150700111006|B|
   |Denny Manuel Yeremia S.  |185150707111004|A|
   |Andi Achmad Fauzi R.     |185150701111004|A|

<br>

## API Specification

Klik Untuk Dokumentasi Lebih Lanjut [disini](https://web.postman.co/collections/9109368-6e704b60-93a0-488a-aa4c-7c14cf480ecd?version=latest&workspace=dceec346-2fe8-4f0b-bc08-7758a87d0f0c)

<br>

### Login User

Request :

-   Method : POST
-   Endpoint : `/user/login`
-   Body :
    -   username : string
    -   email : string
    -   password : string

Response :

```json
{
    "access_token": "string",
    "token_type": "string",
    "expires_in": "number"
}
```

<br>

### Register User

Request :

-   Method : POST
-   Endpoint : `/user/register`
-   Body :
    -   username : string
    -   email : string
    -   password : string

Response :

```json
{
    "email": "joey0@gmail.com",
    "username": "joeyvilbert0",
    "updated_at": "2020-11-18T01:47:20.000000Z",
    "created_at": "2020-11-18T01:47:20.000000Z",
    "id": 17
}
```

<br>

### Get User

Request :

-   Method : GET
-   Endpoint : `/user`
-   Header :
    -   Authorization : bearer string

Response :

```json
[
  {
    "id": 1,
    "email": "jermey71@hessel.org",
    "username": "Diana",
    "created_at": "2020-11-18T01:28:32.000000Z",
    "updated_at": "2020-11-18T01:28:32.000000Z"
  },
  {
    "id": 2,
    "email": "miller.clair@hotmail.com",
    "username": "Darion",
    "created_at": "2020-11-18T01:28:33.000000Z",
    "updated_at": "2020-11-18T01:28:33.000000Z"
  }
]
```

<br>

### Get User By ID

Request :

-   Method : GET
-   Endpoint : `/user/{user_id}`
-   Header :
    -   Authorization : bearer string

Response :

```json
[
  {
    "id": 1,
    "email": "jermey71@hessel.org",
    "username": "Diana",
    "created_at": "2020-11-18T01:28:32.000000Z",
    "updated_at": "2020-11-18T01:28:32.000000Z"
  }
]
```

<br>

### Update User By ID

Request :

-   Method : PUT
-   Endpoint : `/user/{user_id}`
-   Header :
    -   Authorization : bearer string
-   Body :
    -   username : string
    -   email : string
    -   password : string
  
Response :

```json
{
    "message": "User has been updated"
}
```

<br>

### Delete User By ID

Request :

-   Method : DELETE
-   Endpoint : `/user/{user_id}`
-   Header :
    -   Authorization : bearer string

Response :

```json
{
    "message": "User has been deleted"
}
```

<br>

### Logout User

Request :

-   Method : POST
-   Endpoint : `/user/logout`
-   Header :
    -   Authorization : bearer string

Response :

```json
{
    "msg": "logout berhasil"
}
```

<br>

### Get Post

Request :

-   Method : GET
-   Endpoint : `/post`

Response :

```json
[
    {
        "id": 1,
        "title": "Maiores illum autem.",
        "body": "Alice, who had got so much surprised, that for the Duchess began in a long, low hall, which was."
    },
    {
        "id": 2,
        "title": "Quam dolorem.",
        "body": "The Mouse gave a look askance-- Said he thanked the whiting kindly, but he would deny it too: but."
    }
]
```

<br>

### Get Post By ID (Detail)

Request :

-   Method : GET
-   Endpoint : `/post/{post_id}`

Response :

```json
{
   
    "id": 2,
    "title": "Quam dolorem.",
    "body": "The Mouse gave a look askance-- Said he thanked the whiting kindly, but he would deny it too: but.",
    "created_at": "2020-11-18T01:28:22.000000Z",
    "updated_at": "2020-11-18T01:28:22.000000Z"

}
```

<br>

### Create POST

Request :

-   Method : POST
-   Endpoint : `/post`
-   Header :
    -   Authorization : bearer string
-   Body :
    - title : string
    - body : string
  
Response :

```json
{

    "id": 2,
    "title": "Quam dolorem.",
    "body": "The Mouse gave a look askance-- Said he thanked the whiting kindly, but he would deny it too: but.",
    "created_at": "2020-11-18T01:28:22.000000Z",
    "updated_at": "2020-11-18T01:28:22.000000Z"

}
```

<br>

### Update POST

Request :

-   Method : PUT
-   Endpoint : `/post/{post_id}`
-   Header :
    -   Authorization : bearer string
-   Body :
    - title : string
    - body : string

Response :

```json   
{
    "message": "Post has been updated"
}
```

<br>

### Delete POST

Request :

-   Method : DELETE
-   Endpoint : `/post/{post_id}`
-   Header :
    -   Authorization : bearer string

Response :

```json
{
    "message": "Post has been deleted"
}
```

