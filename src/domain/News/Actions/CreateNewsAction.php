<?php

namespace Domain\News\Actions;

use Domain\News\Models\News;
use Domain\News\Requests\NewsRequest;
use Domain\Tag\Actions\CreateTagAction;
use Domain\Tag\Requests\TagRequest;
use Domain\Topic\Actions\CreateTopicAction;
use Domain\Topic\Actions\CreateTopicNewsAssociateAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class CreateNewsAction
{
    public function execute(NewsRequest $request)
    {
        DB::beginTransaction();
        try {
            $news = new News();
            $news->title        = $request->title;
            $news->description  = $request->description;
            $news->status       = $request->status;
            $news->save();

            if($request->has('tags'))
            {
                foreach ($request->tags as $tag)
                {
                    $tag = (new CreateTagAction())->execute(new TagRequest([
                        'name'  => $tag
                    ]));

                    (new CreateNewsTagAssociateAction())->execute($news->id,$tag->id);
                }
            }

            if($request->has('topic'))
            {
                $topic = (new CreateTopicAction())->execute(new Request([
                    'title' => $request->topic
                ]));

                (new CreateTopicNewsAssociateAction())->execute($topic->id,$news->id);
            }

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            return $e->getMessage();
        }

        Cache::forget('topic_news');

        return $news;
    }
}
