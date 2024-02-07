@section('title', 'Edit Profile')
<div class="w-full h-screen sm:h-full flex flex-col font-plex">

    <div class="w-full mt-10">
        <div x-data="{show: true}" class="flex flex-col justify-center items-center w-full text-right overflow-y-auto max-h-full">
            <div class="flex flex-row  bg-MyBlue text-white py-1 px-2 rounded-md justify-end items-end">
                <button @click="show = ! show">Profile Form</button>
            </div>
            <div x-cloak x-show="show" x-transition class="w-11/12 h-full md:w-5/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg ">
                <div class="flex justify-between items-end border-b w-full">
                    <div class="py-2">
                        <button 
                        wire:click="update" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Save</button>
                    </div>
                    <p class=" py-1 mb-3 font-plex text-right">Edit Profile</p>

                </div>
                
                <form id="profiles-form" wire:submit.prevent="update" class="w-full flex flex-col justify-center items-center" enctype="multipart/form-data">
                    @csrf
                    <div class="w-11/12 flex flex-col justify-center items-center">
                        <div class="flex flex-col w-full">
                            <div class="flex flex-col my-2">
                                <label for="name" class="mb-2">Full Name</label>
                                <input type="text" name="name" id="name" wire:model="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('name') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                            </div>
                            <div class="flex flex-col my-2">
                                <label for="profileImage" class="mb-2">Profile Image</label>
                                <input type="file" name="profileImage" id="profileImage" wire:model="profileImage" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                @error('profileImage') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

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
                                <label for="github" class="mb-2">Github</label>
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