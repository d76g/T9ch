<div class="w-full lg:h-screen font-plex ">
    @foreach ($hashtags as $hashtag)
    <div class="bg-white p-5 rounded-md lg:w-[250px] divide-y-2 gap-y-2 mb-2 h-auto flex flex-col justify-center items-start">
        <div>
            <a href="/hashtag/{{$hashtag->name}}"><p class="text-2xl lg:text-xl hover:text-red font-semibold"><span class="text-MyBlue"># </span>{{$hashtag->name}}</p></a>
            <p class="text-sm py-1">{{$hashtag->description}}</p>
        </div>
        @foreach ($hashtag->blogs as $blog)

        <div class="mb-2 w-full pt-4">    
            <a href="/blog/{{$blog->slug}}" class="hover:text-MyBlue"><p class="text-md md:text-xl lg:text-lg">{{$blog->title}}</p></a>
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
        </div>
        @endforeach
    </div>
    @endforeach
    <div class="w-full h-20">
        <div class="w-full h-20 flex justify-center items-center">
            <a href="/all-hashtags" class="text-MyBlue font-bold text-lg hover:text-red">{{__('View All')}}</a>
        </div>
    </div>
</div>
