<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $authors = [
            ['id' => 1, 'name' => 'Emma Clarke', 'age' => 42, 'gender' => 'female', 'nationality' => 'British'],
            ['id' => 2, 'name' => 'John Miller', 'age' => 55, 'gender' => 'male', 'nationality' => 'American'],
            ['id' => 3, 'name' => 'Sofia Martinez', 'age' => 38, 'gender' => 'female', 'nationality' => 'Spanish'],
            ['id' => 4, 'name' => 'Liam O\'Connor', 'age' => 47, 'gender' => 'male', 'nationality' => 'Irish'],
            ['id' => 5, 'name' => 'Haruki Tanaka', 'age' => 61, 'gender' => 'male', 'nationality' => 'Japanese'],
            ['id' => 6, 'name' => 'Isabella Rossi', 'age' => 35, 'gender' => 'female', 'nationality' => 'Italian'],
            ['id' => 7, 'name' => 'Noah Dubois', 'age' => 50, 'gender' => 'male', 'nationality' => 'French'],
            ['id' => 8, 'name' => 'Chen Wei', 'age' => 45, 'gender' => 'female', 'nationality' => 'Chinese'],
            ['id' => 9, 'name' => 'Carlos Mendoza', 'age' => 59, 'gender' => 'male', 'nationality' => 'Mexican'],
            ['id' => 10, 'name' => 'Amira Hassan', 'age' => 40, 'gender' => 'female', 'nationality' => 'Egyptian'],
        ];

        foreach($authors as $item){
            $author = new Author();
            $author->name = $item['name'];
            $author->age = $item['age'];
            $author->gender = $item['gender'];
            $author->nationality = $item['nationality'];
            $author->save();
        }
    }
}
