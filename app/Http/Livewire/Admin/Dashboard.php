<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Hashtag;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $totalBlogs = Blog::count();
        $blogsThisMonth = Blog::whereMonth('created_at', date('m'))->count();
        $totalCategories = Category::count();
        $totalHashtags = Hashtag::count();
        $categoriesWithBlogs = Category::withCount('blogs')->count();
        $hashtagsWithBlogs = Hashtag::withCount('blogs')->count();
        return view('livewire.admin.dashboard',[
            'totalBlogs' => $totalBlogs,
            'blogsThisMonth' => $blogsThisMonth,
            'totalCategories' => $totalCategories,
            'totalHashtags' => $totalHashtags,
            'categoriesWithBlogs' => $categoriesWithBlogs,
            'hashtagsWithBlogs' => $hashtagsWithBlogs
        ]);
    }
}
