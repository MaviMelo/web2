<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;

class AuthorPublisherBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        # Cria 150 autores, com 5 livros cada um deles
        Author::factory(150)->create()->each( function ($author) {

            # Cria uma editora para cada autor
            $publisher = Publisher::factory()->create();

            # cria 5 livros para cada autor, associado a uma categoria existente
            $author->books()->createMany(
                Book::factory(5)->make([
                    'category_id' => Category::inRandomOrder()->first()->id,
                    'publisher_id' => $publisher->id,
                ])->toArray()
                );
        });
    }
}
