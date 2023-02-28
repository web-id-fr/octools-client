# Octools Client

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
    'application_token' => env('OCTOOLS_CLIENT_APP_TOKEN', ''),
    
    /**
     * Endpoint url, production by default. Change it only for development.
     */
    'octools_api_url' => env('OCTOOLS_API_URL', 'https://app.octools.io/api')
];
```

## Credits

- [Clément REPEL](https://github.com/CLEMREP)
- [Léo TIOLLIER](https://github.com/LTiollier)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
