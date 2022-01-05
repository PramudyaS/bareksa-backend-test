<?php

namespace Tests\Feature;

use Database\Factories\TagFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_tag()
    {
        $request = [
            'name'  => $this->faker->title
        ];

        $this->post(route('tags.store'),$request)
        ->assertStatus(201)
        ->assertJson([
            'message'   => 'Success create new tag',
            'data'      => $request
        ]);
    }

    public function test_can_update_tag()
    {
        $tag = TagFactory::new()->create();
        $request = [
            'name'  => $this->faker->title
        ];

        $this->put(route('tags.update',$tag->id),$request)
            ->assertStatus(200)
            ->assertJson([
                'message'   => 'Success update tag',
                'data'      => $request
            ]);
    }

    public function test_can_delete_tag()
    {
        $tag = TagFactory::new()->create();
        $this->delete(route('tags.delete',$tag->id))
            ->assertStatus(204);
    }

    public function test_can_show_tags()
    {
        $tag = TagFactory::new()->create();

        $this->get(route('tags.index'))
            ->assertStatus(200)
            ->assertJson([
                'message'   => 'Success show tags data',
                'data'      => [
                    $tag->toArray()
                ]
            ]);
    }

}
