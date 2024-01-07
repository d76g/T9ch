<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Hashtag;
use Livewire\Component;

class SingleHashtag extends Component
{
    public $hashtag;

    public function mount($hashtag)
    {
        $this->hashtag = Hashtag::where('name', '=', $hashtag)->first();
        
    }
    public function render()
    {
        if ($this->hashtag) {
            $hashtagBlog = $this->hashtag->blogs()->orderBy('created_at', 'desc')->get();
        } else {
            $hashtagBlog = [];
        }
        return view('livewire.blogs.single-hashtag', [
            'blogs' => $hashtagBlog,
        ])->layout('layouts.guest');
    }
}
