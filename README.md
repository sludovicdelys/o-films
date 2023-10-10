# O'films 

## Overview 

During my studies as a software engineer with O'clock, we had the opportunity to work on a variety of small projects with a diverse tool box of programming languages, technologies and frameworks. 🧰

One of those programming languages was PHP, and for this project we were tasked to create a plateform with the Laravel framework.🐘

We were given an ER schema that we had to respect as much as possible. We were provided a style guide so that we could create a simple but elegant user interface with the [Bulma](https://bulma.io/) framework. 

You can find below the instructions that we received : 

- display a list of films 
- display a list of series
- display a page with a form that allows the user to import a serie or a film from an external API called [API BetaSeries](https://www.betaseries.com/en/api/)
- generate migrations without including foreign keys and without using database tests 
- BONUS : Include foreign keys when generating migrations 
- BONUS : Build associations between all the database tables inside their corresponding models : movie, show, country, and genre

## Prerequesite 

For a local installation : 

- MySQL 8.0+
- PHP 8.0+
- [Composer](https://getcomposer.org/)
- [BetaSeries API key](https://www.betaseries.com/en/api/) 

## Installation 

1. First you should clone the project and install all the dependencies you will need to run this project locally. 

```composer install``` & ```npm install```

2. If you've successful installed MySQL your next step will be to create a database that you will name and provide user rights as you wish.

3. Next, a copy of the `.env.example` file, modify the following environment variables, add your API BetaSeries key and rename the file as `.env` 

```
APP_KEY= 
BETASERIES_API_KEY=
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

**🚨 The APP_KEY environment variable is very important for the security of your application as it used for all encrypted cookies, including session cookies. 🍪**

4. Therefore, don't forget to generate a new key 
➡️ ```php artisan key:generate```

5. Once this is done you can start run the migrations that I have provided for this project with this command : 
```
 php artisan migrate
```

6. You can check that your database has been successfully constructed
```
php artisan db mysql
```

7. Next, you will populate your database with the seeders that I have already written for this project.
```
php artisan db:seed
```

8. You can start MySQL server
```
mysql.server start
```

9. Tadaaa ✨ Everything should be running smoothly.









