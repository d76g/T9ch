<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Skills as ModelsSkills;
use Livewire\Component;
use Livewire\WithFileUploads;

class Skills extends Component
{
    use WithFileUploads;
    public $skills = [];
    public $name;
    public $level;
    public $image;
    public $editedIndex = null;
    protected $rules = [
        'name' => 'required',
        'level' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3000',
    ];
    protected $listeners = ['destroy'];
    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'skills.*.name.required' => 'The name cannot be empty.',
        'level.required' => 'The level cannot be empty.',
        'skills.*.level.required' => 'The level cannot be empty.',
        'image.required' => 'The Image cannot be empty.',
        'skills.*.image.required' => 'The Image cannot be empty.',

    ];
    public function store(){
        $this->validate();
    try{
        if ($this->image == null) {
            $image = null;
        } else {
            $imageName = time() . '.' . $this->image->extension();
            $image = $this->image->storeAs('skill', $imageName, 'public');
        }
        ModelsSkills::create([
            'name' => $this->name,
            'level' => $this->level,
            'image' => $image,
        ]);
        $this->name = '';
        $this->level = '';
        $this->image = '';
        $this->dispatchBrowserEvent('store', [
            'type' => 'success',
            'title' => 'Achievement Added.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
    } catch(\Exception $e){
        dd($e->getMessage());
    }
    }
    public function edit($id){
        $this->editedIndex = $id;
    }
    public function cancel()
    {
        $this->editedIndex = null;
    }
    public function update($id)
    {
        $this->validate([
            'skills.'.$id.'.name' => 'required',
            'skills.'.$id.'.level' => 'required',
        ]);
        $updateSkill = $this->skills[$id] ?? null;
                if(!is_null($updateSkill)){
                    $skill = ModelsSkills::find($updateSkill['id']);
                    if($skill){
                        if ($this->image == null) {
                            $image = $skill->image;
                        } else {
                            $imageName = time() . '.' . $this->image->extension();
                            $image = $this->image->storeAs('skill', $imageName, 'public');
                        }
                        $updateSkill['image'] = $image;
                        $skill->update($updateSkill);
                    }
                }
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => 'Skill updated.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->editedIndex = null;
    }
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('delete', [
            'title' => 'Are you sure?',
            'text' => "This will delete it permanently.",
            'icon' => 'warning',
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
        try{
            Modelsskills::find($id)->delete();
            $this->dispatchBrowserEvent('deleted', [
                'type' => 'success',
                'title' => 'Deleted.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function render()
    {
        $this->skills = ModelsSkills::all()->toArray();
        return view('livewire.admin.pages.skills',
        [
            'skills' => $this->skills,
        ]);
    }
}
