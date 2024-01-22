<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'content' => $this->faker->paragraph,
            'blog_photo' => $this->faker->imageUrl(),
            'reading_time' => $this->faker->randomDigitNotNull . ' min',
            'category_id' => $this->faker->numberBetween(1, 5),
            'user_id' => 1, // as per your requirement
            'language_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
