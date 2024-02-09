<?php

namespace App\Http\Livewire\Components;

use App\Models\Hashtag;
use Livewire\Component;
use App\Models\Category;

use function PHPSTORM_META\map;

class HomeMenu extends Component
{
    public $locale;
    
    public function mount()
    {
        $this->locale = app()->getLocale();
    }
    public function render()
    {
        // $categories = Category::withCount('blogs')
        // ->having('blogs_count', '>', 10)
        // ->get();
        // if ($categories->count() < 4) {
        //     $categories = Category::withCount('blogs')
        //     ->having('blogs_count', '>', 0)
        //     ->get();
        // }
        // $hashtags = Hashtag::take(5)->get();
        return view('livewire.components.home-menu',
        [
            // 'categories' => $categories,
            // 'hashtags' => $hashtags
        ]);
    }
}
