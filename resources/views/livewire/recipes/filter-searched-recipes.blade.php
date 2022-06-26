<div class="px-3">
    <h5 class="text-white text-center">Search Filter</h5>
    <div class="mt-3">
        <label  class="text-white">Cuisines</label>
    <select wire:model="cuisines" style= "width: 60%;"class="block appearance-none bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
       @foreach($cuisinesArray as $cuisine)
        <option >{{$cuisine}}</option>
        @endforeach
    </select>
    </div>
    <div class="mt-2">
        <label class="text-white">Diet</label>
        <select wire:model="diets" style= "width: 60%;"class="block appearance-none  bg-gray-200 border border-gray-200 text-gray-700 py-1 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state">
            @foreach($dietsArray as $cuisine)
        <option >{{$cuisine}}</option>
        @endforeach
        </select>
    </div>
    <div class=" mt-5 text-center" >
        <button wire:click="filter" class="btn btn-primary  my-1"style="width: 100%;">
            Filter
        </button>
      </div>
    
    
</div>
