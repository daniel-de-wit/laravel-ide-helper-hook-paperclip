<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Barryvdh\LaravelIdeHelper\Contracts\ModelHookInterface;
use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Contracts\AttachmentInterface;
use Illuminate\Database\Eloquent\Model;

class PaperclipHook implements ModelHookInterface
{
    public function run(ModelsCommand $command, Model $model): void
    {
        if (!$model instanceof AttachableInterface) {
            return;
        }

        foreach($model->getAttachedFiles() as $index => $attachment) {
            $command->setProperty(
                $index,
                '\\' . AttachmentInterface::class,
                true,
                true,
                '',
                false,
            );
        }
    }
}
