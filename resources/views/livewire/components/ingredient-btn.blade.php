<div>
    <button  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ingredientModal">
        {{$btnAction}}
    </button>
     
    <!--START ingredientModal-->
    <div class="modal fade" id="ingredientModal" tabindex="-1" aria-labelledby="ingredientModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="ingredientModalLabel">{{$name}}</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                @livewire('modals.add-ingredient-modal')
            </div>
        </div>
    </div>
    <!--END ingredientModal--> 

</div>
 