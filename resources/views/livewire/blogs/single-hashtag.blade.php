<div>
<div class="relative w-full h-14">
    <x-navbar/>
</div>
<div class="w-full h-screen flex">
    
    {{-- blog list container --}}

    <div class="w-3/4 h-full flex flex-col items-center">
        <div class="bg-white w-full max-w-6xl h-30 mt-10 rounded-md">
            <div class="flex flex-col px-4 py-5 gap-y-2">
                <span class="text-3xl font-bold text-dark-blue"># {{$hashtag->name}}</span>
                <span class="font-plex text-slate-500">{{$hashtag->description}}</span>
            </div>
        </div>
        {{-- Search Bar --}}
        <livewire:components.search-bar :search="$search" :pageName="$pageName" />
        {{-- Blog List --}}
        <div class="h-full my-5 w-full">

        {{-- Blog List --}}
        @if(sizeof($blogs) == 0)
            @if ($search != '')
                <div class="w-full h-full flex flex-col justify-center items-center">
                    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
                    <p class="text-5xl font-plex text-slate-300 ">No blogs matched</p>
                </div>
            @else
            <div class="w-full h-full flex flex-col justify-center items-center">
                <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
                <p class="text-5xl font-plex text-slate-300 ">No blogs listed</p>
            </div>
            @endif
            
        @else 
            {{-- Filters --}}
            <div class="h-16 w-full max-w-6xl mt-5 ml-20 flex justify-start items-center font-plex">
                <div class="px-1 text-3xl text-dark-blue">
                    <span>{{$search == '' ? 'Latest Blogs' : 'Search Results'}}</span>
                </div>
                @if (sizeof($blogs) > 1 && $search == '')
                <div class="mx-4 flex justify-start gap-5 h-full pb-2 w-2/4 items-end px-5 text-md text-slate-400">
                    <button wire:click="filterToLatest" class="hover:text-slate-500 hover:scale-105 transform ease-in-out duration-150 hover:-translate-y-1 hover:cursor-pointer">
                        <span>Most Recent</span>
                    </button>
                    <button wire:click.prevent="$emit('filterToOldest')" class="hover:text-slate-500 hover:scale-110 transform ease-in-out duration-150 hover:-translate-y-1 hover:cursor-pointer">
                        <span >Oldest</span>
                    </button>
                    
                </div>
                @endif
            </div>
        <div>
            @foreach ($blogs as $blog)
            <div class="flex flex-col justify-center items-center mb-1.5">
            <div class="w-full h-auto sm:h-48 max-h-48 max-w-6xl rounded-lg bg-white">
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
        <div class="w-full h-auto mt-5">
            <div class="px-24">
                {{ $blogs->links() }}
            </div>
        </div>
        </div>
        
        @endif
        </div>
    </div>
    
    {{-- Hashtag List container --}}
    <div class="w-1/4 h-fit flex flex-col pr-8 items-center">
        {{-- Hashtag List --}}
        <div class="w-11/12 mt-40">
            <div class="w-full h-8 flex items-center mb-3">
                <p class="text-3xl font-bold text-dark-blue"># Other Hashtags</p>
            </div>
        <div class="h-auto grid grid-cols-3 grid-rows-auto bg-white gap-1 rounded-md p-3 drop-shadow-sm">
            
            @foreach ($relatedHashtags as $item)
            @php
                $colorClasses = [
                    'bg-yellow','bg-indigo-300', 'bg-purple-500','bg-emerald-400','bg-cyan-500','bg-fuchsia-500'
                ];
                $colorClass = $colorClasses[$loop->index % count($colorClasses)];
            @endphp
                <a href="/hashtag/{{$item->name}}" class="{{$colorClass}} p-2 rounded-lg text-white flex justify-center items-center text-center hover:scale-105 transition ease-in-out">
                    <p class="text-sm font-bold">{{$item->name}}</p>
                </a>
            @endforeach
        </div>
        </div>
        {{-- <div class="w-full h-96 bg-orange-600 mt-32">

        </div> --}}
    </div>
</div>
</div>