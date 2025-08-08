# README

This README document includes whatever steps are necessary to get the Tryo pm tool API up and running.


### Clone the repository


```
https://github.com/chathuSE1991/football_score.git
```

### Switch to the folder

```
cd football_score
```

### .env file 

- Copy the .env.example file and rename it as .env 
- Replace the "DB_HOST=127.0.0.1" with the following line

```
```




### Prerequisites

```
PHP >= v8.2
Laravel >= v11
MySQL >= v5.7
composer 2
```


### Install all the dependencies using composer

```
composer install
```

### MySQL DB setup

-   Create an empty schema called 'football_score'

### Run the database migrations & seeder

```
php artisan migrate:fresh --seed --seeder=DatabaseSeeder
```





## Run tests

Compiles and hot-reloads for development

```
php artisan serve

npm run dev

php artisan reverb:start

php artisan queue:listen 

```

## Built With

-   Laravel - Framework | Backend Development
-   Laravel Reverb
-   MySQL - Database
