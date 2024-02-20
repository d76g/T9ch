<div class="h-14 w-3/4 mb-10 md:mb-0">
    @php
        $locale = app()->getLocale();
    @endphp
    <form action="{{$pageName}}">
        <label
            class="mx-auto relative bg-white min-w-sm max-w-4xl flex flex-col md:flex-row items-center justify-center border
             py-1 px-2 rounded-2xl shadow-sm border-gray-200"
            for="search-bar">

            <input wire:model.debounce.500ms="search" id="search-bar" placeholder="{{__('Search for a blog...')}}" name="search"
            class="block w-[90%] p-3 mx-1 ps-10 text-sm text-gray-900 border-0 rounded-lg  focus:ring-gray-100 focus:border-gray-200 {{ textDirection($locale) }}">

            <button type="submit"
                class="w-full md:w-24 px-4 py-2 bg-dark-blue hover:bg-cyan-700 text-white
                 will-change-transform overflow-hidden relative rounded-full transition-all">
                <div class="flex items-center transition-all opacity-1">
                    <span class="text-sm font-bold whitespace-nowrap truncate mx-auto font-mono">
                        {{__('Search')}}
                    </span>
                </div>
            </button>
        </label>
        <div class="xl:pl-20">
            @error('search') <span class="text-red text-xs font-bold "> - {{ $message }}</span> @enderror
        </div>
    </form>
</div>
