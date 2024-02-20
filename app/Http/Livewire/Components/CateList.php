<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use App\Models\Catergories;
use Livewire\Component;

class CateList extends Component
{
    public function render()
    {
        $categories = Category::whereHas('blogs')
        ->with(['blogs' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])
        ->get();
        // Limiting the number of blogs for each category
        $categories->each(function ($category) {
            $category->blogs = $category->blogs->take(3);
        });
        
        return view('livewire.components.cate-list',
        ['categories' => $categories]
        );
    }
}
