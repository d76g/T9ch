<?php

namespace App\Http\Livewire\Pages;

use App\Models\Skills;
use App\Models\Profile;
use Livewire\Component;
use App\Models\Achievements;
use App\Models\WorkExperience;
use App\Models\currentCourses;
class AboutMe extends Component
{
    public function render()
    {
        return view('livewire.pages.about-me',
        [
            'profile' => Profile::first(),
            'currentCourses' => currentCourses::limit(3)->get(),
            'workExperience' => WorkExperience::all(),
            'skills' => Skills::all(),
            'achievements' => Achievements::all(),
        ]
        )->layout('layouts.guest');
    }
}
