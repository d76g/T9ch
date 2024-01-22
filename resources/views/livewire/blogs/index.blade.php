@section('title'){{'Blogs'}}@endsection
<div  class="h-full w-screen lg:pb-6 flex flex-col justify-center items-center bg-white">
<div class="relative w-screen h-14">
    <x-navbar/>
</div>
<div class="relative w-full h-20 font-jomhuria text-center mt-10">
    <h1 class="hover:text-blue w-auto text-5xl md:text-7xl">مُــــــدونــــــات</h1>
 </div>
 <div class="flex justify-center items-center w-full">
    <livewire:components.search-bar :search="$search" :pageName="$pageName" />
</div>
@if(sizeof($blogs) == 0 && $search == '')
<div class="w-full h-full flex flex-col justify-center items-center">
    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
    <p class="text-5xl font-plex text-slate-300 ">No blogs found</p>
</div>
@else 
<div class="flex flex-col lg:flex-row w-full h-auto mt-5 px-8 lg:px-10">
    {{-- Row 1 --}}
    <div class="">
        <div class="flex flex-col">
            <h2 class="font-plex text-md">Categories</h2>
            @livewire('components.cate-list')
        </div>
    </div>
    {{-- Row 2 --}}
    <div  class="w-full order-first lg:order-none">
        
        <div>
            @if(sizeof($blogs) == 0 && $search != '')
                <div class="w-full h-full flex flex-col justify-center items-center mt-36">
                    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-40 my-10 lg:w-72 xl:w-auto">
                    <p class="md:text-5xl lg:text-4xl xl:text-5xl font-plex text-slate-300 ">No blogs matched with</p>
                    <p class="text-lg xl:text-2xl font-plex text-slate-600 mt-2">" {{$search}} " </p>
                </div>
            @else
            <div class="lg:pl-5 lg:w-11/12 max-w-3xl">
                <h2 class="lg:w-11/12 font-plex">Recent Blogs {{$blogs->count()}}</h2>
            </div>
            @foreach ($blogs as $blog)
            <div class="flex flex-col justify-center items-center mb-1.5">
            <div class="w-full lg:w-11/12 h-56 max-h-56 max-w-3xl rounded-lg bg-Mygray">
                <div class="flex flex-col text-right h-28 max-h-28 justify-center {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}} mt-5">
                    <a href="/blog/{{$blog->slug}}" class="hover:text-blue px-7 text-ellipsis font-space text-md sm:text-xl lg:text-2xl">{{$blog->title}}</a>
                </div>
                    <div class="flex flex-row justify-start items-center  px-5 mb-2 h-[16px] sm:h-[20px] lg:h-[22px] text-sm sm:text-lg">
                        @foreach ($blog->hashtags as $hashtag)
                        <a href="/hashtag/{{$hashtag->name}}" class="font-bold py-1 px-2 hover:bg-yellow rounded-lg"><span class="text-blue">#</span> {{ $hashtag->name }}</a>
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
            @endforeach 
            @endif
            {{-- <div class="h-auto my-3 lg:mt-5 w-full">
                <div class="md:px-32 lg:px-8 xl:px-24">
                    {{ $blogs->links() }}
            </div>
            </div> --}}
        </div>
    </div>
    {{-- Row 3 --}}
    <div>
        <div class="flex flex-col">
            <h2 class="font-plex" >Hashtags</h2>
            @livewire('components.related-blogs')
        </div>
    </div>
</div>
@endif
    <button wire:click="$emit('loadMore')" x-show="!loading">Load More</button>
</div>