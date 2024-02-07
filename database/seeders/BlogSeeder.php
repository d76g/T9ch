<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Blog::factory(10)->create()->each(function ($blog) {
            // Attach random hashtags to each blog
            // Assumes hashtag IDs range from 1 to 10
            $hashtags = range(1, 10);
            shuffle($hashtags);
            $blog->Hashtags()->attach(array_slice($hashtags, 0, rand(1, 3)));
        });
    }
}
