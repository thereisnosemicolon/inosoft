1. install aplikasi :
- install mongodb (on windows) (url : https://i12bretro.github.io/tutorials/0392.html);
- install composer (composer install in cmd/gitbash)
- Run cp .env.example .env in cmd/gitbash
- add at .env:
DB_CONNECTION=mongodb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=inosoft
DB_USERNAME=root
DB_PASSWORD=

- also add this at .env on the top of JWT_SECRET:
JWT_TTL=9999999

Run php artisan key:generate
Run php artisan jwt:secret
Run php artisan serve

Ready to go!

2. postman documentation : 
- click url https://elements.getpostman.com/redirect?entityId=21406118-0aa3009e-c096-4b20-96da-7a7395e6c936&entityType=collection
the steps :
a. You need to go to Register, regist your account there
b. After that, you can login with your data
c. Login will show some data like access-token, copy it, and paste on authorization with options "bearer token"
d. copy the access token to the all of given routes here
e. good, ready to go! 
