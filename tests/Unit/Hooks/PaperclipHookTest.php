<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\Unit\Hooks;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Czim\Paperclip\Contracts\AttachmentInterface;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks\PaperclipHook;
use DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\stubs\ModelWithAttachment;
use Illuminate\Database\Eloquent\Model;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;

class PaperclipHookTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    #[Test]
    public function it_writes_paperclip_properties(): void
    {
        /** @var ModelsCommand|MockInterface $command */
        $command = Mockery::mock(ModelsCommand::class)
            ->shouldReceive('setProperty')
            ->once()
            ->with(
                'foobar',
                '\\Czim\\Paperclip\\Contracts\\AttachmentInterface|\\SplFileInfo|\\Czim\\FileHandling\\Storage\\File\\SplFileInfoStorableFile|\\Czim\\FileHandling\\Contracts\\Support\\RawContentInterface|string',
                true,
                true,
            )
            ->getMock();

        /** @var ModelWithAttachment|MockInterface $model */
        $model = Mockery::mock(ModelWithAttachment::class)
            ->shouldReceive('getAttachedFiles')
            ->once()
            ->andReturn([
                'foobar' => Mockery::mock(AttachmentInterface::class),
            ])
            ->getMock();

        (new PaperclipHook)->run($command, $model);
    }

    #[Test]
    public function it_does_not_write_paperclip_properties_if_the_model_is_not_attachable(): void
    {
        /** @var ModelsCommand|MockInterface $command */
        $command = Mockery::mock(ModelsCommand::class)
            ->shouldNotReceive('setProperty')
            ->getMock();

        (new PaperclipHook)->run($command, Mockery::mock(Model::class));
    }
}
