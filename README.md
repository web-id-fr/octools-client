# Octools Client

[![Latest Version on Packagist](https://img.shields.io/packagist/v/octools/client.svg?style=flat-square)](https://packagist.org/packages/octools/client)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/octools/client/run-tests?label=tests)](https://github.com/octools/client/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/octools/client/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/octools/client/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/octools/client.svg?style=flat-square)](https://packagist.org/packages/octools/client)

write description here

## Installation

You can install the package via composer:

```bash
composer require octools/client
```

You can publish the config file with:

```bash
php artisan vendor:publish --provider="Octools\Client\OctoolsClientServiceProvider" 
```

This is the contents of the published config file:

```php
return [
    /**
     * App token require to call Octools api
     */
    'application_token' => env('OCTOOLS_CLIENT_APP_TOKEN') ?? '',
];
```

## Credits

- [Clément REPEL](https://github.com/CLEMREP)
- [Léo TIOLLIER](https://github.com/LTiollier)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
