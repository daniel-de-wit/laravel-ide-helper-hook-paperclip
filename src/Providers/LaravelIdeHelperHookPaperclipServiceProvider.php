<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Providers;

use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use Illuminate\Support\ServiceProvider;

class LaravelIdeHelperHookPaperclipServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->isProduction()) {
            return;
        }

        config([
            'ide-helper.model_hooks' => array_merge([
                PaperclipHook::class,
            ], config('ide-helper.model_hooks', [])),
        ]);
    }
}
