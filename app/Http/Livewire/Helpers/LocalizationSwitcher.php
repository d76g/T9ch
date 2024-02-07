<?php

namespace App\Http\Livewire\Helpers;

use Livewire\Component;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationSwitcher extends Component
{
    public $locale;

    public function mount()
    {
        $this->locale = App::getLocale();
    }

    public function switchLang($lang)
    {
        if (array_key_exists($lang, config('app.languages'))) {
            Session::put('locale', $lang);
            App::setLocale($lang);
            $this->locale = $lang;
            $this->emit('localeChanged'); // Optional: Emit an event if needed
        }
    }
    public function render()
    {
        return view('livewire.helpers.localization-switcher');
    }
}
