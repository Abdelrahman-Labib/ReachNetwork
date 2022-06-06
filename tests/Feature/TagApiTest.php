<?php

namespace Tests\Feature;

use App\Models\Advertisement;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_can_get_all_tags()
    {
        Tag::factory(10)->create();

        $this->get(route('tags.index'))
            ->assertStatus(200);
    }

    public function test_api_can_create_tags()
    {
        $formData = [
            'advertisement_id' => Advertisement::factory()->create()->id,
            'name'  => 'Tag',
        ];

        $this->post(route('tags.store'), $formData)
            ->assertStatus(200);
    }

    public function test_api_can_show_tag()
    {
        $tag = Tag::factory()->create();

        $this->get(route('tags.show', $tag->id))
            ->assertStatus(200);
    }

    public function test_api_can_update_tag()
    {
        $tag = Tag::factory()->create();

        $updateData = [
            'advertisement_id' => Advertisement::factory()->create()->id,
            'name'  => 'Tag',
        ];

        $this->put(route('tags.update', $tag->id), $updateData)
            ->assertStatus(200);
    }

    public function test_api_can_delete_tag()
    {
        $tag = Tag::factory()->create();

        $this->delete(route('tags.destroy', $tag->id))
            ->assertStatus(200);
    }
}
