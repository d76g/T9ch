<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\WorkExperience as ModelsWorkExperience;
use Livewire\Component;

class WorkExperience extends Component
{
    public $experiences = [];
    public $position;
    public $company;
    public $start_date;
    public $end_date;
    public $editedIndex = null;
    protected $rules = [
        'position' => 'required',
        'company' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
    ];
    protected $listeners = ['destroy'];
    protected $messages = [
        'position.required' => 'The Position cannot be empty.',
        'experiences.*.position.required' => 'The Position cannot be empty.',
        'company.required' => 'The Company cannot be empty.',
        'experiences.*.company.required' => 'The Company cannot be empty.',
        'start_date.required' => 'The Start Date cannot be empty.',
        'experiences.*.start_date.required' => 'The Start Date cannot be empty.',
        'end_date.required' => 'The End Date cannot be empty.',
        'experiences.*.required' => 'The End Date cannot be empty.',

    ];
    public function store(){
        $this->validate();
    try{
        ModelsWorkExperience::create([
            'position' => $this->position,
            'company' => $this->company,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);
        $this->position = '';
        $this->company = '';
        $this->start_date = '';
        $this->end_date = '';
        $this->dispatchBrowserEvent('store', [
            'type' => 'success',
            'title' => 'Experience Added.',
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
            'experiences.*.company' => 'required|min:3|max:50',
            'experiences.*.start_date' => 'required|min:3|max:50',
            'experiences.*.end_date' => 'required|min:3|max:50',
            'experiences.*.position' => 'required|min:10|string|max:255',
        ]);
        $updateExperience = $this->experiences[$id] ?? null;
                if(!is_null($updateExperience)){
                    optional(ModelsWorkExperience::find($updateExperience['id']))->update($updateExperience);
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
            ModelsWorkExperience::find($id)->delete();
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
        $this->experiences = ModelsWorkExperience::all()->toArray();
        return view('livewire.admin.pages.work-experience', [
            'experiences' => $this->experiences,
        ]);
    }
}
