<?php

namespace Domain\Tag\QueryBuilders;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class TagMasterQuery
{
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
        return $this->news->get();
    }

    public function findOrFail(int $id)
    {
        return $this->news->findOrFail($id);
    }
}
