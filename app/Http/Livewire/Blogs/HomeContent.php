<?php

namespace App\Http\Livewire\Blogs;

use Livewire\Component;

class HomeContent extends Component
{
    public function render()
    {
        return view('livewire.blogs.home-content',
            [
                'latestTwoBlogs' => \App\Models\Blog::latest()->take(2)->get(),
                'randomCategory' => \App\Models\Category::inRandomOrder()->take(2)->get(),
                'randomHashtag' => \App\Models\Hashtag::inRandomOrder()->take(6)->get(),
                'randomBlog' => \App\Models\Blog::inRandomOrder()->take(3)->get(),
            ]);
    }
}
