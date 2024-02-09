<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use Livewire\Component;

class AllCategories extends Component
{
    public function render()
    {
        $allCategories = Category::withCount('blogs')->get();
        return view('livewire.pages.all-categories',[
            'allCategories' => $allCategories
        ])->layout('layouts.guest');
    }
}
