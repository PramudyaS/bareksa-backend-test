<?php

namespace Domain\Tag\Actions;

use Domain\Tag\Models\Tag;
use Domain\Tag\Requests\TagRequest;

class UpdateTagAction
{
    public function execute(int $id,TagRequest $request) : Tag
    {
        $tag = Tag::findOrFail($id);
        $tag->name = $request->name;
        $tag->save();

        return $tag;
    }
}
