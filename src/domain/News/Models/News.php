<?php

namespace Domain\News\Models;

use Domain\Topic\Models\TopicNews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected  $guarded = ['id'];

    public function news_tag()
    {
        return $this->hasMany(NewsTag::class);
    }

    public function topic_news()
    {
        return $this->hasMany(TopicNews::class,'news_id','id');
    }
}
