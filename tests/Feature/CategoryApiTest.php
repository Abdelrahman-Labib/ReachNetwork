<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_api_can_get_all_categories()
    {
        Category::factory(10)->create();

        $this->get(route('categories.index'))
            ->assertStatus(200);
    }

    public function test_api_can_create_categories()
    {
        $formData = [
            'name'  => 'Category',
            'active'=> 1
        ];

        $this->post(route('categories.store'), $formData)
            ->assertStatus(200);
    }

    public function test_api_can_show_category()
    {
        $category = Category::factory()->create();

        $this->get(route('categories.show', $category->id))
            ->assertStatus(200);
    }

    public function test_api_can_update_category()
    {
        $category = Category::factory()->create();

        $updateData = [
            'name'  => 'Category',
            'active'=> 1
        ];

        $this->put(route('categories.update', $category->id), $updateData)
            ->assertStatus(200);
    }

    public function test_api_can_delete_category()
    {
        $category = Category::factory()->create();

        $this->delete(route('categories.destroy', $category->id))
            ->assertStatus(200);
    }
}
