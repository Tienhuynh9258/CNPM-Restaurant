In here, we will do the Task4 :Implement 
We build with the Laravel structure with MVC Model
To run the project, following these steps:
  1. Using xampp, put folder in xampp/htdocs and turn on the xampp
  2. There are 4 file with .sql tag in folder database:
    + Restaurant.sql is to create table:
    + res_database.sql is the data to table
    + GRANT-DML-Restaurant.sql is for procedure
    + message.sql is the additional revenue data
     We must run all these files sequentially in MySQL software and having the schema 'RESTAURANT' in MySQL.
     In there, I use the root and don't have password.
  3. Run these commands and you can access with web. (Note: At least PHP version 8)
     - php artisan key:generate 
     - php artisan migrate  
     - php artisan db:seed
     - php artisan serve

HOPE YOU CAN RUN THE PROJECT
