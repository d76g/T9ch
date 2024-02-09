@section('title'){{'Home'}}@endsection
<div class="mb-10 mt-8 lg:mt-12">
    <div class="relative bg-Mygray w-auto sm:w-full h-full flex flex-col items-center mb-6">
        <div class="flex mb-4">
            <div class="flex flex-col">
                <h1 class="text-6xl md:text-7xl">{{__('Blogs')}}</h1>
            </div>
        </div>
        @if ($blogs->count() >= 4)
        <div class="grid grid-rows-3 gap-0 lg:grid-cols-3 lg:gap-2 h-full lg:h-70vh lg:px-10">
            {{-- Left --}}
            <div class="flex flex-col w-96 sm:w-full h-full lg:h-70vh gap-1 sm:gap-3 px-3 my-1"> 
                <div class="px-1 w-full h-14 sm:h-20 md:h-22 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    @if ($randomCategory != null)
                        <div class="relative bg-dark-blue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center ">
                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                            <h1 class="z-20 text-lg sm:text-2xl lg:text-2xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out">
                                <a href="/category/{{$randomCategory[0]->slug}}">{{$randomCategory[0]->category}}</a>
                            </h1>
                        </div>
                        <div class="relative bg-MyBlue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">
                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                            <h1 class="-20 text-lg sm:text-2xl lg:text-2xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out">
                                <a href="/category/{{$randomCategory[1]->slug}}">{{$randomCategory[1]->category}}</a>
                            </h1>
                        </div>
                    @endif
                </div>
                <div class="grid gap-2">
                @foreach ($latestTwoBlogs as $blog)        
                <div class="relative px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 group hover:bg-gray-400 borader bg-MyBlue rounded-xl text-Mygray  {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="absolute top-4 rounded-full h-20 w-20 bg-blue-500 opacity-0 hidden transition ease-in-out duration-300 group-hover:flex justify-center items-center yellow-circle group-hover:opacity-100">
                        <span class="relative text-white font-plex text-3xl font-bold">&lt;;</span>
                    </div>
                    <div class="p-4 flex flex-col">
                        <div class="h-16 sm:h-22 md:h-24 lg:h-28 group-hover:translate-y-2 transition ease-in-out">
                            <a href="/blog/{{$blog->slug}}" class="group-hover:text-dark-blue"><span class="hover:text-white text-xl font-bold sm:text-2xl md:text-3xl lg:text-2xl transition ease">{{$blog->title}}</span></a>
                        </div>
                        <div class="flex justify-between w-auto font-plex items-center group-hover:-translate-y-2 transition ease-in-out">
                            <span class=" text-sm text-left font-plex px-1">
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
                        <div class="flex justify-between w-auto font-plex items-end text-sm group-hover:-translate-y-2 transition ease-in-out">
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
            <div class="flex flex-col w-96 sm:w-full h-full lg:h-70vh gap-1 sm:gap-3 px-3 my-1"> 
                <div class="relative px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 group hover:bg-gray-400 borader bg-MyBlue rounded-xl text-Mygray {{$randomBlog[0]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="absolute top-4 rounded-full h-20 w-20 bg-blue-500 opacity-0 hidden transition ease-in-out duration-300 group-hover:flex justify-center items-center yellow-circle group-hover:opacity-100">
                        <span class="relative text-white font-plex text-3xl font-bold">&lt;;</span>
                    </div>
                    <div class="p-4 flex flex-col">
                        <div class="h-20 sm:h-22 md:h-24 lg:h-32 group-hover:translate-y-2 transition ease-in-out">
                            <a href="/blog/{{$randomBlog[0]->slug}}" class="group-hover:text-dark-blue"><span class="text-xl font-bold sm:text-2xl md:text-3xl lg:text-2xl hover:text-white">{{$randomBlog[0]->title}}</span></a>
                        </div>
                        <span class="text-Mygray text-sm text-left font-plex px-1 group-hover:-translate-y-2 transition ease-in-out">
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
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm group-hover:-translate-y-2 transition ease-in-out">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[0]->category->slug}}">{{$randomBlog[0]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[0]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                <div class="relative px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 group hover:bg-gray-400 borader bg-dark-blue rounded-xl text-Mygray {{$randomBlog[1]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="absolute top-4 rounded-full h-20 w-20 bg-blue-500 opacity-0 hidden transition ease-in-out duration-300 group-hover:flex justify-center items-center yellow-circle group-hover:opacity-100">
                        <span class="relative text-white font-plex text-3xl font-bold">&lt;;</span>
                    </div>
                    <div class="p-4 flex flex-col">
                        <div class="h-20 sm:h-22 md:h-24 lg:h-32 group-hover:translate-y-2 transition ease-in-out">
                            <a href="/blog/{{$randomBlog[1]->slug}}" class="group-hover:text-dark-blue"><span class="font-bold text-xl sm:text-2xl md:text-3xl xl:text-2xl hover:text-white">{{$randomBlog[1]->title}}</span></a>
                        </div>
                        <span class="text-Mygray text-sm text-left font-plex px-1 group-hover:-translate-y-2 transition ease-in-out">
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
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm group-hover:-translate-y-2 transition ease-in-out">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[1]->category->slug}}">{{$randomBlog[1]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[1]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    <div class="relative bg-MyBlue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">
                        <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                        <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[0]->name}}">{{$randomHashtag[0]->name}}</a></h1></div>
                    <div class="relative bg-MyBlue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">
                        <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                        <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[1]->name}}">{{$randomHashtag[1]->name}}</a></h1></div>
                </div>
            </div>
            {{-- End --}}
            {{-- Right --}}
            <div class="flex flex-col w-96 sm:w-full h-full lg:h-70vh gap-1 sm:gap-3 px-3 my-1"> 
                
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-32 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                        <div class="relative bg-MyBlue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">
                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                            <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[2]->name}}">{{$randomHashtag[2]->name}}</a></h1></div>
                        <div class="relative bg-dark-blue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">
                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                            <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[3]->name}}">{{$randomHashtag[3]->name}}</a></h1></div>
                </div>
                <div class="grid gap-2">
                <div class="relative px-1 w-full h-40 sm:h-44 md:h-48 lg:h-52 group hover:bg-gray-400 borader bg-dark-blue rounded-xl text-Mygray {{$randomBlog[2]->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                    <div class="absolute top-4 rounded-full h-20 w-20 bg-blue-500 opacity-0 hidden transition ease-in-out duration-300 group-hover:flex justify-center items-center yellow-circle group-hover:opacity-100">
                        <span class="relative text-white font-plex text-3xl font-bold">&lt;;</span>
                    </div>
                    <div class="p-4 flex flex-col">
                        <div class="h-20 sm:h-22 md:h-24 lg:h-32 group-hover:translate-y-2 transition ease-in-out">
                            <a href="/blog/{{$randomBlog[2]->slug}}" class="group-hover:text-dark-blue"> <span class="font-bold text-xl sm:text-2xl md:text-3xl xl:text-2xl hover:text-white">{{$randomBlog[2]->title}}</span></a>
                        </div>
                        <span class="text-Mygray text-sm text-left font-plex px-1 group-hover:-translate-y-2 transition ease-in-out">
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
                        <div class="flex justify-between w-auto my-2 font-plex items-end text-sm group-hover:-translate-y-2 transition ease-in-out">
                            <p><i class="fas fa-book px-1"></i> <a href="/category/{{$randomBlog[2]->category->slug}}">{{$randomBlog[2]->category->category}}</a></p>
                            <p class="blog-readingTime"><i class="far fa-clock px-1"></i>{{$randomBlog[2]->reading_time}}</p>
                        </div>
                    </div>
                </div>
                </div>
                <div class="px-1 w-full h-14 sm:h-20 md:h-24 lg:h-52 grid grid-cols-2 gap-2 rounded-xl text-Mygray">
                    <div class="relative bg-dark-blue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                    <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[4]->name}}">{{$randomHashtag[4]->name}}</a></h1></div>
                    <div class="relative bg-MyBlue group hover:bg-gray-400 transition ease-in-out rounded-xl flex justify-center items-center">                            <div class="absolute bottom-4 w-16 h-1 rounded-xl bg-gray-100 z-10 opacity-0 hidden group-hover:flex transition ease-in-out duration-300  justify-center items-center group-hover:opacity-100 white-circle"></div>
                    <h1 class="text-lg sm:text-2xl lg:text-3xl group-hover:text-dark-blue group-hover:-translate-y-1 font-plex font-semibold text-center  transition ease-in-out"><a href="/hashtag/{{$randomHashtag[5]->name}}">{{$randomHashtag[5]->name}}</a></h1></div>
                </div>
            </div>     
            {{-- End --}}
        </div>
        @endif
        <div class="flex justify-center items-center text-lg {{fontNameForArabic($locale, 'font-plex','font-playfair')}}  bg-MyBlue sm:mt-4 rounded-lg hover:bg-slate-300">
            <a href="/blogs" class="text-white hover:text-dark-blue hover:underline transition ease-in-out hover:scale-105 px-3 py-1">{{__('View All')}}</a>
        </div>
        
    </div>
   
</div>

{{-- <script src="{{asset('js/arabicNumbers.js')}}"></script> --}}