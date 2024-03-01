<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Catergories;
use App\Models\Hashtag;
use App\Models\Language;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class EditBlog extends Component
{   
    use WithFileUploads;
    public $blog;
    public string $title;
    public string $content;
    public string $readingTime;
    public $blogPhoto;
    public $category;
    public $language;
    public $hashtags = [];
    public $imageRemoved = false;
    protected $listeners  = ['contentUpdated'];
    protected $rules = [
        'title' => 'required|min:10|max:100',
        'content' => 'required|string|min:10',
        'readingTime' => 'required|min:3|max:100',
        'category' => 'required',
        'hashtags' => 'required',
        'language' => 'required',
    ];
    public function mount($id)
    {
        $this->blog = Blog::find($id);  
        $this->title = $this->blog->title;
        $this->readingTime = $this->blog->reading_time;
        $this->category = $this->blog->category_id;
        $this->language = $this->blog->language_id;
        $this->hashtags = $this->blog->hashtags->pluck('id')->toArray();
        $this->content = $this->blog->content;
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
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function BlogUpdated()
    {
        $this->emit('getUpdatedContent');
    }
    public function contentUpdated($content)
    {   
        $this->content = $content;
    }
    public function removeImage()
{
    if ($this->blog && $this->blog->blog_photo) {
        // Delete the image file from storage
        Storage::delete($this->blog->blog_photo);

        // Update the blog post to remove the image reference
        $this->blog->update(['blog_photo' => null]);

        $this->dispatchBrowserEvent('deleted', [
            'type' => 'success',
            'title' => 'Image Removed.',
            'icon' => 'success',
            'iconColor' => 'green',
        ]);
    }
    $this->imageRemoved = true;
}

    public function updateBlog(){
        
        // $this->content = $content;
        // logger($content);
        $id = $this->blog->id;
        $this->validate();
        try {
            if ($this->blogPhoto) {
                $imageName = time() . '.' . $this->blogPhoto->extension();
                $blogPhoto = $this->blogPhoto->storeAs('blog-images', $imageName, 'public');
            } else {
                // No new photo, so use the existing one
                if($this->imageRemoved == true){
                    $blogPhoto = null;
                }else{
                $blogPhoto = $this->blog->blog_photo;
                }
            }
            $blog = Blog::findOrFail($id);
            Blog::where('id',$id)->update([
                'title' => $this->title,
                'slug' => Str::slug($this->title),
                'content' => $this->content,
                'reading_time' => $this->readingTime,
                'category_id' => $this->category,
                'language_id' => $this->language,
                'blog_photo' => $blogPhoto,
            ]);
            $blog->hashtags()->sync($this->hashtags);
            $this->dispatchBrowserEvent('update', [
                'type' => 'success',
                'title' => 'Blog Updated.',
                'icon' => 'success',
                'iconColor' => 'green',
            ]);
            $this->resetLocalStorages();
            return redirect()->route('adminBlogs');
        } catch (\Throwable $th) {
            dd($th);
        }
        
    }
    public function resetLocalStorages()
    {
        $this->emit('removeBlogEditLocalStorage');
    }
    public function render()
    {
        return view('livewire.admin.edit-blog',[
            'categories' => Category::all(),
            'languages' => Language::all(),
            'hashtagsList' => Hashtag::all(),
        ]);
    }
}
