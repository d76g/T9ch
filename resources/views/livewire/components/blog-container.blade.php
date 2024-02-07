<div class="flex flex-col justify-center items-center mb-1.5">
    <div class="w-full lg:w-11/12 h-56 max-h-56 max-w-3xl rounded-lg {{$bgColor}}">
        <div class="flex flex-col text-right h-28 max-h-28 justify-center {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}} mt-5">
            <a href="/blog/{{$blog->slug}}" class="hover:text-MyBlue px-7 text-ellipsis font-space text-md sm:text-xl">{{$blog->title}}</a>
        </div>
            <div class="flex flex-row justify-start items-center  px-5 mb-2 h-[16px] sm:h-[20px] lg:h-[22px] text-sm sm:text-lg">
                @foreach ($blog->hashtags as $hashtag)
                <a href="/hashtag/{{$hashtag->name}}" class="font-bold py-1 px-2 hover:bg-MyYellow rounded-lg"><span class="text-MyBlue">#</span> {{ $hashtag->name }}</a>
                @endforeach
            </div>
            <div class="flex flex-wrap sm:flex-nowrap justify-center sm:justify-between items-center font-plex px-1 h-16 max-h-16 text-xs pb-2 w-full">
                <span class="text-slate-500 text-left font-plex flex justify-center md:justify-end sm:px-7 w-2/4 sm:w-auto">
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
                <div class="w-2/4 sm:w-auto">
                    <a href="/category/{{$blog->category->slug}}" class="border border-gray-400 px-3 text-center rounded-2xl  py-1 hover:bg-dark-blue hover:text-Mygray">{{$blog->category->category}}</a>
                </div>
                <span class="flex flex-col text-slate-500 sm:pr-5">
                    <span class="{{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                        <i class="far fa-clock px-0.5 "></i>
                        <span>{{$blog->reading_time}}</span>
                        <span>{{$blog->language->language == 'Arabic' ? 'قراءة' : 'reading time'}}</span>
                        
                    </span>
                </span>
            </div>
            
    </div>
    
</div>