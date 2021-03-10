<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Installation

Move into the project folder
```bash
$ cd LaravelECom
```
Install the project dependencies with composer
```bash
$ composer install
```

## Database configuration

Edit the .env file with your computer settings then run these commands
```bash
$ php artisan migrate
$ php artisan db:seed
```
Run the server
```bash
$ php artisan serve
```
Now, you're ready to make call on the API !

## API Documentation

### Identification

To access the API's endpoints, you'll need a token.
To get this token, make a call on **http://127.0.0.1:8000/api/auth/login** with email and password in the request body.
You can use ***test*** as email and ***password*** as password.

### School Years

Requests available for school years
- **GET http://127.0.0.1:8000/api/schoolyears** : Return all the school years informations
- **GET http://127.0.0.1:8000/api/schoolyears/{schoolyearsId}** : Return one school year informations
- **PUT http://127.0.0.1:8000/api/schoolyears/{schoolyearsId}** : Change the *name* and *ending_year* of a school year

### Students

Requests available for students
- **GET http://127.0.0.1:8000/api/students** : Return all the students informations
- **GET http://127.0.0.1:8000/api/students/{studentId}** : Return one student informations
- **GET http://127.0.0.1:8000/api/students?school_year_id={school_year_id}** : Return all the students informations for a specific school year
- **POST http://127.0.0.1:8000/api/students** : Create a student with the *first_name*, *last_name*, *age*, *starting_year* and *school_year_id* fields provided in the request body
- **PUT http://127.0.0.1:8000/api/students/{studentId}** : Change the *first_name*, *last_name*, *age*, *starting_year* and *school_year_id* of a student
- **DELETE http://127.0.0.1:8000/api/students/{studentId}** : Delete a specific student

### Professors

Requests available for students
- **GET http://127.0.0.1:8000/api/professors** : Return all the professors informations
- **GET http://127.0.0.1:8000/api/professors/{professorId}** : Return one professor informations
- **POST http://127.0.0.1:8000/api/professors** : Create a professor with the *first_name*, *last_name* and *starting_year* fields provided in the request body
- **PUT http://127.0.0.1:8000/api/professors/{professorId}** : Change the *first_name*, *last_name* and *starting_year* of a professor

### Subjects

Requests available for subjects
- **GET http://127.0.0.1:8000/api/subjects** : Return all the subjects informations
- **GET http://127.0.0.1:8000/api/subjects/{subjectId}** : Return one subject informations
- **POST http://127.0.0.1:8000/api/subjects** : Create a subject with the *name*, *starting_day*, *ending_day*, *professor_id* and *school_year_id* fields provided in the request body. Courses can't take more than 5 days
- **PUT http://127.0.0.1:8000/api/subjects/{subjectId}** : Change the *name*, *starting_day*, *ending_day*, *professor_id* and *school_year_id* of a subject
- **DELETE http://127.0.0.1:8000/api/subjects/{subjectId}** : Delete a specific subject

### Marks

Requests available for marks
- **GET http://127.0.0.1:8000/api/marks** : Return all the marks informations
- **GET http://127.0.0.1:8000/api/marks/{markId}** : Return one mark informations
- **GET http://127.0.0.1:8000/api/marks?student_id={student_id}** : Return all the marks for a specific student
- **POST http://127.0.0.1:8000/api/marks** : Create a mark with the *value*, *subject_id* and *student_id* fields provided in the request body.
- **PUT http://127.0.0.1:8000/api/marks/{markId}** : Change the *value*, *subject_id* and *student_id* of a mark
