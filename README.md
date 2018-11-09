# Status History for Laravel Models

## Description

This package is currently under development. Use it at your own risk.

## Installation

This package can be installed throught Composer

```
composer require firstpoint/status-history

// Then migrate
php artisan migrate
```

Then add the HasStatus trait to your models:

```
...
use StatusHistory\Traits\HasStatus;

class Order extends Model
{
    use HasStatus;

    ...
}
```

