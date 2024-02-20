<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class BlogContainer extends Component
{
    public $blog;
    public $bgColor;
    public $blogLang;
    public function mount()
    {
        $this->blogLang = $this->blog->language->language;
        logger($this->blogLang);
    }
    public function render()
    {
        return view('livewire.components.blog-container');
    }
}
