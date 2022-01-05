<?php

namespace Domain\News\Actions;

use Domain\News\Models\NewsTag;

class DeleteNewsTagAssociateAction
{
    public function execute(int $news_id,int $tag_id = null)
    {
        $associate = NewsTag::where('news_id',$news_id)
            ->where('tag_id',$tag_id)
            ->delete();
    }
}
