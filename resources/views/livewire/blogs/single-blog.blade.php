@section('title'){{$blog->title}}@endsection
<div class="relative h-full  md:w-screen flex flex-col items-center">
        <div class="fixed w-full h-14 z-30">
                <x-navbar/>
        </div>
        <div class="relative sm:w-10/12 w-[95%] lg:w-3/4 bg-white max-h-max mt-24 pb-4 rounded-lg flex flex-col justify-center items-center font-plex">
        {{-- Title & Category --}}
                <div class="w-5/6 lg:w-4/6 h-auto md:h-2/6 flex flex-col justify-center items-center pt-14">
                        <a href="/category/{{$blog->category->slug}}" target="_blank">
                                <span class="text-MyBlue font-bold text-md md:text-xl xl:text-2xl">/ {{$blog->category->category}}</span>
                        </a>
                        <div class="pt-3">
                                <h1 class="text-md md:text-xl xl:text-4xl text-center font-plex">{{$blog->title}}</h1>
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
                        <x-markdown  class="overflow-auto text-sm md:text-md lg:text-lg">
                                {!! $blog->content !!}
                        </x-markdown>
                </div>
        </div>
        {{-- Related Blogs --}}
        <div class="relative sm:10/12 lg:w-3/4 w-11/12 mt-10 md:mt-20 mb-12 bg-white rounded-lg p-3">
                <div class="{{textDirection($locale)}} sm:pb-4 lg:pb-6 xl:pb-10 px-4">
                        <span class="text-md md:text-xl xl:text-2xl font-plex">{{__('More Blogs')}}</span>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 w-full xl:grid-cols-3 md:gap-y-4  lg:gap-y-11  justify-items-center md:justify-around font-mono">
                        @foreach ($relatedBlog as $blog)
                        <a href="/blog/{{$blog->slug}}">
                        <div class="bg-gray-50 group flex flex-col w-[22rem] sm:w-56 md:w-72 lg:w-56 xl:w-72 h-52 md:h-72 rounded-lg drop-shadow-md lg:hover:scale-105 transition ease-in-out  hover:ring-2 ring-dark-blue overflow-clip ring-offset-4 hover:mx-5 lg:hover:-translate-y-6 mb-4 lg:mb-0">
                                <div class="flex items-start h-full lg:group-hover:bg-cyan-400 lg:group-hover:rounded-b-md hover:mb-1">
                                        <span class="font-plex h-full text-sm md:text-lg px-3 py-6 md:py-2 transition ease-in-out delay-200 lg:group-hover:translate-y-4">{{$blog->title}}</span>
                                </div>
                                <div class="bg-slate-100 rounded-t-xl text-sm md:text-md">
                                        <div class="flex justify-center mt-3">
                                                <span class="">{{$blog->category->category}}</span>
                                        </div>
                                        <div class="px-3 flex justify-between text-gray-500 mb-2">
                                                <span>{{$blog->created_at->format('d M Y')}}</span>
                                                <span class="font-plex"> {{$blog->reading_time}}</span>
                                        </div>
                                </div>
                        </div>
                </a>
                        @endforeach
                </div>
        </div>
        <x-guest-footer/>
        <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var codeElements = document.querySelectorAll('pre code'); // Assuming each <code> is inside a <pre>
                    codeElements.forEach(function(codeElement, index) {
                        // Assign a unique ID to each code element
                        var uniqueId = 'codeBlock' + index;
                        codeElement.id = uniqueId;
                
                        // Optional: Create and append a copy button
                        var copyButton = document.createElement('button');
                        copyButton.innerText = 'Copy';
                        copyButton.className = 'copyButton';
                        copyButton.onclick = function() { copyCode(uniqueId); };
                        copyButton.addEventListener('click', function() {
                            copyButton.innerText = 'Copied!';
                            setTimeout(function() {
                                copyButton.innerText = 'Copy';
                            }, 1000);
                        });
                        // Assuming each <code> tag is wrapped in a <pre>, insert the button before the <pre>
                        codeElement.parentNode.style.position = 'relative';
                        codeElement.parentNode.insertBefore(copyButton, codeElement);
                    });
                });
                
                function copyCode(elementId) {
                    var text = document.getElementById(elementId).innerText;
                    navigator.clipboard.writeText(text).then(function() {
                    }, function(err) {
                        console.error('Could not copy text:', err);
                    });
                }
                </script>
                
</div>