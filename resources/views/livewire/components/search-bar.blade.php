<div class="input-group">
    {{-- <div class="form-outline">
      <input wire:model.debounce.300ms="searchQuery" type="text"  placeholder="Search..." class="form-control" />
    </div>
    <button id="search-button" type="button" class="btn btn-sm btn-primary">
      <i class="fas fa-search"></i>
    </button> --}}
        <input class="search form-control mr-sm-2" type="search" wire:model.debounce.300ms="searchQuery" aria-label="Search">
    
    <a type="button" class="btn btn-sm btn-primary" href="/recipes/{{$searchQuery}}"><i class="fas fa-search"></i></a>
  
  </div>