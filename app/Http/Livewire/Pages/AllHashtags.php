<?php

namespace App\Http\Livewire\Pages;

use App\Models\Hashtag;
use Livewire\Component;

class AllHashtags extends Component
{
    public function render()
    {
        $allHashtags = Hashtag::withCount('blogs')->get();
        return view('livewire.pages.all-hashtags',
        [
            'allHashtags' => $allHashtags
        ]
        )->layout('layouts.guest');
    }
}
