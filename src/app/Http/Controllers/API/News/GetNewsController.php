<?php

namespace App\Http\Controllers\API\News;

use App\Http\Controllers\Controller;
use Domain\News\QueryBuilders\NewsBuilder;
use \Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Domain\Topic\Models\Topic;
use Domain\Topic\Models\TopicNews;

class GetNewsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $topics = Topic::when($request->topic,function($query) use($request){
            $query->where('title',$request->topic);
        })
        ->get();

        $topic_news = Cache::remember('topic_news',60,function() use($topics,$request){
            return $topics->map(function($topic) use($request){
                return [
                    'id'        => $topic->id,
                    'topic'     => $topic->title,
                    'news'      => TopicNews::join('news','topic_news.news_id','=','news.id')
                        ->where('topic_id',$topic->id)
                        ->when($request->status,function($query) use($request){
                            $query->where('news.status',$request->status);
                        })
                        ->select('news.id','news.title','news.status')
                        ->get(),
                ];
            });
        });

        return response()->json([
            'message'  => 'Succes show news data',
            'data'     => $topic_news
        ]);
    }
}
