<form wire:submit.prevent="editUser">

    <div class="modal-body">


           {{-- firstName --}}
        <div class="input-group-prepend mt-3">
            <span class="input-group-text">First name</span>
            <input class="form-select px-4 py-3 w-full rounded" aria-label="firstName" type="text" wire:model.debounce.500ms="firstName" value="$firstName">
        </div>
            {{-- end firstName --}}
          
          
          {{-- lastname --}}
        <div class="input-group-prepend mt-3">
            <span class="input-group-text">Last name</span>
            <input class="form-select px-4 py-3 w-full rounded" aria-label="lastName" type="text" wire:model.debounce.500ms="lastName" value="$lastName">
        </div>
            {{-- end lastname --}}
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
        <button type="button" wire:click.prevent="editUser($user_id)" data-dismiss="modal" class="btn btn-primary close-modal">Save</button>
    </div>
</form>