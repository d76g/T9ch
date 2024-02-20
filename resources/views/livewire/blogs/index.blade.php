@section('title'){{'Home'}}@endsection
<div  class="relative h-full max-h-max w-screen lg:pb-6 flex flex-col justify-center items-center">
<div class="relative w-screen h-14">
    <x-navbar/>
</div>
<div class="w-full xl:w-11/12 flex flex-col items-center rounded-b-2xl">
<div class="relative w-full h-20 font-jomhuria text-center mt-10">
    <h1 class="hover:text-MyBlue w-auto text-5xl md:text-7xl">{{__('Blogs')}}</h1>
 </div>
 <div class="flex justify-center items-center w-full">
    <livewire:components.search-bar :search="$search" :pageName="$pageName" />
</div>
@if(sizeof($blogs) == 0 && $search == '')
<div class="w-full h-full flex flex-col justify-center items-center">
    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-60 my-10">
    <p class="text-5xl font-plex text-slate-300 ">{{__('No results found')}}</p>
</div>
@else 
<div class="flex flex-col lg:flex-row w-full 2xl:w-2/5 h-auto mt-5 px-8 lg:px-10">
    {{-- Row 1 --}}
    @if ($search == '')
        <div class="hidden lg:block">
            <div class="flex flex-col">
                <h2 class="font-plex text-md">{{__('Categories')}}</h2>
                @livewire('components.cate-list')
            </div>
        </div>
        
    @endif
    {{-- Row 2 --}}
    <div class=" w-full order-first lg:order-none">
        
        <div>
            @if(sizeof($blogs) == 0 && $search != '')
                <div class="w-full h-full flex flex-col justify-center items-center mt-36">
                    <img src="{{URL::asset('/image/empty.svg')}}" alt="empty-box" class="max-h-96 min-h-40 my-10 lg:w-72 xl:w-auto">
                    <p class="md:text-5xl lg:text-4xl xl:text-5xl font-plex text-slate-300 ">{{__('No blogs matched')}}</p>
                    <p class="text-lg xl:text-2xl font-plex text-slate-600 mt-2">" {{$search}} " </p>
                </div>
            @else
            <div class="lg:pl-5 lg:w-11/12 max-w-3xl">
                <h2 class="lg:w-11/12 font-plex">{{__('Blogs')}} ({{$blogs->count()}})</h2>
            </div>
            @foreach ($blogs as $blog)
                <livewire:components.blog-container :blog="$blog" :key="$blog->id" :bgColor="'bg-white'"/>
            @endforeach 
            @endif
        </div>
    </div>
    {{-- Row 3 --}}
    @if ($search == '')
        <div class="hidden lg:block">
            <div class="flex flex-col">
                <h2 class="font-plex">{{__('Hashtags')}}</h2>
                @livewire('components.related-blogs')
            </div>
        </div>
        
    @endif
</div>

@endif
    @if ($moreBlogsAvailable && $search == '')
         <div x-data="{ loading: false }" 
            x-on:scroll.window="if(window.innerHeight + window.scrollY >= document.body.offsetHeight) { loading = true; $wire.emit('loadMore'); }" 
            x-show="loading"
            class="bg-Mygray px-2 py-1 text-sm font-plex mt-3 mb-5 rounded-md flex">
            {{__('Loading more posts...')}}
        </div>
    @else
    @if (sizeof($blogs) >= 11)
    <div 
        x-init="blogsLoaded()" x-transition
        id="blogsLoaded" class="bg-white px-2 py-1 text-sm font-plex mt-3 mb-5 rounded-md flex">
        <x-eos-check-circle class="w-4 h-4 mr-2 text-MyBlue"/>
        {{__('All blogs have been loaded.')}}
    </div>

    @endif
    @endif
    <div
    class="fixed bottom-0 right-2 mb-4 "
     x-data="{ scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 200; })">
    <button x-show="scrolled" @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            style="display: none;" 
             class="mr-4 z-10 bg-dark-blue px-4 py-2 rounded-full shadow-md transition text-white font-space hover:bg-cyan-800" >
            <x-eos-arrow-upward class="text-white w-5 h-5 hover:-translate-y-1 ease-in-out"/>
    </button>
    </div>
</div>
<script>
    function blogsLoaded() {
        const blogsLoaded = document.getElementById('blogsLoaded');
        if (blogsLoaded) {
            setTimeout(() => {
                blogsLoaded.classList.add('fade-out');
            }, 3000);
            setTimeout(() => {
                blogsLoaded.classList.add('opacity-0');
            }, 5000);
        }
    }    
</script>
</div>
