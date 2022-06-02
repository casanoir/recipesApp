<div>
    <div class="modal-body">
        {{-- possible Units --}}
        <select class="form-select px-4 py-3 w-full rounded" wire:model="unit">
            <option>Select Unit</option>
            @foreach($units as $unit)
            <option value="{{$unit}}">{{$unit}}</option>
            @endforeach
        </select>

        {{-- Amount --}}
        <div class="input-group-prepend mt-3">
            <span class="input-group-text">Amount</span>
            <input class="form-select px-4 py-3 w-full rounded" aria-label="Amount" type="number" wire:model.debounce.500ms="amount">
        </div>
        
        {{-- Date --}}
        <div class="input-group-prepend mt-3">
            <span class="input-group-text">Date</span>
            <input class="form-select px-4 py-3 w-full rounded" aria-label="Date"type="date" wire:model="date">
        </div>
        
    </div>
    <div class="modal-footer">
        <button type="button" wire:click="submit"  class="btn btn-primary" >Save</button>
    </div>
</div>
