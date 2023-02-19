<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Catergories;

class BlogCategory extends Component
{
    public string $category;
    public string $desc;
    public $updateMode = false;
    protected $rules = [
        'category' => 'required|min:3|max:100',
        'desc' => 'required|min:10|string|max:255',
    ];
    public function store()
    {
        $this->validate();

        try {
            Catergories::create([
                'category' => $this->category,
                'desc' => $this->desc,
            ]);
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Data Saved.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->category = '';
            $this->desc = '';
            redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function render()
    {
        return view('livewire.admin.blog-category', [
            'categoryList' => Catergories::all(),
        ]);
    }
}
