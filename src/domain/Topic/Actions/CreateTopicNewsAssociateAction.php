<?php

namespace Domain\Topic\Actions;

use Domain\Topic\Models\TopicNews;

class CreateTopicNewsAssociateAction
{
    public function execute(int $topic_id,int $news_id)
    {
        $associate = new TopicNews();
        $associate->topic_id = $topic_id;
        $associate->news_id  = $news_id;
        $associate->save();

        return $associate;
    }
}
