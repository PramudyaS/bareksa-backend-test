<?php

namespace Domain\News\Actions;

use Domain\News\Mapper\NewsMapper;
use Domain\News\Models\News;
use Domain\News\Requests\NewsRequest;
use Domain\Tag\Actions\CreateTagAction;
use Domain\Tag\Requests\TagRequest;
use Domain\Topic\Actions\CreateTopicAction;
use Domain\Topic\Actions\CreateTopicNewsAssociateAction;
use Domain\Topic\Actions\DeleteTopicNewsAssociateAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class UpdateNewsAction
{
    public function execute(int $id,NewsRequest $request)
    {
        DB::beginTransaction();
        try {
            $news = News::find($id);

            $news->title        = $request->title;
            $news->description  = $request->description;
            $news->status       = $request->status;
            $news->save();

            if($request->has('tags'))
            {
                (new DeleteNewsTagAssociateAction())->execute($news->id);

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
                (new DeleteTopicNewsAssociateAction())->execute($news->id);

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

        return (new NewsMapper())->parse($news,$request->tags,$request->topic);
    }
}
