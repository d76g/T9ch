<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Models\Profile as ModelsProfile;
use Livewire\Component;
use Livewire\WithFileUploads;
class Profile extends Component
{
    use WithFileUploads;
    public $name;
    public $profile_image;
    public $position;
    public $about;
    public $location;
    public $website;
    public $twitter;
    public $facebook;
    public $instagram;
    public $linkedin;
    public $github;
    protected $listeners = ['destroy'];
    public function store(){
        $this->validate([
            'name' => 'required',
            'position' => 'required',
            'about' => 'required',
            'location' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try{
            if ($this->profile_image == null) {
                $profile_image = null;
            } else {
                $imageName = time() . '.' . $this->profile_image->extension();
                $profile_image = $this->profile_image->storeAs('profile-images', $imageName, 'public');
            }
            ModelsProfile::create([
                'name' => $this->name,
                'profile_image' => $profile_image,
                'position' => $this->position,
                'about' => $this->about,
                'location' => $this->location,
                'website' => $this->website,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
                'github' => $this->github,
            ]);
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Profile Created.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->resetFields();
            redirect()->back();
        } catch (\Exception $e){
            dd($e);
        }
    }
    public function resetFields(){
        $this->name = '';
        $this->profile_image = '';
        $this->position = '';
        $this->about = '';
        $this->location = '';
        $this->website = '';
        $this->twitter = '';
        $this->facebook = '';
        $this->instagram = '';
        $this->linkedin = '';
        $this->github = '';
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
            ModelsProfile::find($id)->delete();
            $this->dispatchBrowserEvent('deleted', [
                'type' => 'success',
                'title' => 'Profile Deleted.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function render()
    {
        return view('livewire.admin.pages.profile', [
            'profiles' => ModelsProfile::all(),
        ]);
    }
}
