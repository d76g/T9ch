@section('title', 'category')
<div x-data="{ activeTab : 'category'}" class="w-full h-auto sm:h-full flex flex-col">
    {{-- Title and Buttons --}}
    <div class="flex flex-col md:flex-row mt-4 mx-4 md:justify-between md:w-[95%]" >
        <div class="flex flex-col mt-2 w-auto md:w-2/6 h-auto items-start md:ml-8 bg-slate-100 rounded-md md:py-1 p-0.5 md:pl-6 md:mb-6">
            <span class="text-base md:text-xl">Category</span>
            <span class="text-xs md:text-sm">All Categories and Hashtags related to my field</span>
        </div>
        <div class="flex justify-start">
            <ul class="flex">
                <a  @click.prevent="activeTab = 'category'" :class="{'border-sky-400 border-b-4 scale-110': activeTab === 'category'}" href="#" class="cursor-pointer bg-zinc-50 px-4 py-1 rounded-md hover:bg-slate-100 h-10 mx-2 justify-center align-middle  drop-shadow-sm transition ease-in-out delay-150  hover:translate-y-1 hover:scale-110 duration-300">Categories</a>
                <a  @click.prevent="activeTab = 'hashtag'" href="#" :class="{'border-sky-400 border-b-4': activeTab === 'hashtag'}" class="cursor-pointer bg-zinc-50 px-4 py-1 rounded-md hover:bg-slate-100 h-10 mx-2 justify-center align-middle  drop-shadow-sm transition ease-in-out delay-150  hover:translate-y-1 hover:scale-110 duration-300">Tags</a>
            </ul>
        </div>
    </div>
    <div x-cloak x-data="{show: false}" x-show="activeTab === 'category'" class="w-full">
        <div class="md:w-[95%] flex justify-end">
            <button @click.prevent="show = ! show" class="w-auto h-12 bg-MyBlue text-white rounded-lg px-3 py-1">Add Category</button>
        </div>
    <div  x-cloak x-show="show" x-transition class="w-full">
        <div class="flex flex-col justify-center items-center w-full">
            <div class="w-11/12 md:w-3/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg">
                <span class="border-b py-1 font-bold uppercase mb-3">Add Record</span>
                <form class="w-full" enctype="multipart/form-data">
                    @csrf
                    {{-- Row 1 --}}
                    <div class="grid md:grid-rows-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="category" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="category" />
                        
                        <label for="category" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Category</label>
                        @error('category') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="desc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="desc" />
                        
                        <label for="desc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                        @error('desc') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    
                    <button 
                    wire:click.prevent="store" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="flex md:justify-center md:w-full min-h-fit">
        @if ($categoryList == null)
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-x-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500 my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Categroy</th>
                  <th scope="col" class="py-3 px-6">Description</th>
                  <th scope="col" class="py-3 px-6">Actions</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($categoryList as $index => $data)
                       <tr class="bg-white border-b">
                          <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                {{$data['id']}}
                            </td>
                            <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                @if($editedCategoryIndex !== $index)
                                <a href="/category/{{$data['slug']}}" class="hover:text-blue-600">
                                    {{$data['category']}}
                                </a>
                                @else
                                    <input type="text" wire:model.defer="categoryList.{{$index}}.category" class="mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1">
                                    @if($errors->has('categoryList.' . $index . '.category'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{$errors->first('categoryList.' . $index . '.category')}}</span>    
                                        </div>    
                                    @endif
                                @endif
                            </td>
                                <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                                    @if($editedCategoryIndex !== $index)
                                    {{$data['desc']}}
                                    @else
                                        <input type="text" wire:model.defer="categoryList.{{$index}}.desc" class="mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1 w-full">
                                        @if($errors->has('categoryList.' . $index . '.desc'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{ $errors->first('categoryList.' . $index . '.desc') }}</span>    
                                        </div>    
                                    @endif
                                    @endif
                                </td>
                          <td class="py-4 px-8">
                            @if($editedCategoryIndex !== $index)
                            <div class="flex gap-4">
                                <button wire:click.prevent="edit({{$index}})" class="text-green-500 hover:text-green-800 dark:hover:text-green-500"><i class="fa fa-edit"></i></button>
                                <button wire:click="deleteConfirm({{$data['id']}}, 'Category')" class="text-red-500" data-confirm-delete="true"><i class="fa fa-trash text-red"></i></button>
                            </div> 
                            @else
                            <div class="flex gap-4">
                                <button wire:click.prevent="update({{$index}}, 'Category')" class="text-green-500 hover:text-green-800 dark:hover:text-green-300"><i class="fa fa-check"></i></button>
                                <button wire:click="cancel" class="text-red-500 hover:text-red-800 dark:hover:text-red-300"><i class="fa fa-times"></i></button>
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
    {{-- Hashtags Content --}}
    <div  x-cloak x-data="{show : false}" x-show="activeTab === 'hashtag'" class="w-full">
        <div class="md:w-[95%] flex justify-end">
            <button @click.prevent="show = ! show" class="w-auto h-12 bg-MyBlue text-white rounded-lg px-3 py-1">Add Hashtag</button>
        </div>
    <div x-cloak x-show="show" x-transition.duration.500ms class="w-full">
        <div   class="flex flex-col justify-center items-center w-full">
            <div class="w-11/12 md:w-3/6 flex flex-col justify-center bg-slate-50 rounded-md my-4 py-4 px-6 drop-shadow-lg">
                <span class="border-b py-1 font-bold uppercase mb-3">Add Hashtag</span>
                <form class="w-full" enctype="multipart/form-data">
                    @csrf
                    {{-- Row 1 --}}
                    <div class="grid md:grid-rows-2 md:gap-6">
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="hashtag" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" wire:model="hashtag" />
                        
                        <label for="hashtag" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hashtag name with no space</label>
                        @error('hashtag') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    <div class="relative z-0 mb-6 w-full">
                        <input type="text"  id="hastagDesc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  dark:border-gray dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " wire:model="hastagDesc" />
                        
                        <label for="hastagDesc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-MyBlue-600 peer-focus:dark:text-MyBlue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Description</label>
                        @error('hastagDesc') <span class="error text-xs text-red-600">{{ $message }}</span> @enderror
                    </div>
                    </div>
                    
                    <button 
                    wire:click.prevent="storeHashtag" class="text-white bg-MyBlue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
    {{-- Table Content --}}
    <div class="flex md:justify-center md:w-full min-h-fit mt-4">
        @if ($hashtagList == null)
               <div class="h-[70vh] flex justify-center items-center">
                <span class="text-3xl text-gray-300 font-bold">No Records <i class="fa fa-table"></i></span>
              </div>
        @else
        <div class="w-fit md:w-[95%] min-h-fit bg-gray-100 rounded-md flex md:justify-center md:items-center mx-2 overflow-x-auto">
          <table class="table-auto w-3/5 md:w-11/12 text-xs md:text-sm text-left text-gray-500my-4 mx-2">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                  <th scope="col" class="py-3 px-6">ID</th>
                  <th scope="col" class="py-3 px-6">Hashtag</th>
                  <th scope="col" class="py-3 px-6">Description</th>
                  <th scope="col" class="py-3 px-6">Actions</th>

                </tr>
              </thead>
              <tbody>
                  @foreach ($hashtagList as $index => $data)
                  <tr class="bg-white border-b">
                    <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                          {{$data['id']}}
                      </td>
                      <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                          @if($editedHashtagIndex !== $index)
                          <a href="/hashtag/{{$data['name']}}" class="hover:text-blue-600">
                            {{$data['name']}}
                          </a>
                          @else
                              <input type="text" wire:model.defer="hashtagList.{{$index}}.name" class="mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1">
                              @if($errors->has('hashtagList.' . $index . '.name'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{$errors->first('hashtagList.' . $index . '.name')}}</span>    
                                        </div>    
                                @endif
                          @endif
                          </td>
                          <td class="py-4 px-6" wire:key="data-{{ $data['id'] }}">
                              @if($editedHashtagIndex !== $index)
                              {{$data['description']}}
                              @else
                                  <input type="text" wire:model.defer="hashtagList.{{$index}}.description" class="w-full mt-2 text-sm pl-2 pr-4 rounded-lg border border-spacing-1">
                                  @if($errors->has('hashtagList.' . $index . '.description'))
                                        <div class="text-red">
                                            <span class="error text-xs">{{$errors->first('hashtagList.' . $index . '.description')}}</span>    
                                        </div>    
                                @endif
                              @endif
                          </td>
                    <td class="py-4 px-8">
                      @if($editedHashtagIndex !== $index)
                      <div class="flex gap-4">
                          <button wire:click.prevent="editHashtag({{$index}})" class="text-green-500 hover:text-green-800 dark:hover:text-green-300"><i class="fa fa-edit"></i></button>
                          <button wire:click="deleteConfirm({{$data['id']}}, 'Hashtag')" class="text-red hover:text-red-800 dark:hover:text-red-300" data-confirm-delete="true"><i class="fa fa-trash"></i></button>
                      </div> 
                      @else
                      <div class="flex gap-4">
                          <button wire:click.prevent="update({{$index}}, 'Hashtag')" class="text-green-500 hover:text-green-800 dark:hover:text-green-300"><i class="fa fa-check"></i></button>
                          <button wire:click="cancel" class="text-red hover:text-red-800 dark:hover:text-red-300"><i class="fa fa-times"></i></button>
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
    {{-- Languages Content --}}
</div>
