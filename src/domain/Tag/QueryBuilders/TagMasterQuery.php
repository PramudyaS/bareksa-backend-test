<?php

namespace Domain\Tag\QueryBuilders;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TagMasterQuery
{
    private $cache_second = 60;
    protected  $news;
    protected  $request;

    public function __construct(?Request  $request = null)
    {
        $builder = Tag::select('*');

        $query = new Builder(clone $builder->getQuery());
        $query->setModel($builder->getModel());

        $this->news = $query;
        $this->request = $request;
    }

    public function all()
    {
        $query = Cache::remember('tags',$this->cache_second,function(){
           return $this->news->get();
        });
        return $query;
    }

    public function findOrFail(int $id)
    {
        return $this->news->findOrFail($id);
    }
}
