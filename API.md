# API Endpoints

This API for Communes and wilaya in Algeria

## Endpoint 1

### Description

This endpoint is used for Store Wilaya

### Request

-   Method: POST
-   URL: `/api/wilayas/`
-
-   Body:
    This json acsept Array or singl
    ```json
    [
        {
            "id": "1",
            "code": "1",
            "name": "Adrar",
            "ar_name": "أدرار",
            "longitude": "27.9766155",
            "latitude": "-0.20396"
        },
        {
            "id": "1",
            "code": "1",
            "name": "Adrar",
            "ar_name": "أدرار",
            "longitude": "27.9766155",
            "latitude": "-0.20396"
        }
    ]
    ```

### Response

-   Status Code: 201 (OK)
-   Body:
    ```json
    { "message": "Wilayas created successfully" }
    ```

## Endpoint 2

### Description

This endpoint is used for Display all Wilaya ther are exsit in The database

### Request

-   Method: GET
-   URL: `/api/api/wilayas/`

### Response

-   Status Code: 201 (Created)
-   Body:
    ```json
    {
        "id": "1",
        "code": "1",
        "name": "Adrar",
        "ar_name": "أدرار",
        "longitude": "27.9766155",
        "latitude": "-0.20396"
    }
    ```

## Endpoint 3

### Description

This endpoint is used for edit wilaya

### Request

-   Method: GET
-   URL: `/api/api/wilayas/{id}`
-   Body:
    ```json
    {
        "code": "1",
        "name": "Adrar",
        "ar_name": "أدرار",
        "longitude": "27.9766155",
        "latitude": "-0.20396"
    }
    ```

### Response

-   Status Code: 201 (Update)
-   Body:
    ```json
    {
        "message": "Wilayas edit successfully"
    }
    ```
