<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class SearchBar extends Component
{
    public $search = "";
    public $pageName;

    protected $rules = [
        'search' => 'min:3',
    ];
    public function updatedSearch($value)
    {
        $this->validate();
        $this->emit('searchUpdated', $value);
    }
    public function render()
    {
        return view('livewire.components.search-bar');
    }
}
