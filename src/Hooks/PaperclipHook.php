<?php

declare(strict_types=1);

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Hooks;

use Barryvdh\LaravelIdeHelper\Console\ModelsCommand;
use Barryvdh\LaravelIdeHelper\Contracts\ModelHookInterface;
use Czim\FileHandling\Contracts\Support\RawContentInterface;
use Czim\FileHandling\Storage\File\SplFileInfoStorableFile;
use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Contracts\AttachmentInterface;
use Illuminate\Database\Eloquent\Model;
use SplFileInfo;

class PaperclipHook implements ModelHookInterface
{
    public function run(ModelsCommand $command, Model $model): void
    {
        if (!$model instanceof AttachableInterface) {
            return;
        }

        foreach($model->getAttachedFiles() as $name => $attachment) {
            $command->setProperty($name, $this->getTypes(), true, true, '', false);
        }
    }

    protected function getTypes(): string
    {
        return implode('|', [
            '\\' . AttachmentInterface::class,
            '\\' . SplFileInfo::class,
            '\\' . SplFileInfoStorableFile::class,
            '\\' . RawContentInterface::class,
            'string',
        ]);
    }
}
