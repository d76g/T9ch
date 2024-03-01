@section('title', 'New Blog')
<div class="w-full h-auto sm:h-full flex flex-col font-plex">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-center md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-center md:ml-8 font-plex rounded-md md:py-1 p-0.5 md:pl-6 md:mb-6">
            <span class="text-base md:text-xl">كتابة مدونة</span>
        </div>
    </div>
    <div class="w-full">
        <div class="flex flex-col justify-center items-center w-full text-right">
            <div class="w-11/12 md:w-5/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg">
                <span class="border-b py-1 mb-3 font-plex text-right">تعديل  </span>
                <form id="blog-form" wire:submit.prevent="BlogUpdated" class="w-full flex flex-col justify-center items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="w-11/12 flex flex-col justify-center items-center">
                        <div class="flex flex-col w-full">
                            <div class="flex flex-col my-4"
                            x-data="{ editTitle: $persist('') }"
                            x-init="
                            editTitle = localStorage.getItem('blogTitleEdit') || '{{$blog->title}}';
                            $wire.set('title', editTitle);
                            $watch('editTitle', value =>
                            {
                                $wire.set('title', value);
                                localStorage.setItem('blogTitleEdit', value)
                            })">
                                <label for="title" class="mb-2">العنوان</label>
                                <input type="text" name="title" id="title" x-model="editTitle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('title') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex flex-col my-4">
                                <label for="blogPhoto" class="mb-2">صورة</label>
                                <input type="file" name="blogPhoto" id="blogPhoto" wire:model="blogPhoto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('blogPhoto') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="flex" x-data="{ showImage: false }">

                                @if ($blog->blog_photo !== null)
                                <span class="text-xs hover:text-MyBlue cursor-pointer" @click="showImage = ! showImage"><i class="fa fa-eye px-1"></i>Show image</span>
                                @endif
                                <span wire:click="removeImage" class="text-xs hover:text-MyBlue cursor-pointer"><i class="fa fa-trash px-1 text-red"></i>Remove Image</span>
                                @if ($blogPhoto !== null)
                                    <img x-cloak x-show="showImage" x-transition.duration.400ms src="{{ $blogPhoto->temporaryUrl() }}" class="w-1/4 h-1/4" alt="">
                                @else
                                    <img x-cloak x-show="showImage" x-transition.duration.400ms src="{{URL::asset('/storage/'.$blog->blog_photo)}}" class="w-1/4 h-1/4" alt="">
                                @endif
                            </div>
                            <div x-data="editorEditContent()" class="flex flex-col my-6" wire:ignore>
                                <label for="content" class="mb-2"><i class="fa fa-eye pr-3"></i>المحتوى</label>
                                <div id="editor" class="text-lg" :class="{'rtl': isRtl, 'ltr': !isRtl}"></div>
                                <input type="hidden" name="content" id="content" x-ref="content">
                            </div>
                        </div>
                        <div class="flex w-full gap-4">
                            <div class="relative z-0 mb-6 w-full col-span-2"
                            x-data="{ editCategory: $persist('') }"
                            x-init="
                            editCategory = localStorage.getItem('blogCategoryEdit') || '{{$blog->category->id}}';
                            $wire.set('category', editCategory);
                            $watch('editCategory', value =>
                            {
                                $wire.set('category', value);
                                localStorage.setItem('blogCategoryEdit', value)
                            })">
                                <label for="category" class="mb-2">قائمة التصنيف</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex" x-model="editCategory">
                                <option>إختار تصنيف للمنشور</option>
                                @foreach ($categories as $category)
                                    <option class="font-playfair" value="{{$category->id}}" wire:key="{{$category->id}}" >{{$category->category}}</option>
                                @endforeach
                                </select>
                                @error('category') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 mb-6 w-full col-span-2"
                            x-data="{ editLanguage: $persist('') }"
                            x-init="
                            editLanguage = localStorage.getItem('blogLanguageEdit') || '{{$blog->language->id}}';
                            $wire.set('language', editLanguage);
                            $watch('editLanguage', value =>
                            {
                                $wire.set('language', value);
                                localStorage.setItem('blogLanguageEdit', value)
                            })"
                            >
                                <label for="language" class="mb-2">لغه المنشور</label>
                                <select id="language"  x-model="editLanguage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex">
                                <option>إختار اللغه</option>
                                @foreach ($languages as $language)
                                    <option class="font-playfair" value="{{$language->id}}" wire:key="{{$language->id}}" >{{$language->language}}</option>
                                @endforeach
                                </select>
                                @error('language') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 mb-6 w-full"
                            x-data="{ editReadingTime: $persist('') }"
                            x-init="
                            editReadingTime = localStorage.getItem('blogReadingTimeEdit') || '{{$blog->reading_time}}';
                            $wire.set('readingTime', editReadingTime);
                            $watch('editReadingTime', value =>
                            {
                                $wire.set('readingTime', value);
                                localStorage.setItem('blogReadingTimeEdit', value)
                            })"
                            >
                                <label for="readingTime" class="mb-2">وقت للقراءة</label>
                                <input type="text"  x-model="editReadingTime" id="readingTime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" "  />
                                @error('readingTime') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="relative z-0 mb-2 w-full">
                                <label for="hashtagsList" class="mb-2">Hashtags</label>
                                <select id="hashtagsList" name="hashtags[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 font-plex" wire:model="hashtags">
                                    @foreach ($hashtagsList as $hashtag)
                                        <option class="font-playfair" value="{{$hashtag->id}}">{{$hashtag->name}}</option>
                                    @endforeach
                                </select>
                                @error('hashtags') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="w-11/12">
                        <button 
                        wire:click="updateBlog" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                        <button wire:click="resetLocalStorages" class="text-white bg-red hover:bg-orange-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Undo Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>  
    <script>
        function editorEditContent() {
    return {
        isRtl: @entangle('blog.language.language').defer === 'Arabic',
        init() {
            setTimeout(() => {
                this.setContent();
            }, 1000); // Delay to ensure editor is initialized
        },
        setContent() {
            const initialContent = localStorage.getItem('blogContentEdit') || @json($blog->content);
            this.$refs.content.value = initialContent;
            
            if (window.contentEditor) {
                window.contentEditor.setMarkdown(initialContent);
                Livewire.emit('contentUpdated', initialContent);
                // Ensure changes in the editor update local storage and the hidden input
                window.contentEditor.on('change', () => {
                    const content = window.contentEditor.getMarkdown();
                    localStorage.setItem('blogContentEdit', content);
                    this.$refs.content.value = content;
                    Livewire.emit('contentUpdated', content);
                });
            }
        }
    }
}
    </script>  
</div>
