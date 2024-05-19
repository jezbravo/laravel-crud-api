<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Description

This is a basic CRUD application to, in this case, organize information about students.

### Stack

-   PHP
-   Composer
-   Laravel
-   MySQL
-   Railway

## Setup

First of all you must clone the repository:

```sh
git clone https://github.com/jezbravo/laravel-crud-api.git
cd laravel-crud-api
```

Then install the dependencies:

```php
php artisan install:api
```

And run the db migration:

```php
php artisan migrate
```

Once everything is ready:

```php
php artisan serve
```

## Demo

As this is a backend-focused application, it does not have its own frontend graphical interface for client interaction yet. Instead you can try the different requests using services like Postman to the following routes:

GET, POST:

https://laravel-crud-api-production-816a.up.railway.app/api/students

---

GET, PUT, PATCH, DELETE:

https://laravel-crud-api-production-816a.up.railway.app/api/students/{id}

Here is an example template with the required fields for the request body:

{

    "name": "test_user_name_0",

    "email": "test_user_name_0@email.com",

    "phone": "0123456789",

    "language": "en"

}
