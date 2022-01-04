<?php

namespace Database\Seeders;

use Domain\Topic\Models\Topic;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'title' => 'Bitcoin'
        ]);

        Topic::create([
            'title' => 'Dividen'
        ]);

        Topic::create([
            'title' => 'Profit'
        ]);
    }
}
