<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Historical Fiction'],
            ['name' => 'Science Fiction'],
            ['name' => 'Romance'],
            ['name' => 'Fantasy'],
            ['name' => 'Mystery'],
            ['name' => 'Thriller'],
            ['name' => 'Gothic'],
            ['name' => 'Drama'],
            ['name' => 'Adventure'],
            ['name' => 'Contemporary'],
        ]);
    }
}
