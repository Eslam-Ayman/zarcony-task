# Documentation of Zarcony Task
## About
This project is  for testing my skills in `RESTFul API`with Laravel  .
`Zarcony Task` is a RESTful API Project with 3 APIs for mobile/web app or to help to get manipulate on three modules `users`, `brands` and `products`.

## To Run
### You will need:
- apache server 2+
- php v 8+
- MySQL DBMS v 10+
- composer v 2+
- Postman ( https://www.getpostman.com/apps )
or you can use your prefer extension to your browser for example [ RestMan for opera ](https://addons.opera.com/en/extensions/details/restman/)

## Setup / configuration
 1. clone Repo 
    - `git clone https://github.com/Eslam-Ayman/zarcony-task.git`
    - go to into your project `cd zarcony-task/src`
 2. Install Composer Dependencies
    - ```composer install```
 3. Create a copy of your .env file
    - ```cp .env.example .env```
 4. Generate an app encryption key
    - ```php artisan key:generate```
    - If the application key is not set, your user sessions and other encrypted data will not be secure!
 5. Create an empty database for our application
 6. In the .env file, add database information to allow Laravel to connect to the database
 7. Migrate, Seed and and install Passport package with one comand 
    - `php artisian project:install`
    
    -- if you need to make it manullay, so please follow the next steps
        - `php artisian migrate:fresh --seed`
        - `php artisian passport:install`
8. Run your application 
    - by this command `php artisan serve`

## Start using API
1. open postman application
2. import this collection https://documenter.getpostman.com/view/8893146/UzQyrPkK
3. send  login request and make sure that the responce token has been added in the token variable in the collecation itselfe.
4. Note: if you are running your application on another domain rather than that  <http://127.0.0.1:8000>, so please make sure that you change collection varaibles domain with your running domin.

> Note: you can send any data as `json` or `form-data` in postman and in the `PUT` requests i have made them to post request with key `_method = put` to send the image via postman

Please Don't hesitate to contact me if you need any help to run the application.
## Program's Output
![N|Solid](https://i.ibb.co/DbQmqP6/image.png)

# License 
GNU GPL License
> Author : Eslam Ayman 
