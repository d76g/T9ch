<x-guest-layout>
    <nav class="fixed top-0 left-0 right-0 flex w-full h-[10vh] justify-between items-center z-20 bg-dark-blue overflow-hidden">
        <div class="px-4">
            <p class="text-yellow text-3xl font-jomhuria">تقنية</p>
        </div>
        <div class="px-4 flex items-center justify-center text-Mygray">
            <i class="fab fa-instagram px-2"></i>
            <p class="text-xl font-playfair"> t9chnih</p>
        </div>
        <div class="px-4">
            <a href="/login" class="text-Mygray text-2xl font-jomhuria">مرحباً يا <span class="text-yellow">مبرمج</span></a>
        </div>
    </nav>
    <div class="relative min-w-full h-auto overflow-hidden w-screen">
        {{-- Main Content --}}
        <div class="h-50vh lg:h-90vh w-full sm:w-full flex items-center justify-center m-auto bg-dark-blue">
            <div class="lg:w-2/5 flex justify-center items-center text-Mygray font-jomhuria  flex-col">
                <span class="text-7xl">الساحة العامة للبرمجة</span>
                <span class="text-xl font-plex text-yellow">مدونة خاصة - Personal Blog</span>
            </div>
            <div class="code-cover w-3/5 h-70vh rounded-l-xl lg:flex justify-end items-center hidden">
                <div class="relative code-container w-[95%] h-[90%] rounded-l-xl my-8 text-sm flex">
                    <div class="h-4/5 w-1/5 my-8">
                        <span class="flex flex-col pl-8 mt-2 text-yellow font-space w-52">
                            <span class="text-Mygray">"programming" => [</span>
                            <span class="menu-list pl-4 flex flex-col w-1">
                                <a href="">"CSS"</a>
                                <a href="">"JS"</a>
                                <a href="">"PHP"</a>
                                <a href="">"MySQL"</a>
                                <a href="">"Dart"</a>
                            </span>
                            <span class="text-Mygray">],</span>
                        </span>
                        <span class="flex flex-col pl-8 mt-2 text-yellow font-space w-52">
                            <span class="text-Mygray">"Frameworks" => [</span>
                            <span class="menu-list pl-4 flex flex-col w-1">
                                <a href="">"React"</a>
                                <a href="">"Vue"</a>
                                <a href="">"Laravel"</a>
                                <a href="">"Alpine"</a>
                                <a href="">"Flutter"</a>
                            </span>
                            <span class="text-Mygray">],</span>
                        </span>
                        <span class="flex flex-col pl-8 mt-2 text-yellow font-space w-52">
                            <span class="text-Mygray">"Roadmaps" => [</span>
                            <span class="menu-list pl-4 flex flex-col w-1">
                                <a href="">"Frontend"</a>
                                <a href="">"Backend"</a>
                                <a href="">"Mobile"</a>
                            </span>
                            <span class="text-Mygray">],</span>
                        </span>
                    </div>
                    <div class="flex justify-center items-center w-4/5">
                        <img src="{{URL::asset('/image/coding-laravel.svg')}}" alt="coding-laravel" class="max-h-96 min-h-60">
                    </div>
                    
                </div>
            </div>
        </div>
        {{-- Blog --}}
        
            @livewire('blogs.home-content')
           
            
        {{-- Footer --}}
        <x-guest-footer/>
    </div>
</x-guest-layout>
