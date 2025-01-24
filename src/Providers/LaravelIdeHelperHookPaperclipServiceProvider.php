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
     * @return list<class-string<Command>>
     */
    public function provides(): array
    {
        return [
            ModelsCommand::class,
        ];
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
