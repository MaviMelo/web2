<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Factory as FakerFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        FakerFactory::create()->unique(true);
        $this->call([
            CategorySeeder::class,
            AuthorPublisherBookSeeder::class,
            UserBorrowingSeeder::class,
            UserAdminSeeder::class
        ]);
    }
}
