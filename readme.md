### Table of contents
1. [Setup laravel with docker](#docker)  
2. [Laravel worker](#worker)
3. [Laravel passport](#passport)
4. [Generate api docs](#document)
5. [Test](#test)

<a name="docker"></a>

### Setup laravel environment with docker 
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

<a name="worker"></a>

###  Laravel Worker
    Open new terminal and run this command to start laravel worker:
    > docker-compose exec app php artisan queue:listen

<a name="passport"></a>

### Laravel passport
    This project used laravel passport (oauth2) to authorization.
    Create new oauth2 client password, this client use for createToken:
    > docker-compose exec app php artisan passport:client --personal
    
    set name is: client_personal and add this name to PASSPORT_CLIENT_PERSONAL_NAME in .env file
    

<a name="document"></a>

### Generate api document
    You can access to link: http://localhost/docs to view api docs.
    Use laravel-apidoc-generator package.
    > docker-compose exec app php artisan config:cache                                                                          ✔  2164  01:06:38
    > docker-compose exec app php artisan apidoc:generate

<a name="test"></a>

### Testing
Using document to make sure APIs url correctly:

#### 1. Get client_credentials access token:
    POST: http://localhost/oauth/token
    body: {
        'grant_type': 'client_credentials',
        'client_id': 'id',
        'client_secret': 'screte'
    }
    
    response: client_credentials_access_token
    
#### 2. Using access token in previous step (step 1) to signup account:
    POST: http://localhost/api/v1/signup
    bodyParams: required params in api docs
    Header: Bearer {client_credentials_access_token}
    
    response: user account info

#### 3. Now you can use email and password that you registered to login and get user access token:
    POST: http://localhost/api/v1/login
    bodyParams: required follow api docs
    
    response: access_token
    
#### 4. Using user login access token (in step 3) to upload User profile (follow api docs):
    POST: http://localhost/api/v1/profile
    bodyParams: required follow api docs
    Header: Bearer {access_token}
    
    response: user profile info
    
#### 5. Access APIs resource users, you need push x-api-token and use client credentials access token in headers of request:
    GET: http://localhost/api/v1/users
    Header: Bearer {client_credentials_access_token}
            X-API-KEY: {key config in .env}


