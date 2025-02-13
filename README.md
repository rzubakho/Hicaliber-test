## Test task
This project was implemented as part of a test assignment from the company HICALIBER.

####
![alt text](https://raw.githubusercontent.com/rzubakho/Hicaliber-test/refs/heads/dev/hicaliber-test.jpg
)
####

## Project Setup

### Requirements

- Docker
- PHP >= 8.2
- MySQL >= 8.0
- Composer
- npm


### Installation

Clone the repository:

```bash
git clone https://github.com/rzubakho/Hicaliber-test.git
```

After cloning, navigate to the project directory.

```bash
cd Hicaliber-test
```

## Start the Docker Environment

### Use Laravel Sail to start the Docker environment.

```bash
./vendor/bin/sail up -d
```

This command builds and starts the containers specified in your Docker Compose file.

## Install Dependencies

### Install PHP dependencies.

```bash
./vendor/bin/sail composer install
```

### Set up the environment file
```bash
cp .env.example .env
# Modify the .env file with your database credentials
```

### Run migrations and seeders

```bash
./vendor/bin/sail artisan migrate --seed
```

## Install frontend dependencies
```bash
npm install
```
## Serve the application
In a new terminal
```bash
npm run dev
```

## API Endpoint: `api/property-data`

Standard Laravel pagination has been implemented, so `page` & `per_page` can be used to navigate through pages.

### Request Filter Parameters

`name`, `bedrooms`, `bathrooms`, `storeys`, `garages`, `min_price`, `max_price`

### Example Request

```http
GET /api/property-data?name=The&bedrooms=3&page=1&per_page=10
```

### Example Response

```json
{
    "current_page": 1,
    "data": [
        {
            "id": 7,
            "name": "The Greenholt Lane",
            "price": 293502,
            "bedrooms": 3,
            "bathrooms": 2,
            "storeys": 2,
            "garages": 2,
            "created_at": "2025-02-10T00:50:12.000000Z",
            "updated_at": "2025-02-10T00:50:12.000000Z"
        },
        {
            "id": 8,
            "name": "The Annabell Stravenue",
            "price": 486203,
            "bedrooms": 3,
            "bathrooms": 2,
            "storeys": 1,
            "garages": 1,
            "created_at": "2025-02-10T00:50:12.000000Z",
            "updated_at": "2025-02-10T00:50:12.000000Z"
        }
    ],
    "first_page_url": "http:\/\/localhost\/api\/property-data?page=1",
    "from": 1,
    "last_page": 1,
    "last_page_url": "http:\/\/localhost\/api\/property-data?page=1",
    "links": [
        {
            "url": null,
            "label": "&laquo; Previous",
            "active": false
        },
        {
            "url": "http:\/\/localhost\/api\/property-data?page=1",
            "label": "1",
            "active": true
        },
        {
            "url": null,
            "label": "Next &raquo;",
            "active": false
        }
    ],
    "next_page_url": null,
    "path": "http:\/\/localhost\/api\/property-data",
    "per_page": 10,
    "prev_page_url": null,
    "to": 3,
    "total": 3
}
```
