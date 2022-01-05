<?php

namespace Domain\News\Actions;

use Domain\News\Models\News;
use Domain\News\Requests\NewsRequest;

class CreateNewsAction
{
    public function execute(NewsRequest $request) :News
    {
        $news = new News();
        $news->title        = $request->title;
        $news->description  = $request->description;
        $news->status       = $request->status;
        $news->save();

        if($request->has('tags'))
        {
            //Insert Tag
        }

        return $news;
    }
}
