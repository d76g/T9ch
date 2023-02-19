<?php

namespace App\Http\Livewire\Blogs;

use App\Models\Catergories;
use Livewire\Component;

class SingleCategory extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = Catergories::where('category', '=', $category)->first();
    }
    public function render()
    {
        return view('livewire.blogs.single-category')->layout('layouts.guest');
    }
}
