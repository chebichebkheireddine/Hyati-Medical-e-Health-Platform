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
    {
        "email": "bridgette88@example.net",
        "password": 1234567890
    }
    ```

### Response

-   Status Code: 200 (OK)
-   Body:

            ```json

        {[
            {
        "status": "success",
        "token": "2|AzeIKsr2LxNWQf9vc4m1oJC45OhGXw70nnwbyaol",
        "message": "Login successful",
        "patient": {
            "healthId": 1,
            "firstName": "Anjali",
            "lastName": "Treutel",
            "email": "bridgette88@example.net",
            "phone": "+1-918-310-6262",
            "street": "1788 Ryan Road Suite 204\nLake Theodoraville, MI 36024",
            "wilaya": 3,
            "baldya": 1,
            "generalMedicalRecord": 1,
            "card": 1
        }

    }
    ]
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
