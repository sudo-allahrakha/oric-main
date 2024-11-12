# ORIC WUM
<p>
Application is build using laravel latest version 11.x . You can read more on the official website.
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Minimum Requirements
- PHP >= 8.2
- mysql >= 8.2
- composer >= 2.7.6
- node >= 20.18.0
- npm >= 10.8.0

### PHP Extensions
- Ctype PHP Extension
- cURL PHP Extension
- DOM PHP Extension
- Fileinfo PHP Extension
- Filter PHP Extension
- Hash PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PCRE PHP Extension
- PDO PHP Extension
- Session PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

### Email Server
Must have email server credentials as for each user registration, **email verification** is required.

## About Deployment



- Create **.env** file and add enviornment variables. You can copy **.env.example** and replace values accordingly. 
- run **composer install** command.
- run **npm install** command.
- run migrations on server by **php artisan migrate**.
- run seeders by **php artisan db:seed --class=AdminSeeder** to create admin user.
- run development server or create build i.e. **npm run dev** or **npm run build**.
- run web server using **php artisan serve**.
- Default admin credentials are **admin@wum.edu.pk** and password is **password**.After login you can change email and password.

### Laravel Documentation for Deployment
- [Laravel Documentation](https://laravel.com/docs/11.x/deployment)