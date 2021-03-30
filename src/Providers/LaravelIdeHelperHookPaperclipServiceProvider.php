<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Providers;

use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperClipHook;
use Illuminate\Support\ServiceProvider;

class LaravelIdeHelperHookPaperclipServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        \Log::info('register!!!!');
        config([
            'ide-helper.model_hooks' => array_merge([
                PaperClipHook::class,
            ], config('ide-helper.model_hooks', [])),
        ]);
    }
}
