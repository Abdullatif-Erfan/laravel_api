<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

# [Laravel Assignment App]
----------

## Getting started 

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)

Create a repository and name it 
    
    assignment_nextjs_ts_laravel

Create a sub repository and name it 
    
    api

Switch to the repo folder

    cd assignment_nextjs_ts_laravel\api

Clone the repository

    git clone git@github.com:Abdullatif-Erfan/laravel_api.git

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000


# API Endpoints

- Get students list:        [http://127.0.0.1:8000/student_list](http://127.0.0.1:8000/student_list).
- Add new student:          [http://127.0.0.1:8000/student_add](http://127.0.0.1:8000/student_add).
- Delete a student:         [http://127.0.0.1:8000/student_delete/28](http://127.0.0.1:8000/student_delete/28) 
- Get student by id:        [http://127.0.0.1:8000/student_by_id/28](http://127.0.0.1:8000/student_by_id/28).
- Update a student by id:   [http://127.0.0.1:8000/student_update/28](http://127.0.0.1:8000/student_update/28).


# Remained Tasks
- Testing
- Authentication
- .....