<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.blogs.index', [
            'blogs' => Blog::latest()->get(),
        ])->layout('layouts.guest');
    }
}
