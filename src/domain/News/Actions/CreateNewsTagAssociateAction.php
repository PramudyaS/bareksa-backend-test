<?php

namespace Domain\News\Actions;

use Domain\News\Models\NewsTag;

class CreateNewsTagAssociateAction
{
    public function execute(int $news_id,int $tag_id)
    {
        $associate = new NewsTag();
        $associate->news_id = $news_id;
        $associate->tag_id  = $tag_id;
        $associate->save();

        return $associate;
    }
}
