# Laravel RESTful API
An example building RESTful API using Laravel Framework with database mongoDB

### Prerequisites
- PHP 7.2 or Higher
- Composer
- mongoDB 4.2

### Installation

#### Clone this project

``` sh
$ git clone git@github.com:kemalnw/laravel-rest-api.git
```

#### Installing all dependency
``` sh
$ composer install
```

### Configuration
#### Copying the .env file
``` sh
$ cp .env.example .env
```
And then, change it according with your configuration
#### Generate Application Key
``` sh
$ php artisan key:generate
```

### Local Development Server
If you have PHP installed locally and you would like to use PHP's built-in development server to serve your application, you may use the serve Artisan command.
``` sh
$ php artisan serve
```