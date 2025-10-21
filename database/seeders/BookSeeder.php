<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookSeeder extends Seeder
{
    private function addBook($authorId, $categoryId, $bookData)
    {
        $book = new Book();
        $book->name = $bookData['name'];
        $book->category_id = $categoryId;
        $book->price = $bookData['price'];
        $book->publication_date = $bookData['publication_date'];
        $book->edition = $bookData['edition'];
        $book->author_id = $authorId;
        $book->isbn = $bookData['isbn'];
        $book->cover = $bookData['cover'];
        $book->save();
    }

    public function run(): void
    {
        $data = [
            'Emma Clarke' => [
                'Historical Fiction' => [
                    ['name'=>'The London Fog','price'=>19.99,'publication_date'=>'2021-05-10','edition'=>1,'isbn'=>'978-1-00001-001-1','cover'=>'covers/book1.jpg'],
                    ['name'=>'Tea and Secrets','price'=>18.50,'publication_date'=>'2021-05-10','edition'=>2,'isbn'=>'978-1-00001-002-8','cover'=>'covers/book2.jpg'],
                    ['name'=>'Rain Over Thames','price'=>20.00,'publication_date'=>'2021-05-10','edition'=>1,'isbn'=>'978-1-00001-003-5','cover'=>'covers/book3.jpg'],
                    ['name'=>'Cobbled Streets','price'=>17.99,'publication_date'=>'2021-05-10','edition'=>3,'isbn'=>'978-1-00001-004-2','cover'=>'covers/book4.jpg'],
                    ['name'=>'Victorian Whispers','price'=>21.00,'publication_date'=>'2021-05-10','edition'=>2,'isbn'=>'978-1-00001-005-9','cover'=>'covers/book5.jpg'],
                ],
            ],
            'John Miller' => [
                'Science Fiction' => [
                    ['name'=>'Digital Frontier','price'=>22.99,'publication_date'=>'2022-01-20','edition'=>1,'isbn'=>'978-1-00002-001-0','cover'=>'covers/book6.jpg'],
                    ['name'=>'Neon Skies','price'=>24.50,'publication_date'=>'2022-01-20','edition'=>1,'isbn'=>'978-1-00002-002-7','cover'=>'covers/book7.jpg'],
                    ['name'=>'Cyber Dust','price'=>23.99,'publication_date'=>'2022-01-20','edition'=>2,'isbn'=>'978-1-00002-003-4','cover'=>'covers/book8.jpg'],
                    ['name'=>'Virtual Lives','price'=>25.00,'publication_date'=>'2022-01-20','edition'=>3,'isbn'=>'978-1-00002-004-1','cover'=>'covers/book9.jpg'],
                    ['name'=>'Synthetic Dreams','price'=>26.50,'publication_date'=>'2022-01-20','edition'=>2,'isbn'=>'978-1-00002-005-8','cover'=>'covers/book10.jpg'],
                ],
            ],
            'Sofia Martinez' => [
                'Romance' => [
                    ['name'=>'Whispers of Granada','price'=>16.99,'publication_date'=>'2020-03-14','edition'=>1,'isbn'=>'978-1-00003-001-7','cover'=>'covers/book11.jpg'],
                    ['name'=>'Letters from Seville','price'=>17.50,'publication_date'=>'2020-03-14','edition'=>1,'isbn'=>'978-1-00003-002-4','cover'=>'covers/book12.jpg'],
                    ['name'=>'Flamenco Nights','price'=>18.00,'publication_date'=>'2020-03-14','edition'=>2,'isbn'=>'978-1-00003-003-1','cover'=>'covers/book13.jpg'],
                    ['name'=>'Love in Madrid','price'=>19.99,'publication_date'=>'2020-03-14','edition'=>3,'isbn'=>'978-1-00003-004-8','cover'=>'covers/book14.jpg'],
                    ['name'=>'Orange Blossoms','price'=>20.50,'publication_date'=>'2020-03-14','edition'=>2,'isbn'=>'978-1-00003-005-5','cover'=>'covers/book15.jpg'],
                ],
            ],
            'Liam O\'Connor' => [
                'Fantasy' => [
                    ['name'=>'Emerald Rebellion','price'=>22.00,'publication_date'=>'2019-11-30','edition'=>1,'isbn'=>'978-1-00004-001-4','cover'=>'covers/book16.jpg'],
                    ['name'=>'The Celtic Spell','price'=>23.99,'publication_date'=>'2019-11-30','edition'=>2,'isbn'=>'978-1-00004-002-1','cover'=>'covers/book17.jpg'],
                    ['name'=>'Forest of Myths','price'=>24.50,'publication_date'=>'2019-11-30','edition'=>2,'isbn'=>'978-1-00004-003-8','cover'=>'covers/book18.jpg'],
                    ['name'=>'Gaelic Blades','price'=>25.00,'publication_date'=>'2019-11-30','edition'=>3,'isbn'=>'978-1-00004-004-5','cover'=>'covers/book19.jpg'],
                    ['name'=>'Runes of Power','price'=>26.25,'publication_date'=>'2019-11-30','edition'=>1,'isbn'=>'978-1-00004-005-2','cover'=>'covers/book20.jpg'],
                ],
            ],
            'Haruki Tanaka' => [
                'Japanese Fiction' => [
                    ['name'=>'Tokyo Dusk','price'=>19.99,'publication_date'=>'2023-04-12','edition'=>1,'isbn'=>'978-1-00005-001-1','cover'=>'covers/book21.jpg'],
                    ['name'=>'Kyoto Murmurs','price'=>18.75,'publication_date'=>'2023-04-12','edition'=>1,'isbn'=>'978-1-00005-002-8','cover'=>'covers/book22.jpg'],
                    ['name'=>'Shadows in Shibuya','price'=>20.50,'publication_date'=>'2023-04-12','edition'=>2,'isbn'=>'978-1-00005-003-5','cover'=>'covers/book23.jpg'],
                    ['name'=>'Crimson Koi','price'=>21.00,'publication_date'=>'2023-04-12','edition'=>3,'isbn'=>'978-1-00005-004-2','cover'=>'covers/book24.jpg'],
                    ['name'=>'Lotus Trap','price'=>22.00,'publication_date'=>'2023-04-12','edition'=>2,'isbn'=>'978-1-00005-005-9','cover'=>'covers/book25.jpg'],
                ],
            ],
            'Isabella Rossi' => [
                'Italian Fiction' => [
                    ['name'=>'Venetian Shadows','price'=>21.50,'publication_date'=>'2021-10-01','edition'=>1,'isbn'=>'978-1-00006-001-6','cover'=>'covers/book26.jpg'],
                    ['name'=>'Roman Blood','price'=>22.00,'publication_date'=>'2021-10-01','edition'=>1,'isbn'=>'978-1-00006-002-3','cover'=>'covers/book27.jpg'],
                    ['name'=>'Florentine Night','price'=>22.75,'publication_date'=>'2021-10-01','edition'=>2,'isbn'=>'978-1-00006-003-0','cover'=>'covers/book28.jpg'],
                    ['name'=>'Vatican Files','price'=>23.00,'publication_date'=>'2021-10-01','edition'=>2,'isbn'=>'978-1-00006-004-7','cover'=>'covers/book29.jpg'],
                    ['name'=>'Milan Chase','price'=>23.50,'publication_date'=>'2021-10-01','edition'=>3,'isbn'=>'978-1-00006-005-4','cover'=>'covers/book30.jpg'],
                ],
            ],
            'Noah Dubois' => [
                'French Fiction' => [
                    ['name'=>'Château Noir','price'=>19.50,'publication_date'=>'2020-06-06','edition'=>1,'isbn'=>'978-1-00007-001-3','cover'=>'covers/book31.jpg'],
                    ['name'=>'Moonlit Versailles','price'=>20.00,'publication_date'=>'2020-06-06','edition'=>1,'isbn'=>'978-1-00007-002-0','cover'=>'covers/book32.jpg'],
                    ['name'=>'Louvre Ghosts','price'=>20.50,'publication_date'=>'2020-06-06','edition'=>2,'isbn'=>'978-1-00007-003-7','cover'=>'covers/book33.jpg'],
                    ['name'=>'Phantom of Lyon','price'=>21.00,'publication_date'=>'2020-06-06','edition'=>2,'isbn'=>'978-1-00007-004-4','cover'=>'covers/book34.jpg'],
                    ['name'=>'Shadows of Bordeaux','price'=>21.50,'publication_date'=>'2020-06-06','edition'=>3,'isbn'=>'978-1-00007-005-1','cover'=>'covers/book35.jpg'],
                ],
            ],
            'Chen Wei' => [
                'Chinese Fiction' => [
                    ['name'=>'Silken Tales','price'=>18.50,'publication_date'=>'2021-08-08','edition'=>1,'isbn'=>'978-1-00008-001-0','cover'=>'covers/book36.jpg'],
                    ['name'=>'Jade Dreams','price'=>19.00,'publication_date'=>'2021-08-08','edition'=>1,'isbn'=>'978-1-00008-002-7','cover'=>'covers/book37.jpg'],
                    ['name'=>'Red Lanterns','price'=>20.00,'publication_date'=>'2021-08-08','edition'=>2,'isbn'=>'978-1-00008-003-4','cover'=>'covers/book38.jpg'],
                    ['name'=>'Beijing Echoes','price'=>20.50,'publication_date'=>'2021-08-08','edition'=>2,'isbn'=>'978-1-00008-004-1','cover'=>'covers/book39.jpg'],
                    ['name'=>'Golden Cranes','price'=>21.00,'publication_date'=>'2021-08-08','edition'=>3,'isbn'=>'978-1-00008-005-8','cover'=>'covers/book40.jpg'],
                ],
            ],
            'Carlos Mendoza' => [
                'Latin American Fiction' => [
                    ['name'=>'Aztec Prophecy','price'=>24.00,'publication_date'=>'2022-07-07','edition'=>1,'isbn'=>'978-1-00009-001-5','cover'=>'covers/book41.jpg'],
                    ['name'=>'Jungle Riddle','price'=>24.50,'publication_date'=>'2022-07-07','edition'=>1,'isbn'=>'978-1-00009-002-2','cover'=>'covers/book42.jpg'],
                    ['name'=>'Temple of Fire','price'=>25.00,'publication_date'=>'2022-07-07','edition'=>2,'isbn'=>'978-1-00009-003-9','cover'=>'covers/book43.jpg'],
                    ['name'=>'Oaxaca Gold','price'=>25.50,'publication_date'=>'2022-07-07','edition'=>2,'isbn'=>'978-1-00009-004-6','cover'=>'covers/book44.jpg'],
                    ['name'=>'Teotihuacan Secrets','price'=>26.00,'publication_date'=>'2022-07-07','edition'=>3,'isbn'=>'978-1-00009-005-3','cover'=>'covers/book45.jpg'],
                ],
            ],
            'Amira Hassan' => [
                'Egyptian Fiction' => [
                    ['name'=>'Cairo Pulse','price'=>18.99,'publication_date'=>'2023-09-01','edition'=>1,'isbn'=>'978-1-00010-001-2','cover'=>'covers/book46.jpg'],
                    ['name'=>'Desert Hearts','price'=>19.50,'publication_date'=>'2023-09-01','edition'=>1,'isbn'=>'978-1-00010-002-9','cover'=>'covers/book47.jpg'],
                    ['name'=>'Nile Reflections','price'=>20.00,'publication_date'=>'2023-09-01','edition'=>2,'isbn'=>'978-1-00010-003-6','cover'=>'covers/book48.jpg'],
                    ['name'=>'Alexandria Days','price'=>20.50,'publication_date'=>'2023-09-01','edition'=>2,'isbn'=>'978-1-00010-004-3','cover'=>'covers/book49.jpg'],
                    ['name'=>'Minaret Silence','price'=>21.00,'publication_date'=>'2023-09-01','edition'=>3,'isbn'=>'978-1-00010-005-0','cover'=>'covers/book50.jpg'],
                ],
            ],
        ];

        foreach ($data as $authorName => $categories) {
            $author = Author::where('name', $authorName)->first();
            if (!$author) continue;
            $authorId = $author->id;

            foreach ($categories as $categoryName => $books) {
                $category = Category::where('name', $categoryName)->first();
                if (!$category) continue;
                $categoryId = $category->id;

                foreach ($books as $bookData) {
                    $this->addBook($authorId, $categoryId, $bookData);
                }
            }
        }
    }
}
