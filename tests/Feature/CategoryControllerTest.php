<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_categories()
    {
        Category::factory()->create(['name' => 'Sci-Fi']);
        Category::factory()->create(['name' => 'Fantasy']);

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Sci-Fi'])
            ->assertJsonFragment(['name' => 'Fantasy']);
    }

    public function test_store_creates_new_category()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/categories', [
            'name' => 'Horror',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Horror']);

        $this->assertDatabaseHas('categories', ['name' => 'Horror']);
    }

    public function test_update_modifies_existing_category()
    {
        $category = Category::factory()->create(['name' => 'Old Category']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/categories/{$category->id}", [
            'name' => 'New Category',
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'New Category']);

        $this->assertDatabaseHas('categories', ['id' => $category->id, 'name' => 'New Category']);
    }

    public function test_delete_removes_category()
    {
        $category = Category::factory()->create(['name' => 'To Be Deleted']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(200); 

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    public function test_show_returns_category()
    {
        $category = Category::factory()->create(['name' => 'Show Me']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Show Me']);
    }
}