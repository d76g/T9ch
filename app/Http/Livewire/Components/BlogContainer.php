<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BlogContainer extends Component
{
    public $blog;
    public $bgColor;
    public function render()
    {
        return view('livewire.components.blog-container');
    }
}
