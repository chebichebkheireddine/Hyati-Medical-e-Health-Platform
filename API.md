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
        "status": "success",
        "token": "5|WLmC0FqpjWRWWCLy63MBsnqQziThOwsQMEezoIG2",
        "message": "Login successful",
        "patient": {
            "id": 1,
            "names": "JenniferAnderson",
            "birthDate": "2024-04-11",
            "phone": "224.770.0050",
            "email": "kheireddine.chebicheb@univ-tiaret.dz",
            "Address": {
                "address": "54717 Homenick Land\nEast Leonor, MD 77713",
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
