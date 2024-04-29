# API Endpoints

This API for Communes and wilaya in Algeria

## Endpoint 1

### Description

This endpoint is used for Store Wilaya

### Request

-   Method: POST
-   URL: `/api/login`
-
-   Body:
    This json acsept Array or singl
    ```json
    { "email": "kheireddine.chebicheb@univ-tiaret.dz", "password": 1234567890 }
    ```

### Response

-   Status Code: 200 (OK)
-   Body:

    ```json
    {
        "token": "21|lSI0Dd5v3fKVdVkx8qQWs2HUQq71QPE0cVPkjfWc",
        "patient": {
            "id": 1,
            "firstname": "Jeffery",
            "lastname": "Kshlerin",
            "phone": "(479) 298-6327",
            "address": "7825 Kitty Corners\nLake Cathrine, DE 69821-3449",
            "email": "kheireddine.chebicheb@univ-tiaret.dz",
            "wilaya": {
                "id": 1,
                "code": "1",
                "name": "Adrar",
                "arabic_name": "أدرار",
                "longitude": "27.976616",
                "latitude": "-0.203960"
            },
            "commune": {
                "id": 64,
                "name": "Laghouat",
                "arabic_name": "الأغواط",
                "post_code": "03001",
                "wilaya_id": 3,
                "longitude": "33.793952",
                "latitude": "2.836850"
            }
        }
    }
    ```
