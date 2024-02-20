@php
  $locale = app()->getLocale();
@endphp

<nav class="bg-white px-2 sm:px-4 py-2.5 dark:bg-gray-900 relative w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600 {{fontNameForArabic($locale, 'font-plex', 'font-mono')}} ">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="/" class="flex items-center">
        {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-6 mr-3 sm:h-9" alt="Flowbite Logo"> --}}
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">/ {{__('t9chnih')}}</span>
    </a>
    <div class="md:order-2 mt-2">
      @livewire('helpers.localization-switcher')
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul class="flex flex-col p-4 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="/" class="block py-2 pl-3 pr-4 text-white rounded md:bg-transparent  md:p-0 dark:text-white" aria-current="page">{{__('Home')}}</a>
        </li>
        <li>
          <a href="/blogs" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-MyBlue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{__('Nav Blogs')}}</a>
        </li>
        <li>
          <a href="/about" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-MyBlue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{__('About Me')}}</a>
        </li>
        {{-- <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-MyBlue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li> --}}
      </ul>
    </div>
    </div>
  </nav>
  