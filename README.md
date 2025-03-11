# Laravel IDE Helper Hook Paperclip

[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Tests](https://github.com/daniel-de-wit/laravel-ide-helper-hook-paperclip/actions/workflows/tests.yml/badge.svg)](https://github.com/daniel-de-wit/laravel-ide-helper-hook-paperclip/actions/workflows/tests.yml)
[![Coverage Status](https://coveralls.io/repos/github/daniel-de-wit/laravel-ide-helper-hook-paperclip/badge.svg?branch=main&kill_cache=1)](https://coveralls.io/github/daniel-de-wit/laravel-ide-helper-hook-paperclip?branch=main)
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

Docblocks will be added to the model

```php
* @property \Czim\Paperclip\Contracts\AttachmentInterface|\SplFileInfo|\Czim\FileHandling\Storage\File\SplFileInfoStorableFile|\Czim\FileHandling\Contracts\Support\RawContentInterface|string $image
```

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

- [Daniel de Wit](https://github.com/daniel-de-wit)
- [wimski](https://github.com/wimski)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
