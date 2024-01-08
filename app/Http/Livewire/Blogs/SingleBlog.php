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
        $relatedBlogs = Blog::where('id', '!=', $this->blog->id)
                            ->inRandomOrder()
                            ->limit(4)
                            ->get();
        return view('livewire.blogs.single-blog', [
            'relatedBlog' => $relatedBlogs,
        ])->layout('layouts.guest');
    }
}
