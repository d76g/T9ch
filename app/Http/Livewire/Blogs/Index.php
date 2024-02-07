<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = "";
    public $pageName = '/blogs';
    public $blogsToLoad = 11;
    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'loadMore'
    ];
    public function mount()
    {
        if (request()->has('search')) {
            $this->search = request()->get('search');
        }
    }
    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
        logger($this->search);
    }
    public function loadMore()
    {
        if ($this->blogsToLoad < $this->totalBlogsCount) {
        $this->blogsToLoad += 10;
        }
    }

    public function render()
    {
        // Initially set totalBlogsCount if not set
        if (!isset($this->totalBlogsCount)) {
            $this->totalBlogsCount = Blog::count();
        }

        $blogs = Blog::latest()->paginate($this->blogsToLoad);
        
        // Determine if there are more blogs to load
        $moreBlogsAvailable = $this->blogsToLoad < $this->totalBlogsCount;

        return view('livewire.blogs.index', [
            'blogs' => $blogs,
            'moreBlogsAvailable' => $moreBlogsAvailable,
        ])->layout('layouts.guest');
    }

}
