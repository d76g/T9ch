<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;

class SingleBlog extends Component
{
    public $blog;

    public function mount($slug)
    {
        $this->blog = Blog::where('slug', '=', $slug)->first();
    }
    public function render()
    {
        return view('livewire.blogs.single-blog', [
            'relatedBlog' => Blog::inRandomOrder()->limit(4)->get(),
        ])->layout('layouts.guest');
    }
}
