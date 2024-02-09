@php
    $locale = app()->getLocale();
@endphp
@section('title', 'All Categories')
<div class="h-full w-screen flex flex-col">
    <div class="relative w-full h-18">
        <x-navbar/>
    </div>
    <div class="w-full h-[521px] max-h-full flex flex-col justify-center items-center bg-dark-blue">
        <div class="my-3 flex flex-col justify-center items-center">
            <h1 class="text-MyYellow text-3xl sm:text-4xl font-semibold font-plex">{{__('All Categories')}}</h1>
            <p class="text-Mygray font-plex text-xs sm:text-sm w-60 sm:w-3/4 lg:w-full text-center mt-2">{{__('All Categories text')}}</p>
        </div>
        <div class="relative grid grid-cols-3 sm:grid-cols-4 lg:grid-cols-5 grid-rows-4 w-4/6 lg:w-[90%] gap-y-3 gap-x-2 my-3 font-plex">
            @foreach ($allCategories as $tag)
                <a href="/category/{{$tag->slug}}">
                    <div class="w-20 sm:w-28 lg:w-44 xl:w-52 h-20 rounded-lg bg-Mygray flex flex-col justify-center items-center text-dark-blue relative group hover:bg-gray-300 transition ease-in-out">
                        <h1 class="text-sm lg:text-lg sm:text-xl group-hover:text-dark-blue group-hover:-translate-y-0.5 font-semibold text-center transition ease-in-out font-plex">{{$tag->category}}</h1>
                        <p class="text-sm group-hover:translate-y-0.5 transition ease-in-out">{{$tag->blogs_count}} {{__('Nav Blogs')}}</p>
                    </div>
                </a>
            @endforeach
            
        </div>
    </div>
    <section>
        <x-guest-footer/>
    </section>
</div>