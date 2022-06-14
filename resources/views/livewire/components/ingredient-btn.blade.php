<div>
    @if($btnAction == 'add')
    <button  type="button" class="btn-pdf" data-bs-toggle="modal" data-bs-target="#ingredientModal">
        Add it
    </button>
        <!--START ingredientModal-->
        <div class="modal fade" id="ingredientModal" tabindex="-1" aria-labelledby="ingredientModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="ingredientModalLabel">{{$ingredientName}}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @livewire('modals.add-ingredient-modal')
                </div>
            </div>
        </div>
        <!--END ingredientModal--> 
    @else
    <button  type="button" class="btn-pdf" data-bs-toggle="modal" data-bs-target="#ingredientModal">
        Edit
    </button>
        <!--START ingredientModal-->
        <div class="modal fade" id="ingredientModal" tabindex="-1" aria-labelledby="ingredientModalLabel" aria-hidden="true" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="ingredientModalLabel">{{$ingredientName}}</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    @livewire('modals.edit-ingredient-modal')                  
                </div>
            </div>
        </div>
        <!--END ingredientModal--> 
    @endif
</div>
 