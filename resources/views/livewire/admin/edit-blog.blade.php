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
                            <div class="flex flex-col my-4">
                                <label for="title" class="mb-2">العنوان</label>
                                <input type="text" name="title" id="title" wire:model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
                            <div  x-data="{ open: false }" class="flex flex-col my-6" wire:ignore >
                                <label for="editContent" class="mb-2"><i x-if="open" class="fa fa-eye pr-3" wire:click="setBlogContent" @click="open = ! open"></i>المحتوى</label>
                                
                                <div id="editor" class="text-lg {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}" x-cloak x-show="open" x-transition.duration.400ms></div>
                                <input type="hidden" name="editContent" id="editContent">
                            </div>
                        </div>
                        <div class="flex w-full gap-4">
                            <div class="relative z-0 mb-6 w-full col-span-2">
                                <label for="category" class="mb-2">قائمة التصنيف</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex" wire:model="category">
                                <option>إختار تصنيف للمنشور</option>
                                @foreach ($categories as $category)
                                    <option class="font-playfair" value="{{$category->id}}" wire:key="{{$category->id}}" >{{$category->category}}</option>
                                @endforeach
                                </select>
                                @error('category') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 mb-6 w-full col-span-2">
                                <label for="language" class="mb-2">لغه المنشور</label>
                                <select id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex" wire:model="language">
                                <option>إختار اللغه</option>
                                @foreach ($languages as $language)
                                    <option class="font-playfair" value="{{$language->id}}" wire:key="{{$language->id}}" >{{$language->language}}</option>
                                @endforeach
                                </select>
                                @error('language') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 mb-6 w-full">
                                <label for="readingTime" class="mb-2">وقت للقراءة</label>
                                <input type="text"  id="readingTime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="readingTime" />
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
                        wire:click="BlogUpdated" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
