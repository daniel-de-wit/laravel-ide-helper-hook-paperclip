<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\Integration;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

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

    #[Test]
    public function it_auto_registers_model_hook(): void
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

    #[Test]
    public function it_auto_registers_model_hook_with_wrong_service_provider_order(): void
    {
        /** @var Application $app */
        $app = $this->app;

        $app->loadDeferredProvider(LaravelIdeHelperHookPaperclipServiceProvider::class);
        $app->loadDeferredProvider(IdeHelperServiceProvider::class);

        /** @var Repository $config */
        $config = $app->get('config');

        $this->assertContains(
            PaperclipHook::class,
            (array) $config->get('ide-helper.model_hooks', []),
        );
    }
}
