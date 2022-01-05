<?php

namespace Domain\Topic\Models;

use Domain\News\Models\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopicNews extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsTo(News::class)->select('id','title');
    }
}
