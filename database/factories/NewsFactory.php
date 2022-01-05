<?php

namespace Database\Factories;

use Domain\News\Models\News;
use Domain\News\States\NewsState;
use Illuminate\Support\Collection;

class NewsFactory
{

    public static function new(): self
    {
        return new self();
    }

    public function create(array $extra = [])
    {
        return News::create(array_merge(
            [
                'title'         => 'Saham Batubara',
                'description'   => 'lorem ipsum dolor sit amet',
                'status'        => NewsState::DELETED,
                'tags'          => ['batubara'],
                'topic'         => 'investasi'
            ],
            $extra
        ));
    }

    public function times(int $times, array $extra = []): Collection
    {
        return collect()
            ->times($times)
            ->map(function() use($extra){
                $this->create($extra);
            });
    }
}
