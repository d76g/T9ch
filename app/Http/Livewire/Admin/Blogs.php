<?php

namespace App\Http\Livewire\Admin;

use App\Models\Blog;
use Livewire\Component;
use App\Models\Catergories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class Blogs extends Component
{
    use WithFileUploads;
    public string $title;
    public string $content;
    public string $readingTime;
    public $blogPhoto;
    public $category;
    protected $listeners  = ['store'];
    protected $rules = [
        'title' => 'required|min:10|max:255',
        'blogPhoto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4000',
        'content' => 'required|string|min:10',
        'readingTime' => 'required|min:3|max:100',
        'category' => 'required',
    ];
    public function BlogAdded()
    {
        $this->emit('getContent');
    }
    public static function slug_ar($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }
        $string = trim($string);
        $string = mb_strtolower($string, "UTF-8");
        // '/' and/or '\' if found and not remoeved it will change the get request route
        $string = str_replace('/', $separator, $string);
        $string = str_replace('\\', $separator, $string);
        $string = preg_replace(
            "/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/",
            "",
            $string
        );
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }
    public function store($content)
    {
        $this->content = $content;
        $this->validate();
        try {
            $imageName = time() . '.' . $this->blogPhoto->extension();
            $blogPhoto = $this->blogPhoto->storeAs('blog-images', $imageName, 'public');
            Blog::create([
                'title' => $this->title,
                'slug' => $this->slug_ar($this->title),
                'blog_photo' => $blogPhoto,
                'content' => $this->content,
                'reading_time' => $this->readingTime,
                'category_id' => $this->category,
                'user_id' => Auth::id(),
            ]);
            $this->resetInput();
            redirect()->back();
        } catch (\Throwable $th) {
            dd($th);
        }
    }
    public function resetInput()
    {
        $this->title = '';
        $this->content = '';
        $this->blogPhoto = '';
        $this->readingTime = '';
        $this->category = '';
    }
    public function show(Blog $blog)
    {
        return $blog;
    }
    public function render()
    {
        return view('livewire.admin.blogs', [
            'blog' => Blog::all(),
            'categories' => Catergories::all(),
        ]);
    }
}
