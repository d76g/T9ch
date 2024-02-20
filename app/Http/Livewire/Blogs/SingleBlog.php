<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\ExecutableFinder;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
