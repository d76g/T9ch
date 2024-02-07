@section('title', 'Achievements')
<div x-cloak x-data="{show: false}" class="w-full h-auto sm:h-full flex flex-col">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-between md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-start md:ml-8 bg-slate-100 rounded-md md:py-1 p-0.5 md:pl-6 md:mb-6">
            <span class="text-base md:text-xl">Achievements</span>
            <span class="text-xs md:text-sm">My Achievements</span>
        </div>
        <div class="md:w-[95%] flex justify-end">
            <button @click.prevent="show = ! show" class="w-auto h-12 bg-MyBlue text-white rounded-lg px-3 py-1">Add Achievements</button>
        </div>
    </div>
    <div  class="w-full">
    <div  x-cloak x-show="show" x-transition class="w-full">
        <div class="flex flex-col justify-center items-center w-full">
            <div class="w-11/12 md:w-3/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg">
                <span class="border-b py-1 font-bold uppercase mb-3">Add Record</span>
                <form class="w-full" enctype="multipart/form-data">
                    @csrf
                    {{-- Row 1 --}}
                    <div class="grid md:grid-rows-2 md:gap-6">
                        <div class="relative z-0 mb-6 w-full">
                            <input type="text" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="name" />
                            
                            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                            @error('name') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                        <div class="relative z-0 mb-6 w-full">
                            <input type="text" id="date" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="date" />
                            
                            <label for="date" class="peer-focus:font-medium absolute text-sm text-gray-500  duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Date</label>
                            @error('date') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"/>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 "><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 ">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                            </div>
                            <input wire:model="image" id="image" type="file" class="hidden" />
                            @error('image') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror

                        </label>
                    </div>
                    <button 
                    wire:click.prevent="store" 
                    class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none
                     focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
                       mt-3">Add</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="flex md:justify-center md:w-full min-h-fit">
        @if ($achievements == null)
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-x-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Name</th>
                  <th scope="col" class="py-3 px-6">Date</th>
                  <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($achievements as $index => $data)
                       <tr class="bg-white border-b">
                          <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                {{$data['id']}}
                            </td>
                            <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                @if($editedIndex !== $index)
                                {{$data['name']}}
                                @else
                                    <input type="text" wire:model.defer="achievements.{{$index}}.name" class="mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1">
                                    @if($errors->has('achievements.' . $index . '.name'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{$errors->first('achievements.' . $index . '.name')}}</span>    
                                        </div>    
                                    @endif
                                @endif
                            </td>
                                <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                    @if($editedIndex !== $index)
                                    {{$data['date']}}
                                    @else
                                        <input type="text" wire:model.defer="achievements.{{$index}}.date" class="mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1">
                                        @if($errors->has('achievements.' . $index . '.date'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{ $errors->first('achievements.' . $index . '.date') }}</span>    
                                        </div>    
                                    @endif
                                    @endif
                                </td>
                          <td class="py-4 px-8">
                            @if($editedIndex !== $index)
                            <div class="flex gap-4">
                                <button wire:click.prevent="edit({{$index}})" class="text-green-500 hover:text-green-800 "><i class="fa fa-edit"></i></button>
                                <button wire:click="deleteConfirm({{$data['id']}})" class="text-red-500" data-confirm-delete="true"><i class="fa fa-trash text-red"></i></button>
                            </div> 
                            @else
                            <div class="flex gap-4">
                                <button wire:click.prevent="update({{$index}})" class="text-green-500 hover:text-green-800 "><i class="fa fa-check"></i></button>
                                <button wire:click="cancel" class="text-red-500 hover:text-red-800 "><i class="fa fa-times"></i></button>
                            </div>
                            @endif
                          </td>
                       </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
            </div>
</div>
</div>
