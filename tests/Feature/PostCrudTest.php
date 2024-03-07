<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostCrudTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    /**
     * Test listing all posts.
     *
     * @return void
     */
    public function test_can_list_all_posts()
    {
        $response = $this->get('/api/posts');
        $response->assertStatus(200);
    }

    public function test_can_show_post()
    {
        $post = Post::factory()->create();
        $response = $this->get('/api/posts/' . $post->id);
        $response->assertStatus(200);
    }

    public function test_can_create_post()
    {
        $postData = [
            'name' => 'Test Post',
            'price' => '100'
        ];
        $response = $this->post('/api/posts', $postData);
        $response->assertStatus(201);
    }


    public function test_can_update_post()
    {
        $post = Post::factory()->create();
        $updatedData = [
            'title' => 'Updated Title',
            'content' => 'Updated content'
        ];
        $response = $this->put('/api/posts/' . $post->id, $updatedData);
        $response->assertStatus(200);
    }

    public function test_can_delete_post()
    {
        $post = Post::factory()->create();

        $response = $this->delete('/api/posts/' . $post->id);
        $response->assertStatus(204);
    }
}
