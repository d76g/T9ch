<?php

namespace App\Http\Livewire\Components;

use App\Models\Hashtag;
use Livewire\Component;

class RelatedBlogs extends Component
{
    public function render()
    {   
        $hashtagBlog = Hashtag::whereHas('blogs')
        ->with(['blogs' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->take(4)
        ->get();

        // Limiting the number of blogs for each hashtag
        $hashtagBlog->each(function ($hashtag) {
            $hashtag->blogs = $hashtag->blogs->take(3);
        });

        return view('livewire.components.related-blogs', 
        [
            'hashtags' => $hashtagBlog,
        ]);
    }
}
