## Steps to install and run on your local system
1. $ git clone https://github.com/pvicky9586/Cur-Oil.git
2. $ cd directory
3. $ composer install
4. $ npm install
5. cp .env.example .env Add your database configuration in .env file (you can check my articles on how to achieve it https://devcode.la/tutoriales/laravel-5-base-de-datos-y-environment/)
6. $ php artisan migrate 
7. $ php artisan db:seed ('optional' in case you want to work with test data)
8. $ php artisan storage:link -> create symbolic link of folder'storage' 
9. cp Header.mp4 and logo.png in public/storage  
10. $ php artisan serve (if the server opens, http://127.0.0.1:8000, we are ready to start)
