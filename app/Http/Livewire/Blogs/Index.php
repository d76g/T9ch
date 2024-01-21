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
    protected $listeners = [
        'searchUpdated' => 'updateSearch',
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
    public function render()
    {
        $result = [];
        if(strlen($this->search) >= 2){
            $result = Blog::where('title', 'like', '%'.$this->search.'%')->paginate(4);
        }else{
            $result = Blog::latest()->paginate(4);
        }
        return view('livewire.blogs.index', [
            'blogs' => $result,
        ])->layout('layouts.guest');
    }
}
