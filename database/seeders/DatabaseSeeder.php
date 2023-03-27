<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\Promise\each;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory(15)->create();

        Movie::factory(100)->create()
            ->each(function($movie) {
                DB::table('genre_movie')->insert([
                    'genre_id' => Genre::inRandomOrder()->first()->id,
                    'movie_id' => $movie->id,
                ]);
            });
    }
}
