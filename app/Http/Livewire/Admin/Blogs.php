<?php

namespace App\Http\Livewire\Admin;


use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Catergories;
use App\Models\Language;
use App\Models\Hashtag;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
class Blogs extends Component
{
    use WithFileUploads;
    public string $title;
    public string $content;
    public string $readingTime;
    public $blogPhoto;
    public $category;
    public $hashtags = [];
    public $language;
    protected $listeners  = ['store', 'destroy'];
    protected $rules = [
        'title' => 'required|min:10|max:100',
        'content' => 'required|string|min:100',
        'readingTime' => 'required|min:3|max:100',
        'category' => 'required',
        'hashtags' => 'required',
        'language' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
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
        $validatedData = $this->validate();
        try {
            if ($this->blogPhoto == null) {
                $blogPhoto = null;
            } else {
                $imageName = time() . '.' . $this->blogPhoto->extension();
                $blogPhoto = $this->blogPhoto->storeAs('blog-images', $imageName, 'public');
            }
            $blog = Blog::create([
                'title' => $this->title,
                'slug' => $this->slug_ar($this->title),
                'blog_photo' => $blogPhoto,
                'content' => $this->content,
                'reading_time' => $this->readingTime,
                'category_id' => $this->category,
                'language_id' => $this->language,
                'user_id' => Auth::id(),
            ]);
            if (!empty($this->hashtags)) {
                $blog->hashtags()->attach($this->hashtags);
            }
            $this->dispatchBrowserEvent('store', [
                'type' => 'success',
                'title' => 'Blog Published.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->resetInput();
            session()->flash('message', 'Blog Published.');
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
        $this->hashtags = [];
        $this->language = '';
    }
    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('delete', [
            'title' => 'Are you sure?',
            'text' => "You won't be able to revert this!",
            'icon' => 'warning',
            'id' => $id,
        ]);
    }
    public function destroy($id)
    {
        try{
            Blog::find($id)->delete();
            $this->dispatchBrowserEvent('deleted', [
                'type' => 'success',
                'title' => 'Blog Deleted.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function show(Blog $blog)
    {
        return $blog;
    }
    public function render()
    {
        return view('livewire.admin.blogs', [
            'blog' => Blog::all(),
            'categories' => Category::all(),
            'languages' => Language::all(),
            'hashtagsList' => Hashtag::all(),
        ]);
    }
}
