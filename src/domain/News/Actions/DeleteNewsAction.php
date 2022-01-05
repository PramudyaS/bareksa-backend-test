<?php

namespace Domain\News\Actions;

use Domain\News\Models\News;

class DeleteNewsAction
{
    public function execute(int $id) :void
    {
        News::findOrFail($id)->delete();
    }
}
