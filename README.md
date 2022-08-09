# Laptopify

## What is Laptopify?

Laptopify is an application for Decision Support System that can be use for recommendation when selecting laptop in e-commerce. This app is built as final project for my thesis, so it's required more improvement. Feel free to check it out.

## Updates

there are 2 branches in the repository which is for `basic-no-auth` is really mean to be like the branch's name whereas `master` branch is complete with authentication. The last one is `get-data-by-automatic` u can use this branch for more benefit with getting data.

## Setup

- clone or download app

```
git clone https://github.com/hafizulf/laptopify.git
```

- copy `env` & rename to `.env` to setup your local environment

```
# copy
cp env .env

# activate and change app base url, example:
app.baseURL = 'http://localhost:8080/'

# activate and setup database, example:
database.default.hostname = '127.0.0.1'
database.default.database = laptopify
database.default.username = user
database.default.password = pass
database.default.DBDriver = MySQLi
database.default.DBPrefix =
```

- Install app dependencies

```
  # run composer
  composer install
```

- create a new `database` and migrate

```
  php spark migrate
```

- run `seeder.sh` for running all seeder

```
  # run seeder.sh
  ./seeder.sh
  # or run each seeder
  php spark db:seed seederName
```

- run the application

```
# default
php spark serve

# custom port
php spark serve --port 3036

```

- now you can login using these default accounts

```
  # [admin role]
  # username and password: admin123
  # [user role]
  # username and password: user123
```

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
