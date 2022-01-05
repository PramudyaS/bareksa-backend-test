<?php

namespace Domain\Topic\Actions;

use Domain\Topic\Models\TopicNews;

class DeleteTopicNewsAssociateAction
{
    public function execute(int $news_id,int $topic_id = null)
    {
        $associate = TopicNews::where('news_id',$news_id)
            ->where('topic_id',$topic_id)
            ->delete();
    }
}
