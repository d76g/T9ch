<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
class SingleCategory extends Component
{
    use WithPagination;
    public $category;
    public $sortCriteria = 'latest';
    public $search = "";
    public $pageName;
    // protected $queryString = ['search'];
    protected $listeners = [
        'filterToOldest',
        'filterToLatest',
        'resetFilters',
        'searchUpdated' => 'updateSearch',
    ];
    public function mount($slug)
    {
        $this->category = Category::where('slug', '=', $slug)->firstOrFail();
        $this->pageName = '/category/'.$slug;
        if (request()->has('search')) {
            $this->search = request()->get('search');
        }
        logger($slug);
    }
    public function updateSearch($searchTerm)
    {
        $this->search = $searchTerm;
    }
    public function filterToOldest()
    {
        $this->sortCriteria = 'oldest';
    }
    public function filterToLatest()
    {
        $this->sortCriteria = 'latest';
    }
    public function resetFilters()
    {
        $this->sortCriteria = 'latest';
    }
    public function render()
    {
       $relatedCategories = Category::where('slug','!=',$this->category->slug)->get();
       // Get the blogs for the current hashtag
       $result = [];
       if(strlen($this->search) >= 2){
           $result = Blog::where('title', 'like', '%'.$this->search.'%')->whereHas('category', function ($query) {
               $query->where('slug', $this->category->slug);
           })->paginate(4);
       }else{
           $result = Blog::whereHas('category',)
           ->when($this->sortCriteria == 'most_viewed', function ($query) {
               return $query->orderBy('views', 'desc');
           })
           ->when($this->sortCriteria == 'oldest', function ($query) {
               return $query->orderBy('created_at', 'asc');
           })
           ->when($this->sortCriteria == 'latest', function ($query) {
               return $query->orderBy('created_at', 'desc');
           })
           ->whereHas('category', function ($query) {
               $query->where('slug', $this->category->slug);
           })->paginate(10);
       }
        return view('livewire.blogs.single-category',[
            'blogs' => $result,
            'relatedCategories' => $relatedCategories,
        ])->layout('layouts.guest');
    }
}
