@section('name', 'Profile')
<div class="w-full h-screen sm:h-full flex flex-col font-plex">

    <div class="w-full mt-10">
        <div x-data="{show: false}" class="flex flex-col justify-center items-center w-full text-right overflow-y-auto max-h-full">
            <div class="flex flex-row  bg-MyBlue text-white py-1 px-2 rounded-md justify-end items-end">
                <button @click="show = ! show">Profile Form</button>
            </div>
            <div x-cloak x-show="show" x-transition class="w-11/12 h-full md:w-5/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg ">
                <div class="flex justify-between items-end border-b w-full">
                    <div class="py-2">
                        <button 
                        wire:click="store" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                    </div>
                    <p class=" py-1 mb-3 font-plex text-right">مدونة جديدة</p>

                </div>
                
                <form id="profiles-form" wire:submit.prevent="store" class="w-full flex flex-col justify-center items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="w-11/12 flex flex-col justify-center items-center">
                        <div class="flex flex-col w-full">
                            <div class="flex flex-col my-2">
                                <label for="name" class="mb-2">Full Name</label>
                                <input type="text" name="name" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('name') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex flex-col my-2">
                                <label for="profile_image" class="mb-2">Profile Image</label>
                                <input type="file" name="profile_image" id="profile_image" wire:model="profile_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('profile_image') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                        </div>
                        <div class="flex flex-col w-full gap-1">
                            <div class="relative z-0 mb-2 w-full">
                                <label for="about" class="mb-2">Bio</label>
                                <textarea name="about" id="about" wire:model="about" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"></textarea>

                                @error('about') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="relative z-0 mb-2 w-full">
                                <label for="position" class="mb-2">Position</label>
                                <input type="text"  id="position" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="position" />
                                @error('position') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="locaation" class="mb-2">Location</label>
                                <input type="text"  id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="location" />
                                @error('position') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                        </div>
                        <div class="flex gap-6">
                            <div class="relative z-0 mb-2 w-full">
                                <label for="facebook" class="mb-2">Facebook</label>
                                <input type="text"  id="facebook" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="facebook" />
                                @error('facebook') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="twitter" class="mb-2">Twitter</label>
                                <input type="text"  id="twitter" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="twitter" />
                                @error('twitter') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="linkedin" class="mb-2">Linkedin</label>
                                <input type="text"  id="linkedin" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="linkedin" />
                                @error('linkedin') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="github" class="mb-2">Linkedin</label>
                                <input type="text"  id="github" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="github" />
                                @error('github') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="website" class="mb-2">Website</label>
                                <input type="text"  id="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="website" />
                                @error('website') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                            </div>        
                            <div class="relative z-0 mb-2 w-full">
                                <label for="instagram" class="mb-2">Instagram</label>
                                <input type="text"  id="instagram" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder=" " wire:model="instagram" />
                                @error('instagram') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                        </div>
                    
                </form>
            </div>
        </div>
    </div>
     {{-- Table Content --}}
     <div class="flex md:justify-center md:w-full">
        @if ($profiles -> isEmpty())
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 dark:text-gray-400 my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Name</th>
                  <th scope="col" class="py-3 px-6">Position</th>
                  <th scope="col" class="py-3 px-6">Location</th>
                  <th scope="col" class="py-3 px-6">Website</th>
                  <th scope="col" class="py-3 px-6">About</th>
                  <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($profiles as $data)
                       <tr class=" border-b  {{$data->deleted_at == null ? 'bg-white text-dark-blue' : 'bg-slate-50'}}">
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">{{$data->id}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">
                                <a class="dark:hover:text-MyBlue" href="/profiles/{{$data->slug}}">{{$data->name}}</a>
                          </td>                          
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->position}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->location}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->website}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->about}}</td>
                            <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >
                                <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('editMyProfile', ['id' => $data->id]) }}" class="text-green-500 hover:text-green-800 dark:hover:text-green-300"><i class="fa fa-edit"></i></a>
                                        <a wire:click="deleteConfirm({{$data->id}})" href="#" class="text-red-500 hover:text-red-800 dark:hover:text-red-300"><i class="fa fa-trash"></i></a>
                                </div>   
                            </td>                       
                       </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
            </div>
</div>


