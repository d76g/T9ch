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
    public $locale = 'ar';
    public function mount($slug)
    {
        $this->locale = app()->getLocale();
        $this->blog = Blog::where('slug', '=', $slug)->first();
    }

    public function render()
    {
        // Initial related blogs based on locale
        $languageId = $this->locale === 'ar' ? 2 : 1; // Assuming 2 is for Arabic and 1 is for English
        $relatedBlogs = Blog::where('language_id', $languageId)
                            ->where('id', '!=', $this->blog->id)
                            ->limit(6)
                            ->get();

        $neededBlogs = 6 - $relatedBlogs->count();

        // If not enough blogs, fallback on category
        if ($neededBlogs > 0) {
            $categoryBlogs = Blog::where('category_id', '=', $this->blog->category_id)
                                ->where('id', '!=', $this->blog->id)
                                ->whereNotIn('id', $relatedBlogs->pluck('id')) // Avoid duplicates
                                ->limit($neededBlogs)
                                ->get();

            $relatedBlogs = $relatedBlogs->merge($categoryBlogs);
            $neededBlogs = 6 - $relatedBlogs->count();
        }

        // Final fallback on random selection if still not enough
        if ($neededBlogs > 0) {
            $randomBlogs = Blog::where('id', '!=', $this->blog->id)
                            ->whereNotIn('id', $relatedBlogs->pluck('id')) // Avoid duplicates
                            ->inRandomOrder()
                            ->limit($neededBlogs)
                            ->get();

            $relatedBlogs = $relatedBlogs->merge($randomBlogs);
        }

        return view('livewire.blogs.single-blog', [
            'relatedBlog' => $relatedBlogs,
        ])->layout('layouts.guest');
    }

}
