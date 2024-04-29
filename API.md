# API Endpoints

This API for Communes and wilaya in Algeria

## Endpoint 1

### Description

This endpoint is used for Store Wilaya

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
