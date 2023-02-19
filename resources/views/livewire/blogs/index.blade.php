<div class="relative w-full h-14">
    <x-navbar/>
</div>
<div class="flex w-full h-screen static bg-white">
    <div class="w-1/5 h-80 flex justify-center items-center">
        <div class="fixed h-80 flex justify-center items-center ">
            @livewire('components.cate-list')
        </div>
    </div>
    <div class="w-3/5 h-auto pt-8">
        <div class="w-full h-20 font-jomhuria text-center pr-8 my-4">
           <h1 class="hover:text-blue w-auto text-4xl md:text-7xl">مُــــــدونــــــات</h1>
        </div>
        @foreach ($blogs as $blog)
        <div class="flex flex-col justify-center items-center mb-3">
           <div class="w-4/5 h-52 lg:max-h-52 rounded-lg bg-Mygray">
                <div class="flex flex-col text-right px-3 h-3/5">
                    <a href="/blog/{{$blog->slug}}" class="px-4 text-5xl font-jomhuria pt-4">{{$blog->title}}</a>
                    <p class="font-plex text-slate-500 px-2">{{Str::limit($blog->content, 200) }}</p>
                </div>
                <div class="flex justify-between items-center font-plex px-4 h-1/4 text-sm">
                    <div>
                        <a href="/category/{{$blog->category->category}}" class="border border-gray-400 px-3 text-center rounded-2xl my-2 py-1 hover:bg-dark-blue hover:text-Mygray">{{$blog->category->category}}</a>
                    </div>
                    <span class="flex flex-col text-slate-500">
                        <span>
                            <span>{{$blog->reading_time}}</span>
                            <span>قراءة</span>
                            <i class="far fa-clock px-0.5 "></i>
                        </span>
                    </span>
                </div>
                <span class="text-slate-500 h-4 text-sm text-right font-plex flex justify-end px-5">{{$blog->created_at->format('d/m/Y')}}</span>
           </div>
        </div>
        @endforeach
    </div>
    <div class="w-1/5 h-screen flex justify-center items-center ">
        <div class=" flex h-4/6 justify-center items-center px-8">
            @livewire('components.related-blogs')
        </div>
    </div>
</div>
