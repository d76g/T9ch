<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\currentCourses;
use Livewire\Component;

class CurrentCourse extends Component
{
    public $currentCourses = [];
    public $name;
    public $percentage;
    public $editedIndex = null;
    protected $rules = [
        'name' => 'required',
        'percentage' => 'required',
    ];
    protected $listeners = ['destroy'];
    protected $messages = [
        'name.required' => 'The name cannot be empty.',
        'currentCourse.*.name.required' => 'The name cannot be empty.',
        'percentage.required' => 'The percentage cannot be empty.',
        'currentCourse.*.percentage.required' => 'The percentage cannot be empty.',
    ];
    public function store(){
        $this->validate();
        try{
            currentCourses::create([
                'name' => $this->name,
                'percentage' => $this->percentage,
            ]);
            $this->name = '';
            $this->percentage = '';
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Course Added.',
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
    public function update($id){
        $this->validate(
            [
                'currentCourses.'.$id.'.name' => 'required',
                'currentCourses.'.$id.'.percentage' => 'required',
            ]
        );
        try{
            $updateCourse = $this->currentCourses[$id] ?? null;
            if(!is_null($updateCourse)){
                optional(currentCourses::find($updateCourse['id']))->update($updateCourse);
            }
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => 'Course Updated.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->editedIndex = null;
        } catch(\Exception $e){
            dd($e->getMessage());
        }
    }
    public function cancel()
    {
        $this->editedIndex = null;
    }
    public function deleteConfirm($id){
        $this->dispatchBrowserEvent('delete', [
            'type' => 'warning',
            'title' => 'Are you sure?',
            'text' => 'Once deleted, you will not be able to recover this course!',
            'id' => $id,
        ]);
    }
    public function destroy($id){
        try{
            currentCourses::find($id)->delete();
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Course Deleted.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
        } catch(\Exception $e){
            dd($e->getMessage());
        }
    }
    public function render()
    {
        $this->currentCourses = currentCourses::all()->toArray();
        return view('livewire.admin.pages.current-course', [
            'currentCourses' => $this->currentCourses,
        ]);
    }
}
