<?php

namespace App\Http\Livewire\Components;

use App\Models\Catergories;
use Livewire\Component;

class CateList extends Component
{
    public function render()
    {
        return view('livewire.components.cate-list', [
            'cateList' => Catergories::all(),
        ]);
    }
}
