
            {{-- @livewire('components.ingredient-btn',[
                'apiIngredientId'=>$apiIngredientId
            ])
        --}}
<div>
    @isset($apiIngredientId)
        @if ($btnAction == 'add')
            @livewire('components.ingredient-btn',[
                                        'btnAction'=>'add',
                                        ])
        @else
            @livewire('components.ingredient-btn',[
                                        'btnAction'=>'edit',
                                        ])
        @endif
        
        @livewire('components.ingredient-info',['apiIngredientId'=>$apiIngredientId])
    @endisset
    @empty($apiIngredientId)
        <h3 class="mt-3" style="text-align: center">The 1,000 most frequently used ingredients </h3>
    @endempty
</div>