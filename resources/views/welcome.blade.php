@php
    $locale = session()->get('locale');
@endphp
<x-guest-layout>
    <nav class="fixed top-0 left-0 right-0 flex w-full h-[10vh] justify-between items-center z-50 bg-homeDarkContainer overflow-hidden">
        <div class="px-4">
            <p class="text-MyYellow text-lg sm:text-2xl {{fontNameForArabic($locale, 'font-plex', 'font-playfair')}}">{{__('t9chnih')}}</p>
        </div>
        <div class="px-4 sm:flex items-center justify-center text-Mygray hidden">
            <i class="fab fa-instagram px-2"></i>
            <p class="text-lg sm:text-xl font-playfair">t9dev</p>
        </div>
        <div class="px-4 flex gap-4">
            <a href="/login" class="text-Mygray text-lg sm:text-2xl {{fontNameForArabic($locale, 'font-plex', 'font-playfair')}}">{{__('Welcome')}}</span></a>       
        </div>
        @livewire('helpers.localization-switcher', ['class' => 'absolute left-1/2 transform -translate-x-1/2 sm:-translate-x-1/4  md:-translate-x-0 top-8 sm:right-0 sm:left-0 md:right-32'])
    </nav>
    <div class="relative min-w-full h-auto overflow-hidden w-screen">
        {{-- Main Content --}}
        <section id="header-content">

        <div class="relative bg-homeDarkContainer w-full h-70vh sm:h-screen flex justify-center items-center">
            <div class="relative w-5/6 h-50vh sm:h-80vh bg-homeImageContainer flex rounded-lg flex-col drop-shadow-2xl">
                <div class="flex h-10 w-full justify-start items-center pl-5 pt-2">
                    <div class="flex gap-2 justify-start w-96">
                        <div class="w-3 h-3 rounded-full bg-red"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-300"></div>
                        <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    </div>
                    <div class="absolute left-1/2 transform -translate-x-1/2">
                        <span class="font-space text-sm text-slate-700">welcome.php</span>
                    </div>
                </div>
                <div class="relative w-full flex items-center justify-center h-full">
                    <div class="lg:w-2/5 flex justify-center items-center text-Mygray font-jomhuria  flex-col">
                        <span class="text-4xl sm:text-5xl">{{ __('Public Space for Programming') }}</span>
                        <span class="text-md sm:text-xl font-plex text-MyYellow">{{ __('Personal Blog') }}</span>
                    </div>
                    <div class="w-3/5 h-full rounded-l-xl lg:flex justify-end items-center hidden">
                        <div style="background-image: url({{URL::asset('/image/solo-coding.webp')}})" class="bg-cover relative code-container w-[95%] h-[90%] rounded-l-xl my-8 text-sm flex overflow-clip">
                            <div class="absolute bg-gradient-to-r from-black from-30% to-transparent to-90% z-30 w-full h-full opacity-20"></div>
                            <div  class="z-40 relative w-full flex items-center">
                                @livewire('components.home-menu')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </section>
        {{-- Blog --}}
        <section id="blog-content">
            @livewire('blogs.home-content')
        </section>
        <section id="categories-content">

        </section>
        {{-- Footer --}}
        <section>
            <x-guest-footer/>
        </section>
    </div>
</x-guest-layout>
