In here, we will do the Task4 :Implement 
We build with the Laravel structure with MVC Model
To run the project, following these steps:
  1. Using xampp, put folder in xampp/htdocs and turn on the xampp
  2. There are 3 file with .sql tag, restaurant is to create table, res_database is the data to table, and GRANT-DML-Restaurant is for procedure
     We must run all these files in MySQL software and having the schema 'RESTAURANT' in MySQL.
     In there, I use the the root and don't have password.
  3. Run these commands and you can access with web.
     - php artisan key:generate 
     - php artisan migrate  
     - php artisan db:seed
     - php artisan serve
HOPE YOU CAN RUN THE PROJECT
