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
    protected $blogsToLoad = 7;
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
        $this->blogsToLoad += 10; // Adjust based on how many more blogs you want to load each time
        logger('load more');
    }
    public function render()
    {
        $result = [];
        if(strlen($this->search) >= 2){
            $result = Blog::where('title', 'like', '%'.$this->search.'%')->latest()->get();
        }else{
            $result = Blog::latest()->paginate($this->blogsToLoad);
        }
        return view('livewire.blogs.index', [
            'blogs' => $result,
        ])->layout('layouts.guest');
    }
}
