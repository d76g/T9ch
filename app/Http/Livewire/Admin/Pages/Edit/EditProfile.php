<?php

namespace App\Http\Livewire\Admin\Pages\Edit;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    use WithFileUploads;
    public $profile;
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
    public function mount($id){
        $this->profile = Profile::find($id);
        $this->name = $this->profile->name;
        $this->position = $this->profile->position;
        $this->about = $this->profile->about;
        $this->location = $this->profile->location;
        $this->website = $this->profile->website;
        $this->twitter = $this->profile->twitter;
        $this->facebook = $this->profile->facebook;
        $this->instagram = $this->profile->instagram;
        $this->linkedin = $this->profile->linkedin;
        $this->github = $this->profile->github;
    }
    protected $rules = [
        'name' => 'required',
        'position' => 'required',
        'about' => 'required',
        'location' => 'required',
    ];
    public function update(){
        $this->validate();
        $id = $this->profile->id;
        try {
            if ($this->profile_image) {
                $imageName = time() . '.' . $this->profile_image->extension();
                $profile_image = $this->profile_image->storeAs('profile-images', $imageName, 'public');
            } else {
                $profile_image = $this->profile->profile_image;
            }
            Profile::where('id',$id)->update([
                'name' => $this->name,
                'position' => $this->position,
                'profile_image' => $profile_image, // 'profile_images' is the folder name where the image will be stored in 'storage/app/public/profile_images
                'about' => $this->about,
                'location' => $this->location,
                'website' => $this->website,
                'twitter' => $this->twitter,
                'facebook' => $this->facebook,
                'instagram' => $this->instagram,
                'linkedin' => $this->linkedin,
                'github' => $this->github,
            ]);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        
        $this->dispatchBrowserEvent('update', [
            'type' => 'success',
            'title' => 'Profile Updated.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
        redirect()->route('myProfile');
    }
    public function render()
    {
        return view('livewire.admin.pages.edit.edit-profile');
    }
}
