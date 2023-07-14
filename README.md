# Event management

## Table of Contents

- [Description](#description)
- [Installation](#installation)
- [Routes](#routes)

## Description

The Event CRUD operations in this Laravel application allow you to manage events. The application provides functionality for creating, reading, updating, and deleting events.

## Installation

Installation
To set up the Laravel Event CRUD operations, follow these steps:

Clone the repository:
```sh
git clone https://github.com/Parthfaladu/event-management.git
```

Navigate to the project directory:
```sh
cd event-management
```

Install the dependencies using Composer:
```sh
composer install
```

Create a copy of the .env.example file and rename it to .env. Update the database configuration in the .env file with your database credentials:
```sh
cp .env.example .env
```

Generate the application key:
```sh
php artisan key:generate
```

Run the database migrations to create the required tables:
```sh
php artisan migrate
```

Seed the database with sample data:
```sh
php artisan db:seed
```

Start the development server:
```sh
php artisan serve
```

Compile files:
```sh
php artisan dev
```

This will start the server, and you can access the application at http://localhost:8000 in your web browser.

You're all set! You can now use the Laravel Event CRUD operations by accessing the appropriate routes and interacting with the application.

## Routes

Available routes for the Event CRUD operations:

- `GET /events` - Retrieves all events (index method in the EventController)
- `GET /events/{id}` - Retrieves a specific event (show method in the EventController)
- `POST /events` - Creates a new event (store method in the EventController)
- `PUT/PATCH /events/{id}` - Updates an existing event (update method in the EventController)
- `DELETE /events/{id}` - Deletes an event (destroy method in the EventController)
