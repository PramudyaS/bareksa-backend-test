<?php

namespace Domain\News\QueryBuilders;

use Domain\News\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class NewsMasterQuery
{
    protected  $news;
    protected  $request;

    public function __construct(Request  $request)
    {
        $builder = News::select('*');

        $query = new Builder(clone $builder->getQuery());
        $query->setModel($builder->getModel());

        $this->news = $query;
        $this->request = $request;
    }

    public function all()
    {
        return $this->news->get();
    }

    public function allowFilterByStatus()
    {
        if($this->request->has('status'))
        {
            return $this->news->where('status',$this->request->status)->get();
        }

        return $this->all();
    }
}
