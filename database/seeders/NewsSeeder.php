<?php

namespace Database\Seeders;

use Domain\News\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title'         => 'Start Investment',
            'description'   => 'lorem ipsum dolor sit amet',
            'status'        => 'draft'
        ]);

        News::create([
            'title'         => 'Bully Macguire Start Investing',
            'description'   => 'lorem ipsum dolor sit amet',
            'status'        => 'deleted'
        ]);

        News::create([
            'title'         => 'BTC Investment',
            'description'   => 'lorem ipsum dolor sit amet',
            'status'        => 'publish'
        ]);
    }
}
