# Laravel IDE Helper Hook Paperclip

A Laravel Package for adding [Laravel Paperclip](https://github.com/czim/laravel-paperclip) support to Laravel IDE Helper [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper).

## Installation

You can install the package via composer:

```bash
composer require daniel-de-wit/laravel-ide-helper-hook-paperclip
```

The Paperclip Hook is loaded using [Package Discovery](https://laravel.com/docs/8.x/packages#package-discovery), when disabled read [Manual Installation](#manual-installation).

## Usage

Run standard model generation commands as normal:

`php artisan ide-helper:models "App\Models\Post"`

## Manual Installation
When disabled, register the LaravelIdeHelperHookPaperclipServiceProvider manually by adding it to your config/app.php
```php
/*
 * Package Service Providers...* Package Service Providers...
 */
 DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider::class,
```

## Credits

- [All Contributors](../../contributors)
