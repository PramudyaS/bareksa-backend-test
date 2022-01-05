<?php

namespace Domain\Tag\Actions;

use Domain\Tag\Models\Tag;
use Illuminate\Support\Facades\Cache;

class DeleteTagAction
{
    public function execute(int $id) : void
    {
        Tag::findOrfail($id)->delete();
        Cache::forget('tags');
    }
}
