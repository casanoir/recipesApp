<div class="input-group">
  <div class="form-outline">
    <input id="search-input" type="search" placeholder="Search..." wire:model.debounce.300ms="searchQuery"/>
  </div>
  <a id="search-button" type="button" class="btn btn-primary" href="/recipes/{{$searchQuery}}">
    <i class="fas fa-search"></i>
  </a>
</div>