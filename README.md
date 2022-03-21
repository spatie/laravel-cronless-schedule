
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# Run the Laravel scheduler without relying on cron

[![Latest Version on Packagist](https://img.shields.io/packagist/v/spatie/laravel-cronless-schedule.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-cronless-schedule)
![Tests](https://github.com/spatie/laravel-cronless-schedule/workflows/Tests/badge.svg)
![Psalm](https://github.com/spatie/laravel-cronless-schedule/workflows/Psalm/badge.svg)
[![Total Downloads](https://img.shields.io/packagist/dt/spatie/laravel-cronless-schedule.svg?style=flat-square)](https://packagist.org/packages/spatie/laravel-cronless-schedule)

[Laravel's native scheduler](https://laravel.com/docs/master/scheduling) relies on cron to be executed every minute. It's rock solid and in most cases you should stick to using it.

If you want to simulate the scheduler running every minute in a test environment, using cron can be cumbersome. This package provides a command to run the scheduler every minute, without relying on cron. Instead it uses a [ReactPHP](https://reactphp.org) loop.

This is how you can start the cronless schedule:

```bash
php artisan schedule:run-cronless
```

This command will never end. Behind the scenes it will execute `php artisan schedule` every minute. 
 
## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/laravel-cronless-schedule.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/laravel-cronless-schedule)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer. Probably you only want to use this schedule in a development environment.

```bash
composer require spatie/laravel-cronless-schedule --dev
```

## Usage

This is how you can start the cronless schedule:

```bash
php artisan schedule:run-cronless
```

By default, it will run every minute. 

### Manually triggering a run

To perform an extra run of the scheduler, just press enter.

### Using an alternative frequency

If you want to run the scheduler at another frequency, you can pass an amount of seconds to the `frequency` option. Here is an example where the schedule will be run every 5 seconds.

```bash
php artisan schedule:run-cronless --frequency=5
```

### Using another command

If you want to run another command instead of the scheduler, just can pass it to the `command` option. Here is an example where another command will be run every 5 seconds.

```bash
php artisan schedule:run-cronless --command=your-favorite-artisan-command
```

### Only run the schedule for a certain period

By default, the command will run forever. You can shorten that period by passing an amount of seconds to the `stop-after-seconds` option.

In this example we'll stop the command after 5 seconds

```bash
php artisan schedule:run-cronless --stop-after-seconds=5
```

## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security

If you've found a bug regarding security please mail [security@spatie.be](mailto:security@spatie.be) instead of using the issue tracker.

## Credits

- [Freek Van der Herten](https://github.com/freekmurze)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
