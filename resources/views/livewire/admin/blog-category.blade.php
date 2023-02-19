@section('title', 'category')
<div class="w-full h-auto sm:h-full flex flex-col">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-between md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-start md:ml-8 bg-slate-100 rounded-md md:py-1 p-0.5 md:pl-6 md:mb-6">
            <span class="text-base md:text-xl">Category</span>
            <span class="text-xs md:text-sm">All Categories related to my field</span>
        </div>
    </div>
    <div class="w-full">
        <div class="flex flex-col justify-center items-center w-full">
            @if ($updateMode)
                @include('livewire.emergencyContact.update')
            @else
            <div class="w-11/12 md:w-3/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg">
                <span class="border-b py-1 font-bold uppercase mb-3">Add Record</span>
                <form class="w-full" enctype="multipart/form-data">
                    @csrf
                    {{-- Row 1 --}}
                    <div class="grid md:grid-rows-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="category" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="category" />
                        
                        <label for="category" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
                        @error('category') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="desc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="desc" />
                        
                        <label for="desc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                        @error('desc') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    
                    <button 
                    wire:click.prevent="store" class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    {{-- Table Content --}}
    <div class="flex md:justify-center md:w-full min-h-fit">
        @if ($categoryList -> isEmpty())
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-x-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 dark:text-gray-400 my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Categroy</th>
                  <th scope="col" class="py-3 px-6">Description</th>
                  <th scope="col" class="py-3 px-6">Date</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($categoryList as $data)
                       <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">{{$data->id}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">{{$data->category}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}">{{$data->desc}}</td>
                          <td class="py-4 px-6" wire:key="data-{{ $data->id }}" >{{$data->created_at->format('d/m/Y')}}</td>
                       </tr>
                  @endforeach
                </tbody>
              </table>
              @endif
            </div>
            </div>
    
</div>


