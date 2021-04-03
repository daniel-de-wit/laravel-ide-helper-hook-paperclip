<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\Unit\Providers;

use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Providers\LaravelIdeHelperHookPaperclipServiceProvider;
use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Contracts\Foundation\Application;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class LaravelIdeHelperHookPaperclipServiceProviderTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @var LaravelIdeHelperHookPaperclipServiceProvider
     */
    protected $provider;

    /**
     * @var Application|MockInterface
     */
    protected $app;

    protected function setUp(): void
    {
        parent::setUp();

        $this->app      = Mockery::mock(Application::class);
        $this->provider = new LaravelIdeHelperHookPaperclipServiceProvider($this->app);
    }

    /**
     * @test
     */
    public function it_adds_the_paperclip_hook_to_the_config(): void
    {
        /** @var Config|MockInterface $config */
        $config = Mockery::mock(Config::class)
            ->shouldReceive('get')
            ->with('ide-helper.model_hooks', [])
            ->andReturn([])
            ->getMock()
            ->shouldReceive('set')
            ->with('ide-helper.model_hooks', [PaperclipHook::class])
            ->getMock();

        $this->app->shouldReceive('isProduction')->andReturnFalse();
        $this->app->shouldReceive('get')->with('config')->andReturn($config);

        $this->provider->register();
    }

    /**
     * @test
     */
    public function it_does_not_add_the_paperclip_hook_to_the_config_when_in_production(): void
    {
        $this->app->shouldReceive('isProduction')->andReturnTrue();
        $this->app->shouldNotReceive('get')->with('config');

        $this->provider->register();
    }
}
