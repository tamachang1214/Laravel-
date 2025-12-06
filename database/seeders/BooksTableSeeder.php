<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Book;


class BooksTableSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('books')->truncate();

        $books = [
            [
                'name' => 'PHP Book',
                'price' => 2000,
                'author' => 'PHPER',
            ],
            [
                'name' => 'Laravel Book',
                'price' => 3000,
                'author' => null,
            ],
            [
                'name' => 'Ruby Book',
                'price' => 2500,
                'author' => 'Rubyist',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
