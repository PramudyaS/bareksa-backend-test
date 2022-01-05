<?php

namespace Domain\News\Actions;

use Domain\News\Models\News;
use Domain\News\Requests\NewsRequest;

class UpdateNewsAction
{
    public function execute(int $id,NewsRequest $request) :News
    {
        $news = News::find($id);

        $news->title        = $request->title;
        $news->description  = $request->description;
        $news->status       = $request->status;
        $news->save();

        if($request->has('tags'))
        {
            //delete current associate tag
            //create new associate tag
        }

        return $news;
    }
}
