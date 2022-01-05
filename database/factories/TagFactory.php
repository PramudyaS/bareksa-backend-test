<?php

namespace Database\Factories;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class TagFactory
{

    public static function new(): self
    {
        return new self();
    }

    public function create(array $extra = []) : Tag
    {
        return Tag::create(array_merge(
            [
                'name'  => 'test-case'
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
