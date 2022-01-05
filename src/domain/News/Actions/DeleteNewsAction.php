<?php

namespace Domain\News\Actions;

use Domain\News\Models\News;
use Domain\Topic\Actions\DeleteTopicNewsAssociateAction;

class DeleteNewsAction
{
    public function execute(int $id) :void
    {
        $news = News::findOrFail($id);
        (new DeleteTopicNewsAssociateAction())->execute($news->id);
        (new DeleteNewsTagAssociateAction())->execute($news->id);
        $news->delete();
    }
}
