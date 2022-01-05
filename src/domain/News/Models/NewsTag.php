<?php

namespace Domain\News\Models;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsTag extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
