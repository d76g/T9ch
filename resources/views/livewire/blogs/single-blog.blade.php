@section('title'){{$blog->title}}@endsection
<div class="relative h-full  md:w-screen flex flex-col items-center">
        <div class="fixed w-full h-14 z-30">
                <x-navbar/>
        </div>
        <div class="relative sm:w-10/12 w-4/5 lg:w-3/5 bg-white max-h-max mt-24 pb-4 rounded-t-lg flex flex-col justify-center items-center font-plex">
        {{-- Title & Category --}}
                <div class="w-5/6 lg:w-4/6 h-auto md:h-2/6 flex flex-col justify-center items-center pt-14">
                        <a href="/category/{{$blog->category->slug}}" target="_blank">
                                <span class="text-MyBlue font-bold text-md md:text-xl xl:text-2xl">/ {{$blog->category->category}}</span>
                        </a>
                        <div class="pt-3">
                                <h1 class="text-md md:text-xl lg:text-2xl text-center font-space">{{$blog->title}}</h1>
                        </div>
                        <div class="w-full flex flex-row justify-center xl:mt-2">
                                @foreach ($blog->hashtags as $hashtag)
                                <a href="/hashtag/{{$hashtag->name}}" class="font-bold text-sm lg:text-lg py-1 px-2 hover:bg-MyYellow rounded-lg"><span class="text-MyBlue">#</span> {{ $hashtag->name }}</a>
                                @endforeach
                        </div>
                </div>
        {{-- Image and Creator Info --}}
                <div class="w-5/6 lg:w-4/6 flex flex-col justify-center items-center h-auto" :class="{'h-[400px]': $blog->blog_photo !== null}">
                        @if ($blog->blog_photo !== null )
                        <div class="w-full flex justify-center items-center bg-slate-200 order-2 md:order-1 my-3 md:my-1 rounded-lg">
                                <img src="{{URL::asset('/storage/'.$blog->blog_photo)}}" alt="Blog Image" class="object-cover w-full h-64 md:h-80">
                        </div>  
                        @endif
                        
                        <div class="flex justify-between w-full items-center mt-4 order-1 md:order-2">
                                <div class="flex justify-center items-center">
                                        @if ($blog->user->profile_photo_path !== null)
                                        <div class="w-10 h-10">
                                                <img class="w-10 h-10 object-cover rounded-full" src="{{URL::asset('/storage/'.$blog->user->profile_photo_path)}}" alt="Creator Image">
                                        </div>
                                        @endif
                                        <div class="flex flex-col pl-2 h-10 text-sm w-auto">
                                                <span>{{$blog->user->name}}</span> 
                                                <div class="flex text-gray-400">
                                                        <span>{{$blog->created_at->format('d M Y')}}</span>
                                                        <span class="px-1">-</span>
                                                        <div class="{{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}}">
                                                                <span>  {{$blog->reading_time}}</span>
                                                                <span>{{$blog->language->language == 'Arabic' ? 'قراءة' : 'Reading time'}}</span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                                <div class="hidden md:block">
                                        <span>Links</span>
                                </div>
                        </div>
                </div>
                <div class="w-4/5 sm:prose sm:max-w-none sm:prose-lg md:prose-lg mt-4 {{$blog->language->language == 'Arabic' ? 'rtl' : 'ltr'}} ">
                        <x-markdown theme="dracula" class="overflow-auto text-sm md:text-md lg:text-lg">
                                {!! $blog->content !!}
                        </x-markdown>
                </div>
        </div>
        {{-- Related Blogs --}}
        <div class="relative sm:10/12 lg:w-11/12 w-11/12 mt-10 md:mt-20 mb-12">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 w-full justify-items-center md:justify-around font-mono">
                        @foreach ($relatedBlog as $blog)
                        <a href="/blog/{{$blog->slug}}">
                        <div class="bg-white flex flex-col w-72 sm:w-56 md:w-72 lg:w-56 xl:w-72 h-52 md:h-72 rounded-lg drop-shadow-md hover:scale-105 transition ease-in-out  hover:ring-2 ring-dark-blue overflow-clip ring-offset-4 hover:mx-5 hover:-translate-y-6 mb-4 lg:mb-0">
                                <div class="flex items-start h-full hover:bg-cyan-400 hover:rounded-b-md hover:mb-1">
                                        <span  class="h-full text-smx md:text-lg font-semibold px-3 py-6 md:py-2 transition ease-in-out delay-200 hover:translate-y-4">{{$blog->title}}</span>
                                </div>
                                <div class="bg-slate-100 rounded-t-xl">
                                        <div class="flex justify-center mt-3">
                                                <span class="text-sm md:text-lg">{{$blog->category->category}}</span>
                                        </div>
                                        <div class="px-3 flex justify-between text-gray-500 mb-2 text-sm md:text-lg">
                                                <span>{{$blog->created_at->format('d M Y')}}</span>
                                                <span> {{$blog->reading_time}}</span>
                                        </div>
                                </div>
                        </div>
                </a>
                        @endforeach
                </div>
        </div>
        <x-guest-footer/>
</div>

