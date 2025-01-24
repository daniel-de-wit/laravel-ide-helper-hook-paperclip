<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\Integration;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase;

class LaravelIdeHelperHookPaperclipServiceProviderTest extends TestCase
{
    /**
     * {@inheritDoc}
     */
    protected function getPackageProviders($app): array
    {
        return [
            IdeHelperServiceProvider::class,
            LaravelIdeHelperHookPaperclipServiceProvider::class,
        ];
    }

    /**
     * @test
     */
    public function it_auto_registration_off_model_hook(): void
    {
        /** @var Application $app */
        $app = $this->app;

        $app->loadDeferredProvider(IdeHelperServiceProvider::class);
        $app->loadDeferredProvider(LaravelIdeHelperHookPaperclipServiceProvider::class);

        /** @var Repository $config */
        $config = $app->get('config');

        $this->assertContains(
            PaperclipHook::class,
            (array) $config->get('ide-helper.model_hooks', []),
        );
    }
}
