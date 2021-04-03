<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Providers;

use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\ServiceProvider;

class LaravelIdeHelperHookPaperclipServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        if ($this->app->isProduction()) {
            return;
        }

        /** @var Config $config */
        $config = $this->app->get('config');

        $config->set('ide-helper.model_hooks', array_merge([
            PaperclipHook::class,
        ], $config->get('ide-helper.model_hooks', [])));
    }
}
