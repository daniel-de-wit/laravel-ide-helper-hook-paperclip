<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\Integration;

use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider;
use Orchestra\Testbench\TestCase;

class LaravelIdeHelperHookPaperclipServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelIdeHelperHookPaperclipServiceProvider::class,
        ];
    }

    /**
     * @test
     */
    public function it_adds_the_paperclip_hook_to_the_config(): void
    {
        static::assertContains(PaperclipHook::class, config('ide-helper.model_hooks'));
    }
}
