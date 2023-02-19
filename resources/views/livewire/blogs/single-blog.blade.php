@section('title') - {{$blog->title}}@endsection
<div class="relative container max-h-max w-full flex flex-col items-center">
        <div class="fixed w-full h-14 z-30">
                <x-navbar/>
        </div>
        <div class="relative w-5/6 bg-white max-h-max mt-24 rounded-t-lg flex flex-col justify-center items-center font-plex">
        {{-- Title & Category --}}
                <div class="w-4/6 h-auto md:h-2/6 flex flex-col justify-center items-center pt-14">
                        <a href="/category/{{$blog->category->category}}" target="_blank">
                                <span class="text-blue font-bold text-xl">{{$blog->category->category}}</span>
                        </a>
                        <div class="pt-3">
                                <h1 class="text-4xl md:text-7xl text-center">{{$blog->title}}</h1>
                        </div>
                </div>
        {{-- Image and Creator Info --}}
                <div class="w-4/6 flex flex-col justify-center items-center h-auto md:h-[400px]">
                        <div class="w-full flex justify-center items-center bg-slate-200 order-2 md:order-1 my-3 md:my-1 rounded-lg">
                                <img src="{{URL::asset('/storage/'.$blog->blog_photo)}}" alt="Blog Image" class="object-cover w-full h-64 md:h-80">
                        </div>
                        <div class="flex justify-between w-full items-center pt-4 order-1 md:order-2">
                                <div class="flex justify-center items-center">
                                        <div class="w-10 h-10">
                                                <img class="w-10 h-10 object-cover rounded-full" src="{{URL::asset('/storage/'.$blog->user->profile_photo_path)}}" alt="Creator Image">
                                        </div>
                                        <div class="flex flex-col pl-2 h-10 text-sm w-auto">
                                                <span>{{$blog->user->name}}</span> 
                                                <div class="flex text-gray-400">
                                                        <span>{{$blog->created_at->format('d M Y')}}</span>
                                                        <div>
                                                                <span> - {{$blog->reading_time}}</span>
                                                                <span>قراءة</span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="hidden md:block">
                                        <span>Links</span>
                                </div>
                        </div>
                </div>
                <div class="w-4/6 text-right mt-4">
                        <x-markdown theme="rose-pine-moon">
                                {!! $blog->content !!}
                        </x-markdown>
                
                </div>
        </div>
        {{-- Related Blogs --}}
        <div class="relative w-5/6 bg-white max-h-max mt-24">
                <div class="flex">
                        @foreach ($relatedBlog as $blog)
                            <div>
                                {{$blog->title}}
                            </div>
                        @endforeach
                </div>
        </div>
</div>
