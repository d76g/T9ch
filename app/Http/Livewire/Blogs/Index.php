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
    public $totalBlogsCount;
    protected $listeners = [
        'searchUpdated' => 'updateSearch',
        'loadMore'
    ];
    public function mount()
    {
        if (request()->has('search')) {
            $this->search = request()->get('search');
        }
        $this->totalBlogsCount = Blog::count();
    }
    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
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
        // Update the blogs query to filter based on the search term
        $blogsQuery = Blog::latest();

        if (!empty($this->search)) {
            $blogsQuery->where(function($query) {
            $query->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%');
        });

        // Update total blogs count based on search
        $this->totalBlogsCount = $blogsQuery->count();
        }

        $blogs = $blogsQuery->paginate($this->blogsToLoad);
        $moreBlogsAvailable = $this->blogsToLoad < $this->totalBlogsCount;

        return view('livewire.blogs.index', [
            'blogs' => $blogs,
            'moreBlogsAvailable' => $moreBlogsAvailable
        ])->layout('layouts.guest');
    }

}
