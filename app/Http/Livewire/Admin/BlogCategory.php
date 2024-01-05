<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use App\Models\Catergories;
use App\Models\Hashtag;
class BlogCategory extends Component
{
    public $categoryList = [];
    public $hashtagList = [];
    public string $category;
    public string $desc;
    public $hashtag;
    public $hastagDesc;
    public $editedCategoryIndex = null;
    public $editedHashtagIndex = null;
    protected $rules = [
        'categoryList.*.category' => 'required|min:3|max:100',
        'categoryList.*.desc' => 'required|min:10|string|max:255',
        'hashtagList.*.name' => 'required|min:3|max:100',
        'hashtagList.*.description' => 'required|min:10|string|max:255',
    ];
    protected $messages = [
        'categoryList.*.category.required' => 'The Catergory name cannot be empty.',
        'categoryList.*.category.min' => 'The Catergory name cannot be short.',
        'categoryList.*.desc.required' => 'The Description cannot be empty.',
        'categoryList.*.desc.min' => 'The Description cannot be short.',
        'hashtagList.*.name.required' => 'The Hashtag name cannot be empty.',
        'hashtagList.*.name.min' => 'The Hashtag name cannot be short.',
        'hashtagList.*.description.required' => 'The Description cannot be empty.',
        'hashtagList.*.description.min' => 'The Description cannot be short.',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    protected $listeners = ['destroy'];

    public function store()
    {
        $validatedData = $this->validate([
            'category' => 'required|min:3|max:100',
            'desc' => 'required|min:10|string|max:255',
        ]);

        try {
            Category::create([
                'category' => $this->category,
                'desc' => $this->desc,
            ]);
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Category Created.',
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
    public function storeHashtag()
    {
        $validatedData = $this->validate([
            'hashtag' => 'required|min:3|max:100',
            'hastagDesc' => 'required|min:10|string|max:255',
        ]);
        try {
            Hashtag::create([
                'name' => $this->hashtag,
                'description' => $this->hastagDesc,
            ]);
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Hashtag Created.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->hashtag = '';
            $this->hastagDesc = '';
            redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function deleteConfirm($id, $name)
    {
        logger($id . ' delete confirm');
        $this->dispatchBrowserEvent('delete', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'id' => $id,
            'name' => $name,
        ]);
    }
    public function edit($id)
    {
        $this->editedCategoryIndex = $id;
    }
    public function editHashtag($id)
    {
        $this->editedHashtagIndex = $id;
    }
    public function update($id, $name)
    {
            if($name == 'Category'){
                $this->validate([
                    'categoryList.*.category' => 'required|min:6|max:50',
                    'categoryList.*.desc' => 'required|min:10|string|max:255',
                ]);
                $updateCategory = $this->categoryList[$id] ?? null;
                if(!is_null($updateCategory)){
                    optional(Category::find($updateCategory['id']))->update($updateCategory);             
                }
            } else {
                $this->validate([
                    'hashtagList.*.name' => 'required|min:6|max:50',
                    'hashtagList.*.description' => 'required|min:10|string|max:255',
                ]);
                $updateHashtag = $this->hashtagList[$id] ?? null;
                if(!is_null($updateHashtag)){
                    optional(Hashtag::find($updateHashtag['id']))->update($updateHashtag);             
                }
            }
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => $name.' Updated.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->editedCategoryIndex = null;
            $this->editedHashtagIndex = null;
        
        
    }
    public function cancel()
    {
        $this->editedCategoryIndex = null;
        $this->editedHashtagIndex = null;
    }
    public function destroy($id, $name)
    {
        logger($name);
        try{
            if($name == 'Category'){
                Category::find($id)->delete();
            } else {
                Hashtag::find($id)->delete();
            }
            $this->dispatchBrowserEvent('deleted', [
                'type' => 'success',
                'title' => $name.' Deleted.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            
        } catch (\Throwable $th) {
            $errorCode = $th->getCode();
            if($errorCode == 23000){
                $this->dispatchBrowserEvent('error', [
                    'title' => 'Cannot Delete Category, It is being used.',
                    'icon' => 'error',
                    'iconColor' => 'red',
                ]);
            } else {
                dd($th);
            }
        }
        
    }
    public function render()
    {
        $this->categoryList = Category::all()->toArray();
        $this->hashtagList = Hashtag::all()->toArray();
        return view('livewire.admin.blog-category', [
            'categoryList' => $this->categoryList,
            'hashtagList' => $this->hashtagList,
        ]);
    }
}
