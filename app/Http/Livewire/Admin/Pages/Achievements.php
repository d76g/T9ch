<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Achievements as ModelsAchievements;
use Livewire\Component;
use Livewire\WithFileUploads;
class Achievements extends Component
{
    use WithFileUploads;
    public $achievements = [];
    public $name;
    public $date;
    public $image;
    public $editedIndex = null;
    protected $rules = [
        'name' => 'required',
        'date' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:3000',
    ];
    protected $listeners = ['destroy'];
    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'achievements.*.name.required' => 'The name cannot be empty.',
        'date.required' => 'The date cannot be empty.',
        'achievements.*.date.required' => 'The date cannot be empty.',
        'image.required' => 'The Image cannot be empty.',
        'achievements.*.image.required' => 'The Image cannot be empty.',

    ];
    public function store(){
        $this->validate();
    try{
        if ($this->image == null) {
            $image = null;
        } else {
            $imageName = time() . '.' . $this->image->extension();
            $image = $this->image->storeAs('achievement', $imageName, 'public');
        }
        ModelsAchievements::create([
            'name' => $this->name,
            'date' => $this->date,
            'image' => $image,
        ]);
        $this->name = '';
        $this->date = '';
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
            'achievements.*.date' => 'required|min:3|max:50',
            'achievements.*.name' => 'required|min:10|string|max:255',
        ]);
        $updateAchievement = $this->achievements[$id] ?? null;
                if(!is_null($updateAchievement)){
                    optional(ModelsAchievements::find($updateAchievement['id']))->update($updateAchievement);
                }
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => 'Experience Updated.',
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
            ModelsAchievements::find($id)->delete();
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
        $this->achievements = ModelsAchievements::all()->toArray();
        return view('livewire.admin.pages.achievements', [
            'achievements' => $this->achievements,
        ]);
    }
}
