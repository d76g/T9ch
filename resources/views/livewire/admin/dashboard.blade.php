@section('title', 'Dashboard')
<div class="w-full h-screen sm:h-full flex flex-col font-plex">
   <div class="w-full h-screen flex flex-col p-6">
        <div>
            <h2 class="text-gray-600">Dashboard</h2>
        </div>
        <div class="w-full h-2/5">
            <div class="bg-white w-full h-full flex gap-3 justify-center items-center rounded-md">
                <div class="bg-yellow-200 h-32 w-40 rounded-lg px-3 py-1">
                    <div class="flex flex-col  items-center">
                        <span class="text-4xl text-gray-700">{{$totalBlogs}}</span>
                        <span class="text-gray-500 text-sm">Total Blogs</span>
                    </div>
                    <div class="flex text-gray-600 justify-center gap-1 items-center p-1">
                        <span class="text-sm">{{$blogsThisMonth}}</span>
                        <span class="text-sm">this month</span>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/blogs" class="hover:text-gray-800 text-sm text-gray-400"><span>View Blogs</span></a>
                    </div>
                </div>
                <div class="bg-yellow-200 h-32 w-40 rounded-lg px-3 py-1">
                    <div class="flex flex-col  items-center">
                        <span class="text-4xl text-gray-700">{{$totalCategories}}</span>
                        <span class="text-gray-500 text-sm">Total Categories</span>
                    </div>
                    <div class="flex text-gray-600 justify-center gap-1 items-center p-1">
                        <span class="text-sm">
                            @if ($categoriesWithBlogs == $totalCategories)
                                All
                            @else
                                {{$categoriesWithBlogs}}
                            @endif
                        </span>
                        <span class="text-sm">has blogs</span>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/category" class="hover:text-gray-800 text-sm text-gray-400"><span>View Category</span></a>
                    </div>
                </div>
                <div class="bg-yellow-200 h-32 w-40 rounded-lg px-3 py-1">
                    <div class="flex flex-col  items-center">
                        <span class="text-4xl text-gray-700">{{$totalHashtags}}</span>
                        <span class="text-gray-500 text-sm">Total Hashtags</span>
                    </div>
                    <div class="flex text-gray-600 justify-center gap-1 items-center p-1">
                        <span class="text-sm">
                            @if ($hashtagsWithBlogs == $totalHashtags)
                                All
                            @else
                                {{$hashtagsWithBlogs}}
                            @endif
                        </span>
                        <span class="text-sm">has blogs</span>
                    </div>
                    <div class="flex justify-center">
                        <a href="/admin/category" class="hover:text-gray-800 text-sm text-gray-400"><span>View Hashtags</span></a>
                    </div>
                </div>
                
            </div>
        </div>
        <div></div>
   </div>
</div>
