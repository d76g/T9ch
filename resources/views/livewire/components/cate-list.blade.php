<div class="w-full h-screen mt-20 font-plex">
    @foreach ($categories as $category)
    <div class="bg-Mygray p-5 rounded-md w-[350px] m-3 h-auto flex flex-col justify-center items-start">
        <div>
            <a href="/category/{{$category->slug}}"> <p class="text-2xl hover:text-red">{{$category->category}}</p></a>
            <p class="text-sm py-1">{{$category->desc}}</p>
        </div>
        <hr class="w-[320px] h-1">
        @foreach ($category->blogs as $blog)

        <div class="my-2">    
            <a href="/blog/{{$blog->slug}}" class="hover:text-blue"><p class="text-xl {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">{{$blog->title}}</p></a>
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
            <hr class="w-[320px] h-1">
        </div>
        @endforeach
    </div>
    @endforeach
</div>
