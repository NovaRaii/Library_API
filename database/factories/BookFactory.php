<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(3),
            'category_id' => Category::factory(),
            'price' => $this->faker->numberBetween(1000, 10000),
            'publication_date' => $this->faker->date('Y-m-d'),
            'edition' => $this->faker->randomDigitNotNull(),
            'author_id' => Author::factory(),
            'isbn' => $this->faker->isbn13(),
            'cover' => $this->faker->imageUrl(),
        ];
    }
}