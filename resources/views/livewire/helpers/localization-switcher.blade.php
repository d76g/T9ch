<div class="absolute left-1/2 transform -translate-x-1/2 sm:-translate-x-1/4  md:-translate-x-0 top-8 sm:right-0 sm:left-0 md:right-32 rtl">
    <ul class="flex gap-1 sm:gap-4 items-center text-sm sm:text-md">
        <li class="flex flex-col items-center gap-y-1 h-8" href="#">
            <button wire:click.re="switchLang('en')"><span class="fi fi-gb"></span></button>
            @if ($locale == 'en')
            <span class="relative flex h-1.5 w-1.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-300 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-yellow-400"></span>
              </span>
            @endif
         </li>
        <li class="flex flex-col items-center gap-y-1 h-8">
            <button wire:click="switchLang('ar')"><span class="fi fi-sa  "></span></button>
            @if ($locale == 'ar')
            <span class="relative flex h-1.5 w-1.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-300 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-yellow-400"></span>
              </span>
            @endif
            </li>
        {{-- <li class="flex flex-col items-center gap-y-1 h-8">
            <button wire:click="switchLang('nl')"><span class="fi fi-nl"></span></button>
            @if ($locale == 'nl')
            <span class="relative flex h-1.5 w-1.5">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-yellow-300 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-yellow-400"></span>
              </span>
            @endif
            </li> --}}
    </ul>
</div>