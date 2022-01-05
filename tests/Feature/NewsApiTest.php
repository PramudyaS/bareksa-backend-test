<?php

namespace Tests\Feature;

use Database\Factories\NewsFactory;
use Domain\News\States\NewsState;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_news()
    {
        $request = [
            'title'         => 'Saham Batubara',
            'description'   => 'lorem ipsum dolor sit amet',
            'status'        => NewsState::PUBLISH,
            'tags'          => ['batubara'],
            'topic'         => 'investasi'
        ];

        $this->post(route('news.store'),$request)
            ->assertStatus(201)
            ->assertJson([
                'message'   => 'Success create new news',
                'data'      => $request
            ]);
    }

    public function test_can_delete_news()
    {
        $news = NewsFactory::new()->create();
        $this->delete(route('news.delete',$news->id))
            ->assertStatus(204);
    }

}
