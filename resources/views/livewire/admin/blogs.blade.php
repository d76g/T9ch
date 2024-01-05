@section('title', 'New Blog')
<div class="w-full h-screen sm:h-full flex flex-col font-plex">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-center md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-center md:ml-8 font-plex rounded-md md:py-1 p-0.5 md:pl-6 md:mb-2">
            <span class="text-base md:text-xl">كتابة مدونة</span>
            <span class="text-xs md:text-sm">ماذا حاب ان تكتب اليوم؟</span>
        </div>
    </div>
   
    <div class="w-full">
        <div x-data="{show: false}" class="flex flex-col justify-center items-center w-full text-right overflow-y-auto max-h-full">
            <div class="flex flex-row  bg-blue text-white py-1 px-2 rounded-md justify-end items-end">
                <button @click="show = ! show">New Blog</button>
            </div>
            <div x-cloak x-show="show" x-transition class="w-11/12 h-full md:w-5/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg ">
                <div class="flex justify-between items-end border-b w-full">
                    <div class="py-2">
                        <button 
                        wire:click="BlogAdded" class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Post</button>
                    </div>
                    <p class=" py-1 mb-3 font-plex text-right">مدونة جديدة</p>

                </div>
                
                <form id="blog-form" wire:submit.prevent="BlogAdded" class="w-full flex flex-col justify-center items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="w-11/12 flex flex-col justify-center items-center">
                        <div class="flex flex-col w-full">
                            <div class="flex flex-col my-2">
                                <label for="title" class="mb-2">العنوان</label>
                                <input type="text" name="title" id="title" wire:model="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('title') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex flex-col my-2">
                                <label for="blogPhoto" class="mb-2">صورة</label>
                                <input type="file" name="blogPhoto" id="blogPhoto" wire:model="blogPhoto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('blogPhoto') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex flex-col my-4" wire:ignore>
                                <label for="editor" class="mb-2">المحتوى</label>
                                <div id="editor" class="text-lg"></div>
                                <input type="hidden" name="content" id="content">
                            </div>
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <div class="relative z-0 mb-2 w-full">
                                <label for="category" class="mb-2">قائمة التصنيف</label>
                                <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex" wire:model="category">
                                <option>إختار تصنيف للمنشور</option>
                                @foreach ($categories as $category)
                                    <option class="font-playfair" value="{{$category->id}}" wire:key="{{$category->id}}" >{{$category->category}}</option>
                                @endforeach
                                </select>
                                @error('category') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            <div class="relative z-0 mb-2 w-full">
                                <label for="language" class="mb-2">لغه المنشور</label>
                                <select id="language" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 font-plex" wire:model="language">
                                <option>إختار اللغه</option>
                                @foreach ($languages as $language)
                                    <option class="font-playfair" value="{{$language->id}}" wire:key="{{$language->id}}" >{{$language->language}}</option>
                                @endforeach
                                </select>
                                @error('language') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="relative z-0 mb-2 w-full">
                                <label for="readingTime" class="mb-2">وقت للقراءة</label>
                                <input type="text"  id="readingTime" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="readingTime" />
                                @error('readingTime') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            
                            <div class="relative z-0 mb-2 w-full">
                                <div class="flex flex-col mb-2 ">
                                    <label for="hashtags" class="">Hashtags</label>
                                    <p class="text-xs text-gray-400 flex justify-start">Press Ctrl or Command to multi select</p>
                                </div>
                                <select id="hashtags" name="hashtags[]" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-3 font-plex" wire:model="hashtags">
                                    @foreach ($hashtagsList as $hashtag)
                                        <option class="font-playfair" value="{{$hashtag->id}}">{{$hashtag->name}}</option>
                                    @endforeach
                                </select>
                                @error('hashtags') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>
                            
                            
                        </div>
                        
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
     {{-- Table Content --}}
     <div class="flex md:justify-center md:w-full">
        @if ($blog -> isEmpty())
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 dark:text-gray-400 my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Title</th>
                  <th scope="col" class="py-3 px-6">Reading Time</th>
                  <th scope="col" class="py-3 px-6">Category</th>
                  <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($blog as $data)
                       <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">{{$data->id}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">
                                <a class="dark:hover:text-white" href="/blog/{{$data->slug}}">{{$data->title}}</a>
                          </td>                          
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->reading_time}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->category->category}}</td>
                            <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="/blog/{{$data->slug}}" class="text-blue-500 hover:text-blue-800 dark:hover:text-blue-300"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('editBlog', ['id' => $data->id]) }}" class="text-green-500 hover:text-green-800 dark:hover:text-green-300"><i class="fa fa-edit"></i></a>
                                        <a wire:click="deleteConfirm({{$data->id}})" href="#" class="text-red-500 hover:text-red-800 dark:hover:text-red-300"><i class="fa fa-trash"></i></a>
                                    </div>                          
                       </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
            </div>
</div>


