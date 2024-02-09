<div class="w-full lg:h-screen font-plex">
    @foreach ($categories as $category)
    <div class="bg-white p-5 rounded-md w-full lg:w-[250px] h-auto flex flex-col justify-center items-start divide-y-2 gap-y-2 mb-2">
        <div>
            <a href="/category/{{$category->slug}}"> <p class="text-2xl lg:text-xl hover:text-red font-semibold"><span class="text-MyBlue font-bold">/</span> {{$category->category}}</p></a>
            <p class="text-sm py-1">{{$category->desc}}</p>
        </div>
        {{-- <hr class="w-64 sm:w-11/12 h-1"> --}}
        @foreach ($category->blogs as $blog)
        <div class="mb-2 w-full pt-4">    
            <a href="/blog/{{$blog->slug}}" class="hover:text-MyBlue"><p class="text-md md:text-xl lg:text-lg {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">{{$blog->title}}</p></a>
            <p class="text-sm font-bold text-zinc-400">
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
            </p>
            {{-- <hr class="w-64 sm:w-11/12 h-1"> --}}
        </div>
        @endforeach
    </div>
    @endforeach
</div>
