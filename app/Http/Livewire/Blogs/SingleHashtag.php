<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Blog;
use App\Models\Hashtag;
use Livewire\Component;
use Livewire\WithPagination;

class SingleHashtag extends Component
{
    use WithPagination;
    public $hashtag;
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
    public function mount($hashtag)
    {
        $this->hashtag = Hashtag::where('name', $hashtag)->firstOrFail();
        $this->pageName = '/hashtag/'.$hashtag;
        if (request()->has('search')) {
            $this->search = request()->get('search');
        }
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
        // Check if the current hashtag is available
        $relatedHashtags = Hashtag::where('name',!$this->hashtag->name)->get();
        // Get the blogs for the current hashtag
        $result = [];
        if(strlen($this->search) >= 2){
            $result = Blog::where('title', 'like', '%'.$this->search.'%')->whereHas('hashtags', function ($query) {
                $query->where('name', $this->hashtag->name);
            })->paginate(4);
        }else{
            $result = Blog::whereHas('hashtags',)
            ->when($this->sortCriteria == 'most_viewed', function ($query) {
                return $query->orderBy('views', 'desc');
            })
            ->when($this->sortCriteria == 'oldest', function ($query) {
                return $query->orderBy('created_at', 'asc');
            })
            ->when($this->sortCriteria == 'latest', function ($query) {
                return $query->orderBy('created_at', 'desc');
            })
            ->whereHas('hashtags', function ($query) {
                $query->where('name', $this->hashtag->name);
            })->paginate(4);
        }
        return view('livewire.blogs.single-hashtag', [
            'relatedHashtags' => $relatedHashtags,
            'blogs' => $result,
        ])->layout('layouts.guest');
    }

}

// $query = $this->hashtag->blogs();
//             if ($this->sortCriteria == 'most_viewed') {
//                 // Assuming you have a 'views' column for view count
//                 $query->orderBy('views', 'desc');
//             } elseif ($this->sortCriteria == 'oldest') {
//                 $query->orderBy('created_at', 'asc');
//             } else {
//                 $query->orderBy('created_at', 'desc');
//             }
//             $hashtagBlog = $query->get();