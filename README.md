# Status Logger for Laravel Models

## Description

**Currently under development. Use it at your own risk.**

This package adds statuses to you models. It uses model events to push statuses to a log and let you keep the current ```status_id``` on the model itself.

## Installation

This package can be installed throught Composer

```
composer require firstpoint-ch/laravel-status-logger
```

If you're using Laravel 5.5 or higher, you can skip this part. If not, register the service provider by adding this line in your ```app/config.php```.

```
'providers' => [

    // ...
    StatusLogger\StatusLoggerServiceProvider::class,

];
```

Publish the migration with

```
php artisan vendor:publish --provider="StatusLogger\StatusLoggerServiceProvider" --tag="migrations"
```

And add your customer pivot columns before ```php artisan migrate```.

Then you can publish the config file with

```
php artisan vendor:publish --provider="StatusLogger\StatusLoggerServiceProvider" --tag="config"
```

Then add the ```HasStatus``` trait to your models:

```
...
use StatusLogger\Traits\HasStatus;

class Order extends Model
{
    use HasStatus;

    ...
}
```

