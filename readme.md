## Table of contents
1. [Setup laravel with docker](#docker)  
2. [Laravel worker](#worker)
3. [Laravel passport](#passport)  
4. [Generate api docs](#document)
5. [Test](#test)

<a name="docker"/>
Setup laravel environment with docker 
- Laravel version 5.8
- Services include: Nginx, mariaDB:lastest, PHP:7.2

##### composer install
    Run: 
    > cp .env.dev .env
    
    Run composer install: 
    > docker run --rm -v $(pwd):/app composer install
    
##### Build docker container
    Build docker container: 
    > docker-compose up -d
    
    View background container service: 
    > docker ps

##### Clear cache and generate key  
    Generate key for .env in app container: 
    > docker-compose exec app php artisan key:generate
    
    Clear cache: 
    > docker-compose exec app php artisan config:cache

##### Access mysql and grant permission to user
    Access mysql: 
    > docker-compose exec db bash
    > mysql -u root -p (password: none)
    
    Create database: 
    > create database psp_account;
    
    Create new mysql user: 
    > CREATE USER 'jacky' IDENTIFIED BY 'password';
    
    Grant permissions to access and use the MySQL server: 
    > GRANT USAGE ON *.* TO 'jacky'@'%' IDENTIFIED BY 'password';
    > GRANT USAGE ON *.* TO 'jacky'@'localhost' IDENTIFIED BY 'password';
    
    Grant all privileges to a user on a specific database: 
    > GRANT ALL privileges ON `psp_account`.* TO 'jacky'@'%';
    > GRANT ALL privileges ON `psp_account`.* TO 'jacky'@'localhost';
    
    Apply changes made: 
    > FLUSH PRIVILEGES;
##### Rebuild service
    > docker-compose build
    
##### Migrate database
    > docker-compose exec app php artisan migrate
    
##### Docker logger
    > docker-compose logs --help

##### Check .env in app service
    run: 
    > docker-compose exec app cat .env

<a name="worker"/>
# Run laravel Worker
    Open new terminal and run this command:
    > docker-compose exec app php artisan queue:listen

<a name="passport"/>
#Laravel passport
    Create new oauth2 client password, this client use for createToken:
    > docker-compose exec app php artisan passport:client --personal
    set name is: client_personal

<a name="document"/>
## Generate api document
    Use laravel-apidoc-generator package.
    > docker-compose exec app php artisan config:cache                                                                          ✔  2164  01:06:38
    > docker-compose exec app php artisan apidoc:generate
    
    Access to link: http://localhost/docs to view api docs

<a name="test"/>
## Testing
Using document to make sure APIs url correctly:
1. Get client_credentials access token 
2. Using access token in previous step (step 1) to signup account
3. Now you can use email and password that you registered to login and get user access token
4. Using user login access token (in step 3) to access User profile (follow api docs)
5. Access APIs resource users, you need push x-api-token that config in .env file in headers of request 


