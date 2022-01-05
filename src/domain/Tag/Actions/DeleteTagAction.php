<?php

namespace Domain\Tag\Actions;

use Domain\Tag\Models\Tag;

class DeleteTagAction
{
    public function execute(int $id) : void
    {
        Tag::findOrfail($id)->delete();
    }
}
