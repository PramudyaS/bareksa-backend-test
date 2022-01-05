<?php

namespace Domain\News\Mapper;

use Domain\News\Models\News;

class NewsMapper
{
    public function parse(News $news,$tags = null,$topic = null)
    {
        return [
            'id'            => $news->id,
            'title'         => $news->title,
            'description'   => $news->description,
            'status'        => $news->status,
            'tags'          => $tags,
            'topic'         => $topic
        ];
    }
}
