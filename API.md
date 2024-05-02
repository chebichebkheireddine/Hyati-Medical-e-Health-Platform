# API Endpoints

This API for Hayati Medical Integration System

## Endpoint 1

### Description

This endpoint is used for Acsses Patient to The system

### Request

-   Method: POST
-   URL: `/api/login`
-   Body:
    ```json
    { "email": "donJwo@example.com", "password": 1234567890 }
    ```

### Response

-   Status Code: 200 (OK)
-   Body:

    ```json
    {
        "status": "success",
        "token": "2|lLj1bExlwAhnzbRITP9rPO8Kmzbm1UwxYki5Ngia",
        "message": "Login successful",
        "patient": {
            "id": 7,
            "firstName": "Enid",
            "lastName": "Ziemann",
            "birthDate": "1983-05-22",
            "gender": "F",
            "phone": "602-423-8937",
            "email": "ankunding.leslie@example.com",
            "Address": {
                "address": "1230 Sigrid Row\nLake Marleetown, ND 61613",
                "wilaya": {
                    "name": "Adrar",
                    "arabic_name": "أدرار"
                },
                "commune": {
                    "name": "Charouine",
                    "arabic_name": "شروين"
                }
            }
        }
    }
    ```

## Endpoint 2

### Description

This endpoint isfor select Baldya based on Wilay

### Request

-   Method:GET
-   URL: `/api/wilayas/baldya/{id}`

### Response

-   Status Code: 200 (OK)
-   Body:

    ````json

        ```
        [
    {
        "id": 487,
        "name": "Tizi Ouzou",
        "arabic_name": "تيزي وزو",
        "post_code": "15001",
        "wilaya_id": 15,
        "longitude": "36.700186",
        "latitude": "4.005917"
    },
    {
        "id": 488,
        "name": "Ain El Hammam",
        "arabic_name": "عين الحمام",
        "post_code": "15002",
        "wilaya_id": 15,
        "longitude": "36.572550",
        "latitude": "4.246757"
    },
    ....]

    ````
