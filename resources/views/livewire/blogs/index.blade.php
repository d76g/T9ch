<div>
<div class="relative w-full h-14">
    <x-navbar/>
</div>
@if(sizeof($blogs) == 0 && $search == '')
<div class="w-full h-full flex flex-col justify-center items-center">
    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
    <p class="text-5xl font-plex text-slate-300 ">No blogs found</p>
</div>
@else 
<div class="flex w-full h-auto static bg-white">
    <div class="w-80 flex justify-center items-center pl-20">
        <div class=" flex justify-center items-center">
            @livewire('components.cate-list')
        </div>
    </div>
    <div class="w-3/5 h-auto pt-8">
        <div class="w-full h-20 font-jomhuria text-center pr-8 my-2">
           <h1 class="hover:text-blue w-auto text-4xl md:text-7xl">مُــــــدونــــــات</h1>
        </div>
        <div class="flex justify-center items-center mb-5">
            <livewire:components.search-bar :search="$search" :pageName="$pageName" />
        </div>
        <div>
        @if(sizeof($blogs) == 0 && $search != '')
            <div class="w-full h-full flex flex-col justify-center items-center mt-36">
                <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
                <p class="text-5xl font-plex text-slate-300 ">No blogs matched</p>
            </div>
        @else 
        @foreach ($blogs as $blog)
        <div class="flex flex-col justify-center items-center mb-1.5">
           <div class="w-4/5 h-auto sm:h-48 max-h-48 max-w-7xl rounded-lg bg-Mygray">
            <div class="flex flex-col text-right h-24 max-h-28 justify-center {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}} mt-5">
                <a href="/blog/{{$blog->slug}}" class="hover:text-blue px-7 lg:text-4xl font-jomhuria text-xl">{{$blog->title}}</a>
            </div>
                <div class="flex flex-row justify-start items-center px-5 h-[20px] text-sm">
                    @foreach ($blog->hashtags as $hashtag)
                    <a href="/hashtag/{{$hashtag->name}}" class=" font-bold py-1 px-2 hover:bg-yellow rounded-lg"><span class="text-blue">#</span> {{ $hashtag->name }}</a>
                    @endforeach
                </div>
                <div class="flex justify-between items-center font-plex px-1 h-16 max-h-16 text-xs pb-2">
                    <span class="text-slate-500 text-sm text-left font-plex flex justify-end px-7">
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
                    <div>
                        <a href="/category/{{$blog->category->slug}}" class="border border-gray-400 px-3 text-center rounded-2xl py-1 hover:bg-dark-blue hover:text-Mygray">{{$blog->category->category}}</a>
                    </div>
                    <span class="flex flex-col text-slate-500 pr-5">
                        <span class="{{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                            <i class="far fa-clock px-0.5 "></i>
                            <span>{{$blog->reading_time}}</span>
                            <span>{{$blog->language->language == 'Arabic' ? 'قراءة' : 'reading time'}}</span>
                            
                        </span>
                    </span>
                </div>
                
           </div>
           
        </div>
        @endforeach 
        @endif
        <div class="h-auto mt-5 w-auto">
            <div class="px-32">
                {{ $blogs->links() }}
        </div>
        </div>
    </div>

    </div>
    <div class="w-80 flex justify-center items-center">
        <div class=" flex justify-center items-center">
            @livewire('components.related-blogs')
        </div>
    </div>
</div>
@endif
</div>