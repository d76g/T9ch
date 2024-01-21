
<div class="mb-12 lg:mt-12">
    <div class="relative bg-Mygray w-auto sm:w-full h-full flex flex-col items-center mb-6">
        <div class="flex mb-6">
            <div class="flex flex-col">
                <h1 class="text-4xl md:text-7xl">مُـدونات</h1>
            </div>
        </div>
        @if ($blogs->count() >= 4)
        <div class="grid grid-rows-3 gap-0 lg:grid-cols-3 lg:gap-2 h-full lg:h-70vh">
            {{-- Left --}}
            <div class="flex flex-col w-96  sm:w-auto h-full lg:h-70vh gap-1 sm:gap-3 px-3 my-1"> 
                <div class="px-1 w-full h-14 sm:h-20 md:h-22 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    @if ($randomCategory != null)
                        <div class="bg-dark-blue rounded-xl flex justify-center items-center "><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/category/{{$randomCategory[0]->slug}}">{{$randomCategory[0]->category}}</a></h1></div>
                        <div class="bg-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/category/{{$randomCategory[1]->slug}}">{{$randomCategory[1]->category}}</a></h1></div>
                    @endif
                </div>
                <div class="grid gap-2">
                @foreach ($latestTwoBlogs as $blog)        
                <div class="px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 bg-blue rounded-xl text-Mygray font-jomhuria {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="p-4 flex flex-col">
                        <a href="/blog/{{$blog->slug}}"><span class="h-20 sm:h-22 md:h-24 lg:h-28 text-3xl sm:text-4xl md:text-5xl lg:text-4xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">{{$blog->title}}</span></a>
                        <div class="flex justify-between w-auto font-plex items-center">
                            <span class="text-Mygray text-sm text-left font-plex px-1">
                                @php
                                    $created_at = $blog->created_at;
                                    $current_date = now();
                                    // Check if the post is more than a year old
                                    if ($created_at->format('Y') < $current_date->format('Y')) {
                                        // Post is more than a year old
                                        echo $created_at->format('d M Y');
                                    } else {
                                        // Post is less than a year old
                                        echo $created_at->format('d M');
                                    }
                                @endphp
                            </span>
                            <x-eos-fiber-new-o  class="h-10 w-10 animate-pulse"/>
                        </div>
                        <div class="flex justify-between w-auto font-plex items-end text-sm">
                            <p><i class="fas fa-book px-1"></i><a href="/category/{{$blog->category->slug}}">{{$blog->category->category}}</a> </p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$blog->reading_time}}</p>
                        </div>
                    </div>
                </div>
                
                @endforeach
                </div>
            </div>
            {{-- End --}}
            {{-- Middle --}}
            <div class="flex flex-col w-96  sm:w-auto h-full lg:h-70vh gap-1 sm:gap-3 px-3  my-1"> 
                <div class="px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 bg-blue rounded-xl text-Mygray font-jomhuria {{$randomBlog[0]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="p-4 flex flex-col">
                        <a href="/blog/{{$randomBlog[0]->slug}}"><span class="h-20 sm:h-22 md:h-24 lg:h-28 text-3xl sm:text-4xl md:text-5xl lg:text-4xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">{{$randomBlog[0]->title}}</span></a>
                        <span class="text-Mygray text-sm text-left font-plex px-1">
                            @php
                                $created_at = $randomBlog[0]->created_at;
                                $current_date = now();
                                // Check if the post is more than a year old
                                if ($created_at->format('Y') < $current_date->format('Y')) {
                                    // Post is more than a year old
                                    echo $created_at->format('d M Y');
                                } else {
                                    // Post is less than a year old
                                    echo $created_at->format('d M');
                                }
                            @endphp
                        </span>
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[0]->category->slug}}">{{$randomBlog[0]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[0]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                <div class="px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 bg-dark-blue rounded-xl text-Mygray font-jomhuria {{$randomBlog[1]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="p-4 flex flex-col">
                        <a href="/blog/{{$randomBlog[1]->slug}}"><span class="h-20 sm:h-22 md:h-24 lg:h-32 text-3xl sm:text-4xl md:text-5xl lg:text-4xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">{{$randomBlog[1]->title}}</span></a>
                        <span class="text-Mygray text-sm text-left font-plex px-1">
                            @php
                                $created_at = $randomBlog[1]->created_at;
                                $current_date = now();
                                // Check if the post is more than a year old
                                if ($created_at->format('Y') < $current_date->format('Y')) {
                                    // Post is more than a year old
                                    echo $created_at->format('d M Y');
                                } else {
                                    // Post is less than a year old
                                    echo $created_at->format('d M');
                                }
                            @endphp
                        </span>
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[1]->category->slug}}">{{$randomBlog[1]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[1]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    <div class="bg-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[0]->name}}">{{$randomHashtag[0]->name}}</a></h1></div>
                    <div class="bg-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[1]->name}}">{{$randomHashtag[1]->name}}</a></h1></div>
                </div>
            </div>
            {{-- End --}}
            {{-- Right --}}
            <div class="flex flex-col w-96  sm:w-auto h-full lg:h-70vh gap-1 sm:gap-3 px-3  my-1"> 
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                        <div class="bg-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[2]->name}}">{{$randomHashtag[2]->name}}</a></h1></div>
                        <div class="bg-dark-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[3]->name}}">{{$randomHashtag[3]->name}}</a></h1></div>
                </div>
                <div class="grid gap-2">
                <div class="px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 bg-dark-blue rounded-xl text-Mygray font-jomhuria {{$randomBlog[2]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="p-4 flex flex-col">
                        <a href="/blog/{{$randomBlog[2]->slug}}"> <span class="h-20 sm:h-22 md:h-24 lg:h-32 text-3xl sm:text-4xl md:text-5xl lg:text-4xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">{{$randomBlog[2]->title}}</span></a>
                        <span class="text-Mygray text-sm text-left font-plex px-1">
                            @php
                                $created_at = $randomBlog[2]->created_at;
                                $current_date = now();
                                // Check if the post is more than a year old
                                if ($created_at->format('Y') < $current_date->format('Y')) {
                                    // Post is more than a year old
                                    echo $created_at->format('d M Y');
                                } else {
                                    // Post is less than a year old
                                    echo $created_at->format('d M');
                                }
                            @endphp
                        </span>
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[2]->category->slug}}">{{$randomBlog[2]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[2]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-52 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    <div class="bg-dark-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[4]->name}}">{{$randomHashtag[4]->name}}</a></h1></div>
                    <div class="bg-blue rounded-xl flex justify-center items-center"><h1 class="text-3xl sm:text-5xl lg:text-3xl font-jomhuria"><a href="/hashtag/{{$randomHashtag[5]->name}}">{{$randomHashtag[5]->name}}</a></h1></div>
                </div>
            </div>     
            {{-- End --}}
        </div>
        @endif
        <div class="flex justify-center items-center text-3xl font-jomhuria">
            <a href="/blogs" class="hover:text-blue hover:underline transition ease-in-out  hover:scale-110">View all blogs</a>
        </div>
        
    </div>
   
</div>

{{-- <script src="{{asset('js/arabicNumbers.js')}}"></script> --}}