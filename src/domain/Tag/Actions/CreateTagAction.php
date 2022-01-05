<?php

namespace Domain\Tag\Actions;

use Domain\Tag\Models\Tag;
use Domain\Tag\Requests\TagRequest;
use Illuminate\Support\Facades\Cache;

class CreateTagAction
{
    public function execute(TagRequest  $request) : Tag
    {
        $tag = new Tag();
        $tag->name = $request->name;
        $tag->save();

        Cache::forget('tags');

        return $tag;
    }
}
