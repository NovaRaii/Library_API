<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_authors()
    {
        Author::factory()->create(['name' => 'Author One']);
        Author::factory()->create(['name' => 'Author Two']);

        $response = $this->getJson('/api/authors');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Author One'])
            ->assertJsonFragment(['name' => 'Author Two']);
    }

    public function test_store_creates_new_author()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/authors', [
            'name' => 'New Author',
            'age' => 45,
            'gender' => 'female',
            'nationality' => 'Hungarian',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'New Author']);

        $this->assertDatabaseHas('authors', ['name' => 'New Author']);
    }

    public function test_update_modifies_existing_author()
    {
        $author = Author::factory()->create(['name' => 'Old Author']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/authors/{$author->id}", [
            'name' => 'Updated Author',
            'age' => $author->age,
            'gender' => $author->gender,
            'nationality' => $author->nationality,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated Author']);

        $this->assertDatabaseHas('authors', ['id' => $author->id, 'name' => 'Updated Author']);
    }

    public function test_delete_removes_author()
    {
        $author = Author::factory()->create(['name' => 'To Be Deleted']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/authors/{$author->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('authors', ['id' => $author->id]);
    }

    public function test_show_returns_author()
    {
        $author = Author::factory()->create(['name' => 'Show Me']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("/api/authors/{$author->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Show Me']);
    }
}