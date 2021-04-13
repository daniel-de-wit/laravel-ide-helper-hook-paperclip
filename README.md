# Laravel IDE Helper Hook Paperclip

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/daniel-de-wit/laravel-ide-helper-hook-paperclip/run-tests?label=tests)](https://github.com/daniel-de-wit/laravel-ide-helper-hook-paperclip/actions?query=workflow%3Arun-tests+branch%3Amain)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/daniel-de-wit/laravel-ide-helper-hook-paperclip.svg?style=flat-square)](https://packagist.org/packages/daniel-de-wit/laravel-ide-helper-hook-paperclip)
[![Total Downloads](https://img.shields.io/packagist/dt/daniel-de-wit/laravel-ide-helper-hook-paperclip.svg?style=flat-square)](https://packagist.org/packages/daniel-de-wit/laravel-ide-helper-hook-paperclip)

A Laravel Package for adding [Laravel Paperclip](https://github.com/czim/laravel-paperclip) support to Laravel IDE Helper [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper).

## Installation

You can install the package via composer:

```bash
composer require --dev daniel-de-wit/laravel-ide-helper-hook-paperclip
```

The Paperclip Hook is loaded using [Package Discovery](https://laravel.com/docs/8.x/packages#package-discovery), when disabled read [Manual Installation](#manual-installation).

## Usage

Run standard model generation commands as normal:

`php artisan ide-helper:models "App\Models\Post"`

## Manual Installation
When disabled, register the LaravelIdeHelperHookPaperclipServiceProvider manually by adding it to your config/app.php
```php
/*
 * Package Service Providers...
 */
 DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider::class,
```

## Testing

```bash
composer test
```

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
