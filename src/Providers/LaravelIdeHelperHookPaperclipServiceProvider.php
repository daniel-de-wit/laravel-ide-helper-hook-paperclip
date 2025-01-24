<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Providers;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use Illuminate\Config\Repository;
use Illuminate\Console\Command;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class LaravelIdeHelperHookPaperclipServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * @var string
     */
    final const ModelsCommandAlias = 'laravel-ide-helper-hook-paperclip-command-alias';

    /**
     * @return list<class-string<Command>|string>
     */
    public function provides(): array
    {
        return [
            static::ModelsCommandAlias,
        ];
    }

    public function boot(): void
    {
        // Laravel only allows a single deferred service provider to claim
        // responsibility for a given class, interface, or service in the
        // provides() method. To ensure this provider is properly loaded
        // when running the ModelsCommand we bind an alias and use that instead.
        $this->app->alias(ModelsCommand::class, static::ModelsCommandAlias);
    }

    public function register(): void
    {
        $this->registerIdeHelperHook();
    }

    protected function registerIdeHelperHook(): void
    {
        /** @var Repository $config */
        $config = $this->app->get('config');

        $config->set(
            'ide-helper.model_hooks',
            array_merge(
                [PaperclipHook::class],
                (array) $config->get('ide-helper.model_hooks', []),
            ),
        );
    }
}
