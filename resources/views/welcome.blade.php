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
            <p class="text-Mygray text-2xl font-jomhuria">مرحباً يا <span class="text-yellow">مبرمج</span></p>
        </div>
    </nav>
    <div class="relative min-w-full h-auto overflow-hidden">
        {{-- Main Content --}}
        <div class="h-50vh lg:h-90vh w-full sm:w-full flex items-center m-auto bg-dark-blue">
            <div class="w-2/5 flex justify-center items-center text-Mygray font-jomhuria text-7xl flex-col">
                <span>الساحة العامة للبرمجة</span>
            </div>
            <div class="code-cover w-3/5 h-70vh rounded-l-xl flex justify-end items-center">
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
        {{-- Resources --}}
        <div class="h-full lg:h-80vh mt-6 sm:mt-8 lg:mt-12 flex flex-col justify-center items-center">
            <div class="flex mb-6">
                <div class="flex flex-col">
                    <h1 class="text-4xl md:text-7xl">مسارات</h1>
                    <div class="w-full h-1 bg-dark-blue "></div>
                </div>
            </div>
            <div class="lg:h-60vh lg:w-3/4 sm:w-4/5 flex justify-center items-center">
                <div class="lg:h-60vh grid grid-rows-4 sm:grid-rows-2 sm:grid-cols-2 lg:grid-rows-none lg:grid-cols-4 gap-2 sm:gap-6 lg:gap-8 justify-center items-center">
                    <div class="w-52 h-56 sm:w-72 sm:h-80 lg:w-60 lg:h-72 bg-blue rounded-md transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gradient-to-t from-Mygray hover:shadow-md hover:outline outline-offset-4 outline-2 outline-blue">
                        <div class="roadmap-container-1 flex flex-col justify-evenly items-center w-full h-full py-8 sm:py-0">
                            <div class="flex justify-between w-full px-3 items-center">
                                <div class="roadmap-number h-10 w-10 lg:h-12 lg:w-12 rounded-full bg-Mygray text-dark-blue font-bold font-playfair flex justify-center text-2xl lg:text-3xl"><p>1</p></div>
                                <div class="roadmap-title font-jomhuria text-right text-Mygray text-3xl sm:text-4xl"><p>الواجهة الأمامية</p></div>
                            </div>
                            <div class="text-center text-Mygray font-changa my-3 px-1 lg:my-2 text-sm sm:text-xl sm:px-2">
                                <p>مسار تطوير الواجهة الأمامية للمواقع و الأنظمة من خلال لغات</p>
                                <p>HTML, CSS & JavaScript</p>
                            </div>
                            <div class="explore-roadmap font-changa text-Mygray w-full h-12 px-3 flex justify-center items-center transition hover:cursor-pointer ease-in sm:text-xl">
                                <i class="fas fa-long-arrow-alt-left px-6"></i>
                                <p class="text-right">إكتشف المسار</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 h-56 sm:w-72 sm:h-80 lg:w-60 lg:h-72 bg-dark-blue rounded-md transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gradient-to-t from-blue hover:shadow-md hover:outline outline-offset-4 outline-2 outline-dark-blue">
                        <div class="roadmap-container-2 flex flex-col justify-evenly items-center w-full h-full py-8 sm:py-0">
                            <div class="flex justify-between w-full px-3 items-center">
                                <div class="roadmap-number h-10 w-10 lg:h-12 lg:w-12 rounded-full bg-Mygray text-dark-blue font-bold font-playfair flex justify-center text-2xl lg:text-3xl"><p>1</p></div>
                                <div class="roadmap-title font-jomhuria text-right text-Mygray text-3xl sm:text-4xl"><p>الواجهة الأمامية</p></div>
                            </div>
                            <div class="text-center text-Mygray font-changa my-3 px-1 lg:my-2 text-sm sm:text-xl sm:px-2">
                                <p>مسار تطوير الواجهة الأمامية للمواقع و الأنظمة من خلال لغات</p>
                                <p>HTML, CSS & JavaScript</p>
                            </div>
                            <div class="explore-roadmap font-changa text-Mygray w-full h-12 px-3 flex justify-center items-center transition hover:cursor-pointer ease-in sm:text-xl">
                                <i class="fas fa-long-arrow-alt-left px-6"></i>
                                <p class="text-right">إكتشف المسار</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 h-56 sm:w-72 sm:h-80 lg:w-60 lg:h-72 bg-blue rounded-md transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gradient-to-t from-Mygray hover:shadow-md hover:outline outline-offset-4 outline-2 outline-blue">
                        <div class="roadmap-container-3 flex flex-col justify-evenly items-center w-full h-full py-8 sm:py-0">
                            <div class="flex justify-between w-full px-3 items-center">
                                <div class="roadmap-number h-10 w-10 lg:h-12 lg:w-12 rounded-full bg-Mygray text-dark-blue font-bold font-playfair flex justify-center text-2xl lg:text-3xl"><p>1</p></div>
                                <div class="roadmap-title font-jomhuria text-right text-Mygray text-3xl sm:text-4xl"><p>الواجهة الأمامية</p></div>
                            </div>
                            <div class="text-center text-Mygray font-changa my-3 px-1 lg:my-2 text-sm sm:text-xl sm:px-2">
                                <p>مسار تطوير الواجهة الأمامية للمواقع و الأنظمة من خلال لغات</p>
                                <p>HTML, CSS & JavaScript</p>
                            </div>
                            <div class="explore-roadmap font-changa text-Mygray w-full h-12 px-3 flex justify-center items-center transition hover:cursor-pointer ease-in sm:text-xl">
                                <i class="fas fa-long-arrow-alt-left px-6"></i>
                                <p class="text-right">إكتشف المسار</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-52 h-56 sm:w-72 sm:h-80 lg:w-60 lg:h-72 bg-dark-blue rounded-md transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-105 hover:bg-gradient-to-t from-blue hover:shadow-md hover:outline outline-offset-4 outline-2 outline-dark-blue">
                        <div class="roadmap-container-4 flex flex-col justify-evenly items-center w-full h-full py-8 sm:py-0">
                            <div class="flex justify-between w-full px-3 items-center">
                                <div class="roadmap-number h-10 w-10 lg:h-12 lg:w-12 rounded-full bg-Mygray text-dark-blue font-bold font-playfair flex justify-center text-2xl lg:text-3xl"><p>1</p></div>
                                <div class="roadmap-title font-jomhuria text-right text-Mygray text-3xl sm:text-4xl"><p>الواجهة الأمامية</p></div>
                            </div>
                            <div class="text-center text-Mygray font-changa my-3 px-1 lg:my-2 text-sm sm:text-xl sm:px-2">
                                <p>مسار تطوير الواجهة الأمامية للمواقع و الأنظمة من خلال لغات</p>
                                <p>HTML, CSS & JavaScript</p>
                            </div>
                            <div class="explore-roadmap font-changa text-Mygray w-full h-12 px-3 flex justify-center items-center transition hover:cursor-pointer ease-in sm:text-xl">
                                <i class="fas fa-long-arrow-alt-left px-6"></i>
                                <p class="text-right">إكتشف المسار</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        {{-- Footer --}}
        <div class="flex justify-center items-center my-4">
            <footer class="p-4 bg-dark-blue text-Mygray rounded-lg shadow md:px-6 md:py-8 dark:bg-Mygray-900 w-11/12">
                <div class="sm:flex sm:items-center sm:justify-between">
                    <a href="/" class="flex items-center mb-4 sm:mb-0">
                        <img src="{{URL::asset('/image/logo-circle.png')}}" class="h-10 mr-3" alt="Flowbite Logo" />
                        <span class="self-center whitespace-nowrap dark:text-white font-jomhuria text-3xl">تقنية</span>
                    </a>
                    <ul class="flex flex-wrap items-center mb-6 text-sm text-Mygray-500 sm:mb-0 dark:text-Mygray-400 font-plex">
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6 ">عن الموقع</a>
                        </li>
                        <li>
                            <a href="#" class="mr-4 hover:underline md:mr-6">مدونات</a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">تواصل معنا</a>
                        </li>
                    </ul>
                </div>
                <hr class="my-6 border-Mygray-200 sm:mx-auto dark:border-Mygray-700 lg:my-8" />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span class="block text-sm text-Mygray-500 sm:text-center dark:text-Mygray-400 font-playfair">© <a href="https://www.instagram.com/t9chnih/" target="_blank" class="hover:underline">t9chnih</a>. All Rights Reserved.
                    </span>
                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                        <a href="#" class="text-Mygray-500 hover:text-Mygray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">Instagram page</span>
                        </a>
                        <a href="#" class="text-Mygray-500 hover:text-Mygray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                            <span class="sr-only">GitHub account</span>
                        </a>
                        
                    </div>
                </div>
            </footer>

        </div>
    </div>
</x-guest-layout>
