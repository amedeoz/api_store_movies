api_store_movies
==============

# Registering and searching for movies via api using Symfony Framework

License: MIT

Changes to run this project quickly:
--------

* Create an .env file based .env_example file at the root of the project with value:

    DATABASE_URL=mysql://user:password@server:3306/store_movies_week


* Run command :
--------        
       
    composer install
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    symfony serve


<br />
<br />
<br />

* URL access Swagger:
--------------------------

    URL => http://127.0.0.1:8000/api/doc

![Show_Swagger](https://github.com/laurohen/api_store_movies/blob/master/images/swagger_mini.PNG)

    
    
   * List api - endpoints available 
    
    php bin/console debug:route
    
![ShowAPI](https://github.com/laurohen/api_store_movies/blob/master/images/api.png):
  
    
    
    










