<x-guest-layout>
    <nav class="fixed top-0 left-0 right-0 flex w-full h-[10vh] justify-between items-center z-20 bg-dark-blue overflow-hidden">
        <div class="px-4">
            <p class="text-yellow text-3xl font-jomhuria">تقنية</p>
        </div>
        <div class="px-4 flex items-center justify-center text-gray">
            <i class="fab fa-instagram px-2"></i>
            <p class="text-xl font-playfair"> t9chnih</p>
        </div>
        <div class="px-4">
            <p class="text-gray text-2xl font-jomhuria">مرحباً يا <span class="text-yellow">مبرمج</span></p>
        </div>
    </nav>
    <div class="relative bg-dark-blue min-w-full h-auto overflow-hidden">
        {{-- Main Content --}}
        <div class="h-50vh lg:h-90vh w-fill sm:w-full grid sm:grid-rows-3 lg:grid-cols-3 items-center justify-center m-auto">
            <div class="bg-blue hidden sm:block h-44 lg:h-70vh sm:row-span-2 lg:col-span-2 rounded-r-xl sm:order-2">

            </div>
            <div class="flex flex-col sm:grid sm:row-span-1 lg:col-span-1 justify-center items-center h-full">
                <span class="text-gray font-jomhuria text-2xl lg:text-7xl">الساحة العامة للبرمجة</span>
                <span class="text-gray font-jomhuria text-2xl lg:text-4xl text-right">مرجع لكل <span class="text-yellow">{مبرمج}</span></span>
            </div>
        </div>
        {{-- Blog --}}
        <div class="bg-gray w-full h-full flex flex-col items-center">
            <div class="flex my-6">
                <div class="flex flex-col">
                    <h1>مُـدونات</h1>
                    <div class="w-full h-1 bg-dark-blue "></div>
                </div>
            </div>
            <div class="grid grid-rows-3 gap-1 lg:grid-cols-3 lg:gap-2 h-full lg:h-screen sm:w-4/5">
                {{-- Left --}}
                <div class="grid grid-rows-3 w-96 sm:w-full h-screen gap-2 px-3 sm:px-0">
                    <div class="px-1 w-full grid grid-cols-2 gap-2 rounded-xl text-gray">
                            <div class="bg-dark-blue rounded-xl flex justify-center items-center"><h1 class="text-6xl font-jomhuria">أساسيات</h1></div>
                            <div class="bg-blue rounded-xl flex justify-center items-center"><i class="fab fa-instagram px-2 fa-6x"></i></div>
                    </div>
                    <div class="px-1 grid w-full h-auto bg-blue rounded-xl text-gray font-jomhuria text-right ">
                        <div class="p-4">
                            <span class="text-5xl lg:text-5xl sm:text-7xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">ماذا تحتاج من أساسيات لتصبح مبرمج بفترة قصيرة؟</span>
                            <div class="flex justify-between w-38 my-2 text-lg sm:text-2xl lg:text-lg font-plex px-6 items-end h-18 lg:h-28 sm:h-40">
                                <p>عام <i class="fas fa-book px-1"></i></p>
                                <p>دقائق 5<i class="far fa-clock px-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-1 grid w-full h-auto bg-blue rounded-xl text-gray font-jomhuria text-right">
                        <div class="p-4">
                            <span class="text-5xl lg:text-5xl sm:text-7xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">ماذا تحتاج من أساسيات لتصبح مبرمج بفترة قصيرة؟</span>
                            <div class="flex justify-between w-38 my-2 text-lg sm:text-2xl lg:text-lg font-plex px-6 items-end h-18 sm:h-28">
                                <p>عام <i class="fas fa-book px-1"></i></p>
                                <p>دقائق 5<i class="far fa-clock px-1"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Center --}}
                <div class="grid grid-rows-3 w-96 sm:w-full h-screen gap-2 px-3 sm:px-0">
                    
                    <div class="px-1 grid w-full h-auto bg-blue rounded-xl text-gray font-jomhuria text-right ">
                        <div class="p-4">
                            <span class="text-5xl lg:text-5xl sm:text-7xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">ماذا تحتاج من أساسيات لتصبح مبرمج بفترة قصيرة؟</span>
                            <div class="flex justify-between w-38 my-2 text-lg sm:text-2xl lg:text-lg font-plex px-6 items-end h-18 sm:h-28">
                                <p>عام <i class="fas fa-book px-1"></i></p>
                                <p>دقائق 5<i class="far fa-clock px-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="px-1 w-full grid grid-rows-2 gap-2 rounded-xl text-gray">
                        <div class="bg-dark-blue rounded-xl flex justify-center items-center"><h1 class="text-6xl font-jomhuria">أساسيات</h1></div>
                        <div class="bg-blue rounded-xl flex justify-center items-center"><i class="fab fa-instagram px-2 fa-6x"></i></div>
                    </div>
                    <div class="px-1 grid w-full h-auto bg-blue rounded-xl text-gray font-jomhuria text-right">
                        <div class="p-4">
                            <span class="text-5xl lg:text-5xl sm:text-7xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">ماذا تحتاج من أساسيات لتصبح مبرمج بفترة قصيرة؟</span>
                            <div class="flex justify-between w-38 my-2 text-lg sm:text-2xl lg:text-lg font-plex px-6 items-end h-18 sm:h-28">
                                <p>عام <i class="fas fa-book px-1"></i></p>
                                <p>دقائق 5<i class="far fa-clock px-1"></i></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Right --}}
                <div class="grid grid-rows-3 w-96 sm:w-full h-screen gap-2 px-3 sm:px-0">
                    
                    <div class="grid w-full h-auto bg-dark-blue rounded-xl text-gray font-jomhuria text-right">
                        <div class="p-4">
                            <span class="text-5xl lg:text-5xl sm:text-7xl hover:underline hover:cursor-pointer hover:text-yellow transition ease">ماذا تحتاج من أساسيات لتصبح مبرمج بفترة قصيرة؟</span>
                            <div class="flex justify-between w-38 my-2 text-lg sm:text-2xl lg:text-lg font-plex px-6 items-end h-18 sm:h-28">
                                <p>عام <i class="fas fa-book px-1"></i></p>
                                <p>دقائق 5<i class="far fa-clock px-1"></i></p>
                            </div>
                        </div>
                    </div>
                    <div class="w-auto grid grid-cols-2 gap-x-2 rounded-xl justify-center items-center">
                        <div class="h-full text-gray grid grid-rows-2 gap-2">
                            <div class="bg-blue rounded-xl w-full h-full flex justify-center items-center text-3xl font-playfair">MySQL</div>
                            <div class="bg-blue rounded-xl w-full h-full flex justify-center items-center text-3xl font-playfair">Laravel</div>
                        </div>
                        <div class="h-full rounded-xl bg-dark-blue text-gray flex justify-center items-center">
                            <h1 class="text-6xl font-playfair">PHP</h1>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-2 w-full h-auto text-gray">
                        <div class="bg-dark-blue rounded-xl flex justify-center items-center"><h1 class="text-6xl font-playfair">JS</h1></div>
                        <div class="grid grid-rows-2 gap-2 ">
                            <div class="bg-blue rounded-xl w-full h-full flex justify-center items-center"><h1 class="text-4xl font-playfair">React</h1></div>
                            <div class="bg-blue rounded-xl w-full h-full flex justify-center items-center"><h1 class="text-4xl font-playfair">Vue</h1></div>
                        </div>
                    </div>
                </div>
                {{-- End --}}
            </div>
        </div>
        {{-- Resources --}}
        <div></div>
        {{-- Footer --}}
        <div></div>
    </div>
</x-guest-layout>
