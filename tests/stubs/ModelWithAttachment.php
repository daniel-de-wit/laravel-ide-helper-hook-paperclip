<?php

namespace DanielDeWit\LaravelIdeHelperHookPaperclip\Tests\stubs;

use Czim\Paperclip\Contracts\AttachableInterface;
use Czim\Paperclip\Model\PaperclipTrait;
use Illuminate\Database\Eloquent\Model;

class ModelWithAttachment extends Model implements AttachableInterface
{
    use PaperclipTrait;
}
