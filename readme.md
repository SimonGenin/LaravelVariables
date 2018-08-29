# LaravelVariables

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Refactor variables that are meant to be global out of your source code.

## Note

This is my first package.

## Installation

Via Composer

``` bash
$ composer require simongenin/laravelvariables
```

Publish the config file were your global variables will live

```bash
$ php artisan vendor:publish --tag=variables.config
```

## Usage

It does the same thing as the *config* helper, with more ways to call it. 

The goal here was to have a strict seperation for varaibles that are global, but don't belong in another configuration file.

Once installed, you will have a new configuration file, called "variables.php". Just like any other config file, you can define many values by using nested array.

Here's an exemple of what it could be used for:

```php
<?php

return [

    /**
     * Define variables that have a reason to be global
     */
    
    'subscription' => [
        'monthly' => 19,
        'yearly' => 199,
        'lifetime' => 299
    ],

    'subtitle' => [
        'ATest' => 'A nice little package!',
        'BTest' => 'A wonderful little package!',
    ],

    'me' => [
        'email' => env('PERSONAL_CONTACT_MAIL', 'no@hotmail.com')
    ]

];
```

And here is how you can retrieve the values in your code:

```php

/*
 * There are several way you can ask for a variable
 */
$caller = new SimonGenin\LaravelVariables\LaravelVariables();
$cost = $caller->get('subscription.yearly');
$cost = $caller->__v('subscription.yearly');
$cost = $caller('subscription.yearly');

/*
 * You can use the config helper
 */
$cost = config('variables.subscription.lifetime');

/*
 * You can use the app helper to get the singleton instance
 */
$caller = app('variables');
$cost = $caller('subscription.monthly');
$cost = app('variables')->get('subscription.monthly');
$cost = app('variables')('subscription.monthly');

/*
 * You can call it dynamically by the resource name in camel case
 */
$caller = new SimonGenin\LaravelVariables\LaravelVariables();
$cost = $caller->subscriptionYearly();

/*
 * Same, but partly method call name and partly arguments
 */
$caller = new SimonGenin\LaravelVariables\LaravelVariables();
$cost = $caller->subscription('yearly');

/**
 * The two last methods are fancy, but a hell regarding project management.
 * Don't abuse it, especially on big projects.
 */

```

## License

MIT

[ico-version]: https://img.shields.io/packagist/v/simongenin/laravelvariables.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/simongenin/laravelvariables.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/simongenin/laravelvariables/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/simongenin/laravelvariables
[link-downloads]: https://packagist.org/packages/simongenin/laravelvariables
[link-travis]: https://travis-ci.org/simongenin/laravelvariables
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/simongenin
[link-contributors]: ../../contributors]
