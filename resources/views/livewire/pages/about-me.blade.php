@php
    $locale = app()->getLocale();
@endphp
@section('title', 'About Me')
<div class="h-full w-screen flex flex-col bg-white">
    <div class="relative w-full h-18">
        <x-navbar/>
    </div>
    <div x-data="{tab:'Profile'}"  class="relative w-full h-5/6 flex flex-col p-8 gap-y-4">
        {{-- Tab Bar --}}
        <div class="flex  {{ textDirection($locale) }}">
            <div>
                <ul class="flex gap-4 {{$locale == 'ar' ? 'font-plex' : 'font-space'}} space-x-10">
                    <a x-transition href="#" @click.prevent="tab = 'Profile'"  :class="{'border-sky-400 border-b-4 scale-110 transform ease-in-out text-black' : tab === 'Profile'}" class="text-slate-400">{{__('Profile')}}</a>
                    <a x-transition href="#" @click.prevent="tab = 'Skills'" :class="{'border-sky-400 border-b-4 scale-105 text-black' : tab === 'Skills'}" class="text-slate-400">{{__('Skills')}}</a>
                </ul>
            </div>
        </div>
        {{-- Tab title --}}
        <div class="font-plex text-lg  {{ textDirection($locale) }}">
            <span x-show="tab === 'Profile'">{{__('Profile')}}</span>
            <span x-show="tab === 'Skills'">{{__('Skills')}}</span>
        </div>
        {{-- Profile Content --}}
        <div x-transition:enter.scale.70 x-transition:leave.scale.90
        x-cloak x-show="tab === 'Profile'"
        class=" {{ textDirection($locale) }} flex flex-col lg:flex-row h-full gap-y-4 gap-x-6 justify-center items-center">
            <div class="flex flex-col gap-y-4 w-full md:w-[600px]">
                <div class="h-full md:h-72 w-full rounded-xl flex flex-col bg-gray-50 outline outline-2 outline-gray-100">
                    @if ($profile)
                        <div class="w-full gap-1 flex flex-col md:flex-row">
                            <div class="flex w-full h-full md:h-48 md:w-64 py-3 px-4">
                                <img src="{{URL::asset('/storage/'.$profile->profile_image)}}" class="object-cover object-center md:object-scale-down max-h-full w-full rounded-xl m-auto" alt="Profile" />
                            </div>
                            <div class="w-full sm:w-5/6 px-2 gap-2 md:py-3 flex flex-col justify-start items-start font-playfair">
                                <div class="flex gap-2 w-full justify-between px-2">
                                    <span class="text-md  md:text-lg lg:text-2xl font-playfair">{{$profile->name}}</span>
                                    <div class="flex gap-3 fa-md md:py-2 pl-2">
                                        @if ($profile->twitter)
                                            <a target="_blank" href="{{$profile->twitter}}"><i class="fa-brands fa-square-twitter"></i></a>
                                        @endif
                                        @if ($profile->linkedin)
                                            <a target="_blank" href="{{$profile->linkedin}}" class="text-blue-700"><i class="fa-brands fa-linkedin"></i></a>
                                        @endif
                                        @if ($profile->facebook)
                                            <a target="_blank" href="{{$profile->facebook}}" class="text-red"><i class="fa-brands fa-square-facebook"></i></a>
                                        @endif
                                        @if ($profile->instagram)
                                            <a target="_blank" href="{{$profile->instagram}}" class="text-red"><i class="fa-brands fa-square-instagram"></i></a>
                                        @endif
                                        @if ($profile->website)
                                            <a target="_blank" href="{{$profile->website}}" class="text-sky-500"><i class="fa-solid fa-globe"></i></a>
                                        @endif
                                        @if ($profile->github)
                                            <a target="_blank" href="{{$profile->github}}"><i class="fa-brands fa-square-github"></i></a>
                                        @endif
        
                                    </div>
                                </div>
                                <div class="text-xs sm:text-sm md:text-md mb-1">
                                    <div class="flex gap-1 px-2">
                                        <span class=" font-plex text-gray-600">{{$profile->position}}</span>
                                        <span class=" font-plex text-gray-500">in {{$profile->location}}</span>
                                    </div>
                                    <div class="bg-gray-100 p-4 rounded-xl mt-2">
                                        <span class="font-plex text-gray-500">{{$profile->about}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="w-full h-full flex justify-center items-center">
                            <span class="text-2xl font-plex text-gray-300">{{__('No Profile Found')}}</span>
                        </div>
                    @endif
                    <div class="w-full h-full gap-2 px-3  md:px-4">
                        <div class="md:px-2 text-md font-plex pb-1 {{ textDirection($locale) }}">
                            <span>{{__('Current Courses')}}</span>
                        </div>
                        @if ($currentCourses->count() != 0)
                        <div class="flex flex-col md:flex-row w-full justify-evenly">
                            @isset($currentCourses[0])
                                <div class="md:w-2/5 px-2 py-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-sky-300 to-indigo-500 h-2.5 rounded-full" style="width: {{$currentCourses[0]->percentage}}%"></div>
                                    </div>
                                    <div class="text-sm font-plex px-1 flex justify-between h-8">
                                        <span class="pt-1 text-gray-500">%{{$currentCourses[0]->percentage}}</span>
                                        <span class="pt-1">{{$currentCourses[0]->name}}</span>
                                    </div>
                                </div>
                            @endisset
                            
                            @isset($currentCourses[1])
                                <div class="md:w-2/5 px-2 py-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-yellow-500 to-orange-500 h-2.5 rounded-full" style="width:{{$currentCourses[1]->percentage}}%"></div>
                                    </div>
                                    <div class="text-sm font-plex px-1 flex justify-between h-8">
                                        <span class="pt-1 text-gray-500">%{{$currentCourses[1]->percentage}}</span>
                                        <span class="pt-1">{{$currentCourses[1]->name}}</span>
                                    </div>
                                </div>
                            @endisset
                            
                            @isset($currentCourses[2])
                                <div class="md:w-2/5 px-2 py-2">
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-gradient-to-r from-stone-400 to-green-600 h-2.5 rounded-full" style="width:{{$currentCourses[2]->percentage}}%"></div>
                                    </div>
                                    <div class="text-sm font-plex px-1 flex justify-between h-8">
                                        <span class="pt-1 text-gray-500">%{{$currentCourses[2]->percentage}}</span>
                                        <span class="pt-1">{{$currentCourses[2]->name}}</span>
                                    </div>
                                </div>
                            @endisset
                        </div>
                        @else
                        <div class="text-md font-plex text-gray-300 w-full h-16 flex justify-center items-center">
                            <span>No Current Courses</span>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="h-full md:h-72 w-full bg-gray-50 rounded-xl outline outline-2 outline-gray-100">
                    <div class="flex flex-col gap-2">
                        <div class="px-6 pt-7  {{ textDirection($locale) }}">
                            <span class="font-plex text-md">{{__('Work Experience')}}</span>
                        </div>
                        @if ($workExperience->count() == 0)
                            <div class="flex justify-center items-center h-52">
                                <span class="text-2xl font-plex text-gray-300">{{__('No Work Experience Found')}}</span>
                            </div>
                        @else
                        

<div class="ltr relative overflow-x-auto shadow-md sm:rounded-lg m-3">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Position
                </th>
                <th scope="col" class="px-6 py-3">
                    Company
                </th>
                <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3 hidden sm:table-cell">
                    End Date
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($workExperience as $item)
            <tr class="">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                    {{$item->position}}
                </th>
                <td class="px-6 py-4">
                    {{$item->company}}
                </td>
                <td class="px-6 py-4 hidden sm:table-cell">
                    {{$item->start_date}}
                </td>
                <td class="px-6 py-4 hidden sm:table-cell">
                    {{$item->end_date}}
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>

                        @endif
                    </div>
                </div>
            </div>
            <div class="h-full lg:h-[595px] md:w-[600px] py-4 px-2 rounded-xl bg-gray-50  outline outline-2 outline-gray-100 overflow-scroll">
                <div class="font-plex px-3  {{ textDirection($locale) }}">
                    <span>{{__('Achievements')}}</span>
                </div>
                @if ($achievements->count() == 0)
                    <div class="flex justify-center items-center h-full">
                        <span class="text-2xl font-plex text-gray-300">No Achievements Found</span>
                    </div>
                @else
                <div>
                    @foreach ($achievements as $item)
                        <div class="ltr flex bg-gray-100 drop-shadow-sm m-2 rounded-lg h-20 divide-x-2 gap-1">
                            <div class="w-20 h-full flex justify-center items-center p-2">
                                <img src="{{URL::asset('/storage/'.$item->image)}}" class="object-cover rounded-lg" alt="Logo" />
                            </div>
                            <div class="w-3/4 flex flex-col p-3 gap-1 font-plex ">
                                <span class="text-sm">{{$item->name}}</span>
                                <span class="text-xs text-gray-400">{{$item->date}}</span>
                            </div>
                        </div>
                    @endforeach
                   
                </div>
                @endif

            </div>
        </div>
        {{-- Skills Content --}}
        <div x-transition:enter.scale.70 x-transition:leave.scale.90 x-cloak x-show="tab === 'Skills'"
         class="flex flex-col sm:flex-row h-full gap-x-6 gap-y-4 justify-center items-center">
            <div class="h-[595px] bg-gray-50  outline outline-2 outline-gray-100 w-80 rounded-xl">
                <div>
                    @foreach ($skills->take(8) as $item)
                        <div class="flex bg-gray-100 drop-shadow-sm m-2 rounded-lg h-16 divide-x-2 gap-1">
                            <div class="w-1/4 flex justify-center items-center">
                                <img src="{{URL::asset('/storage/'.$item->image)}}" class="object-cover rounded-lg p-1 w-12" alt="Logo" />
                            </div>
                            <div class="flex flex-col w-3/4 px-5 py-2 font-plex ">
                                <span class="text-md">{{$item->name}}</span>
                                <div class="flex gap-x-2 py-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->level)
                                            <!-- Active Level -->
                                            <div class="w-5 h-1.5 bg-dark-blue rounded-sm"></div>
                                        @else
                                            <!-- Inactive Level -->
                                            <div class="w-5 h-1.5 bg-gray-300 rounded-sm"></div>
                                        @endif
                                    @endfor
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if ($skills->count() > 8)
            <div class="h-[595px] bg-gray-50 outline outline-2 outline-gray-100 w-80 rounded-xl">
                <div>
                    @foreach ($skills->skip(8) as $item)
                        <div class="flex bg-gray-100 drop-shadow-sm m-2 rounded-lg h-16 divide-x-2 gap-1">
                            <div class="w-1/4 flex justify-center items-center">
                                <img src="{{URL::asset('/storage/'.$item->image)}}" class="object-cover rounded-lg p-1 w-12" alt="Logo" />
                            </div>
                            <div class="flex flex-col w-3/4 px-5 py-2 font-plex ">
                                <span class="text-md">{{$item->name}}</span>
                                <div class="flex gap-x-2 py-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->level)
                                            <!-- Active Level -->
                                            <div class="w-5 h-1.5 bg-dark-blue rounded-sm"></div>
                                        @else
                                            <!-- Inactive Level -->
                                            <div class="w-5 h-1.5 bg-gray-300 rounded-sm"></div>
                                        @endif
                                    @endfor
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            @if ($skills->count() > 16)
            <div class="h-full bg-gray-50 outline outline-2 outline-gray-100 w-80 rounded-xl">
                <div>
                    @foreach ($skills->skip(16) as $item)
                        <div class="flex bg-gray-100 drop-shadow-sm m-2 rounded-lg h-16 divide-x-2 gap-1">
                            <div class="w-1/4 flex justify-center items-center">
                                <img src="{{URL::asset('/storage/'.$item->image)}}" class="object-cover rounded-lg p-1 w-12" alt="Logo" />
                            </div>
                            <div class="flex flex-col w-3/4 px-5 py-2 font-plex ">
                                <span class="text-md">{{$item->name}}</span>
                                <div class="flex gap-x-2 py-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $item->level)
                                            <!-- Active Level -->
                                            <div class="w-5 h-1.5 bg-dark-blue rounded-sm"></div>
                                        @else
                                            <!-- Inactive Level -->
                                            <div class="w-5 h-1.5 bg-gray-300 rounded-sm"></div>
                                        @endif
                                    @endfor
                                </div>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
            
        </div>
        
    </div>
    {{-- Footer --}}
    <x-guest-footer/>
</div>


