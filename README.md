# ORIC WUM
<p>
Application is build using laravel latest version 11.x . You can read more on the official website.
</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>



## About Deployment

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Following steps should be taken for deployement:

- Create **.env** file and add enviornment variables. You can copy **.env.example** and replace values accordingly. Must add email server credentials beacuase after user registration , **email verification** is required.  
- run migrations on server by **php artisan migrate**.
- run development server or create build i.e. **npm run dev** or **npm run build**.
- run web server using **php artisan serve**.