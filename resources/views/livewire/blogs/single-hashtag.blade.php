@php
    $locale = app()->getLocale();    
@endphp
@section('title'){{$hashtag->name.' Tag'}}@endsection
<div class="h-full w-screen lg:pb-6 flex flex-col justify-center items-center">
<div class="relative w-full h-14">
    <x-navbar/>
</div>
<div class="w-full flex flex-col lg:flex-row">
    
    {{-- blog list container --}}

    <div class="flex flex-col items-center w-full h-auto mt-5 px-8 lg:px-10 ">
        <div class="bg-white w-full max-w-6xl h-30 mt-10 rounded-md">
            <div class="flex flex-col px-4 py-5 gap-y-2">
                <span class="text-xl font-bold text-dark-blue"># {{$hashtag->name}}</span>
                <span class="font-plex text-slate-500 text-sm">{{$hashtag->description}}</span>
            </div>
        </div>
        {{-- Search Bar --}}
        <div class="flex items-center justify-center w-full my-3 md:h-20">
            <livewire:components.search-bar :search="$search" :pageName="$pageName" />
        </div>
        {{-- Blog List --}}
        <div class="h-full my-5 w-full">

        {{-- Blog List --}}
        @if(sizeof($blogs) == 0)
            @if ($search != '')
                <div class="w-full h-full flex flex-col justify-center items-center">
                    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
                    <p class="text-3xl md:text-5xl lg:text-4xl xl:text-5xl font-plex text-slate-300 ">No blogs matched</p>
                    <p class="text-lg xl:text-2xl font-plex text-slate-600 mt-2">" {{$search}} " </p>

                </div>
            @else
            <div class="w-full h-full flex flex-col justify-center items-center">
                <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
                <p class="text-3xl md:text-5xl lg:text-4xl xl:text-5xl font-plex text-slate-300 ">No blogs listed</p>
            </div>
            @endif
            
        @else 
            {{-- Filters --}}
            <div class=" {{ textDirection($locale) }} h-10 xl:h-16 w-full lg:w-11/12 max-w-6xl xl:mt-5 xl:ml-20 flex justify-start items-center font-plex">
                <div class="px-1 text-lg md:text-2xl xl:text-3xl text-dark-blue">
                    <span>{{$search == '' ? __('Latest Blogs') : __('Search Results').$search}}</span>
                </div>
                @if (sizeof($blogs) > 1 && $search == '')
                <div class="mx-4 flex justify-start gap-3 xl:gap-5 h-full pb-2 xl:w-2/4 items-end xl:px-5 text-sm md:text-md lg:text-lg text-slate-400">
                    <button wire:click="filterToLatest" class="hover:text-slate-500 hover:scale-105 transform ease-in-out duration-150 hover:-translate-y-1 hover:cursor-pointer">
                        <span>{{__('Latest Blogs')}}</span>
                    </button>
                    <button wire:click.prevent="$emit('filterToOldest')" class="hover:text-slate-500 hover:scale-110 transform ease-in-out duration-150 hover:-translate-y-1 hover:cursor-pointer">
                        <span >{{__('Oldest')}}</span>
                    </button>
                    
                </div>
                @endif
            </div>
        <div>
            @foreach ($blogs as $blog)
                <livewire:components.blog-container :blog="$blog" :key="$blog->id" :bgColor="'bg-white'"/>
            @endforeach 
        </div>
        <div class="h-auto my-3 lg:mt-5 w-full">
            <div class="md:px-32 lg:px-8 xl:px-24">
                {{ $blogs->links() }}
            </div>
        </div>
        @endif
        </div>
    </div>
    
    {{-- Hashtag List container --}}
    <div class="w-full lg:w-1/3 lg:h-fit flex flex-col lg:pr-8 items-center mb-10">
        {{-- Category List --}}
        <div class="lg:mt-40">
            <div class="w-full h-8 flex items-center mb-1 md:mb-3">
                <p class="text-lg md:text-xl lg:text-2xl text-dark-blue font-plex">{{__('More Hashtags')}}</p>
            </div>
        
        <div class="h-auto grid grid-cols-2 md:grid-cols-3  grid-rows-auto bg-white gap-1 rounded-md p-2 md:p-3 drop-shadow-sm mb-10">
            @if ($relatedHashtags->count() > 0)
            @foreach ($relatedHashtags as $item)
            @php
                $colorClasses = [
                    'bg-MyYellow','bg-indigo-300', 'bg-purple-500','bg-emerald-400','bg-cyan-500','bg-fuchsia-500'
                ];
                $colorClass = $colorClasses[$loop->index % count($colorClasses)];
            @endphp
                <a href="/hashtag/{{$item->name}}" class="{{$colorClass}} p-2 rounded-lg text-white flex justify-center items-center text-center hover:scale-105 transition ease-in-out">
                    <p class="text-sm font-bold">{{$item->name}}</p>
                </a>
            @endforeach
            @else
                <p class="w-72 flex justify-center text-sm font-bold text-gray-300">{{__(
                    'No Hashtags Listed'
                )}}</p>
            @endif
        </div>
            
        
          
        </div>
    </div>
</div>
</div>