<div class="flex flex-col justify-center items-center font-plex">
    <h1 class="py-3 text-5xl">قائمة المواضيع</h1>
    <div class="w-28 h-0.5 rounded-full bg-gray-400 my-2"></div>
    <div class="grid grid-cols-3 gap-2 bg-dark-blue p-2 rounded-lg mx-3">
        @foreach ($cateList as $item)
            <a href="category/{{$item->category}}" class="border-2 border-gray-300 bg-Mygray text-dark-blue rounded-xl text-center text-sm px-2 py-1 hover:bg-gray-300 hover:text-dark-blue translate hover:translate-y-0.5">{{$item->category}}</a>
        @endforeach
    </div>
</div>
