
[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/support-ukraine.svg?t=1" />](https://supportukrainenow.org)

# This is my package toad-client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/web-id/toad-client.svg?style=flat-square)](https://packagist.org/packages/web-id/toad-client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/web-id/toad-client/run-tests?label=tests)](https://github.com/web-id/toad-client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/web-id/toad-client/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/web-id/toad-client/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/web-id/toad-client.svg?style=flat-square)](https://packagist.org/packages/web-id/toad-client)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/toad-client.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/toad-client)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require web-id/octools-client
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="toad-client-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="toad-client-config"
```

This is the contents of the published config file:

```php
return [
];
```

Optionally, you can publish the views using

```bash
php artisan vendor:publish --tag="toad-client-views"
```

## Usage

```php
$toadClient = new WebId\OctoolsClient();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [CLEMREP](https://github.com/web-id-fr)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
