<?php

namespace Database\Seeders;

use Domain\Tag\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'investment'
        ]);

        Tag::create([
            'name' => 'btc'
        ]);

        Tag::create([
            'name' => 'stock'
        ]);
    }
}
