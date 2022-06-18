
<div class="mt-3">
    <h3 class="text-center m-3">My Ingredient</h3>
    <div class="w-full flex pb-10">
        @if($myIngredients->isNotEmpty())
      <div class="w-3/6 mx-1">
          <input wire:model.debounce.300ms="search" type="text" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"placeholder="Search your ingredient...">
      </div>
      <div class="w-1/6 relative mx-1">
          <select wire:model="sortField" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option value="ingredients.name">Name</option>
              <option value="amount">Amount</option>
              <option value="unit">Unit</option>
              <option value="created_at">Added Date</option>
              <option value="date">End Date</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
      </div>
      <div class="w-1/6 relative mx-1">
          <select wire:model="sortAsc" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
              <option value="1">Ascending</option>
              <option value="0">Descending</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
      </div>
      <div class="w-1/6 relative mx-1">
        <select wire:model="perPage" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            <option>5</option>
            <option>15</option>
            <option>20</option>
            <option>25</option>
        </select>
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
        </div>
    </div>
    @if($selected)
      <div class="w-1/6 relative mx-1">
          <button wire:click="searchRecipes" class="block appearance-none w-full bg-blue-500 border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">Ingredient's Recipes</button>
      </div>
      @endif
  </div>
      
          <table class="table-auto w-full mb-6">
              <thead>
                  <tr>
                      <th class="px-4 py-2"></th>
                      <th class="px-4 py-2">Name</th>
                      <th class="px-4 py-2">Amount</th>
                      <th class="px-4 py-2">Unit</th>
                      <th class="px-4 py-2">Added Date</th>
                      <th class="px-4 py-2">End Date</th>
                      <th class="px-4 py-2">Action</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach($myIngredients as $myIngredient)
                 {{-- created At --}}
                  {{-- @php
                  dd($myIngredient);
                  @endphp --}}
                      <tr>
                          <td class="border px-4 py-2">
                              <input wire:model="selected" value="{{$myIngredient->name}} " type="checkbox">
                          </td>
                          <td class="border px-4 py-2">{{$myIngredient->name}}</td>
                          <td class="border px-4 py-2">{{$myIngredient->amount}}</td>
                          <td class="border px-4 py-2">{{$myIngredient->unit}}</td>
                          {{-- <td class="border px-4 py-2">@php dd($myIngredient->created_at) @endphp</td> --}}
                          <td class="border px-4 py-2">@php echo date("d-m-Y", strtotime($myIngredient->created_at)) @endphp</td>
                          <td class="border px-4 py-2">@php echo date("d-m-Y", strtotime($myIngredient->date)) @endphp</td>
                          <td class="border px-4 py-2" style="display: flex;">
                            <div class="pointer-events  flex items-center px-2 text-gray-700">
                                <svg wire:click.prevent="showIngredientInfo({{$myIngredient->id}})" style="cursor: pointer; height: 25px; width: 25px; color: rgb(3, 3, 3);" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16"> <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path> <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path> </svg>
                            </div>
                            {{-- <div class="pointer-events  flex items-center px-2 text-gray-700">
                                <svg data-bs-toggle="modal" data-bs-target="#ingredientEditModal"  style="cursor: pointer; height: 25px; width: 25px; color: rgb(3, 3, 3);" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9" fill="#00ff62"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" fill="#efefef"></path></svg>
                            </div> --}}
                            <div class="pointer-events  flex items-center px-2 text-gray-700">
                                <svg wire:click.prevent="deleteIngredient({{$myIngredient->id}})" style="cursor: pointer; height: 25px; width: 25px; color: rgb(3, 3, 3);" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#ff0000" d="M352 192V95.936a32 32 0 0 1 32-32h256a32 32 0 0 1 32 32V192h256a32 32 0 1 1 0 64H96a32 32 0 0 1 0-64h256zm64 0h192v-64H416v64zM192 960a32 32 0 0 1-32-32V256h704v672a32 32 0 0 1-32 32H192zm224-192a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32zm192 0a32 32 0 0 0 32-32V416a32 32 0 0 0-64 0v320a32 32 0 0 0 32 32z"></path></svg>
                            </div>
                          </td>
                      </tr>
                       {{-- <!--START ingredientModal-->
                       <div class="modal fade" id="ingredientEditModal" tabindex="-1" aria-labelledby="ingredientModalLabel" aria-hidden="true" >
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title" id="ingredientModalLabel">{{$myIngredient->name}}</h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                @livewire('modals.edit-ingredient-modal',['ingredientId'=> $myIngredient->id])                  
                            </div>
                        </div>
                    </div>
                    <!--END ingredientModal-->  --}}
                  @endforeach
              </tbody>
            </table>
             {{$myIngredients->links() }}
      @else
            @isset($search)
            <div class="mainIngredient" >
                <h3 class="mt-3" >Whoops! you don't have {{$search}} 🙁</h3>
                <div class="ingredientNameBtn">
                    <a type="button" href="{{ route('ingredients') }}" class="btn btn-primary mt-4" >Add Ingredient</a>
                </div>
                <div class="ingredientNameBtn">
                    <a type="button" href="{{ route('home') }}" class="btn btn-primary mt-4" >Back to my Ingredients</a>
                </div>
            </div>
            @endisset
            @empty($search)
            <div class="mainIngredient" >
                <h3 class="mt-3" >Whoops! No Igredients were found 🙁</h3>
                <div class="ingredientNameBtn">
                    <a type="button" href="{{ route('ingredients') }}" class="btn btn-primary mt-4" >Add Ingredient</a>
                </div>
            </div>
            @endempty
       
      @endif
      
      
</div>