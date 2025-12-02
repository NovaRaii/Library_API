<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_books()
    {
        $book1 = Book::factory()->create(['name' => 'Book One']);
        $book2 = Book::factory()->create(['name' => 'Book Two']);

        $response = $this->getJson('/api/books');

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Book One'])
            ->assertJsonFragment(['name' => 'Book Two']);
    }

    public function test_store_creates_new_book()
    {
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;
        
        $author = Author::factory()->create();
        $category = Category::factory()->create();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/books', [
            'name' => 'New Book',
            'category_id' => $category->id,
            'price' => 2000,
            'publication_date' => '2023-01-01',
            'edition' => 1,
            'author_id' => $author->id,
            'isbn' => '1234567890123',
            'cover' => 'http://example.com/cover.jpg',
        ]);

        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'New Book']);

        $this->assertDatabaseHas('books', ['name' => 'New Book']);
    }

    public function test_update_modifies_existing_book()
    {
        $book = Book::factory()->create(['name' => 'Old Book']);
        
        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->putJson("/api/books/{$book->id}", [
            'name' => 'Updated Book',
            'category_id' => $book->category_id,
            'price' => $book->price,
            'publication_date' => '2023-01-01',
            'edition' => $book->edition,
            'author_id' => $book->author_id,
            'isbn' => $book->isbn,
            'cover' => $book->cover,
        ]);

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Updated Book']);

        $this->assertDatabaseHas('books', ['id' => $book->id, 'name' => 'Updated Book']);
    }

    public function test_delete_removes_book()
    {
        $book = Book::factory()->create(['name' => 'To Be Deleted']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->deleteJson("/api/books/{$book->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('books', ['id' => $book->id]);
    }

    public function test_show_returns_book()
    {
        $book = Book::factory()->create(['name' => 'Show Me']);

        $user = User::factory()->create();
        $token = $user->createToken('TestToken')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->getJson("/api/books/{$book->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Show Me']);
    }
}