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

        // A collection to keep track of blog IDs that have already been selected
        $selectedBlogIds = collect();

        // Filtering blogs for each hashtag
        $hashtagBlog->each(function ($hashtag) use (&$selectedBlogIds) {
            // Filter blogs that have not been selected yet
            $filteredBlogs = $hashtag->blogs->filter(function ($blog) use ($selectedBlogIds) {
                return !$selectedBlogIds->contains($blog->id);
            });

            // Take up to 3 blogs from the filtered list
            $hashtag->blogs = $filteredBlogs->take(4);

            // Update the list of selected blog IDs
            $selectedBlogIds = $selectedBlogIds->merge($hashtag->blogs->pluck('id'));
        });

        return view('livewire.components.related-blogs', [
            'hashtags' => $hashtagBlog,
        ]);
    }
}

