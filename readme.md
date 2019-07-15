### Description

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
    
### Run laravel Worker
    Open new terminal and run this command:
    > docker-compose exec app php artisan queue:listen
    
### Laravel passport
    Create new oauth2 client password, this client use for createToken:
    > docker-compose exec app php artisan passport:client --personal
    set name is: client_personal


