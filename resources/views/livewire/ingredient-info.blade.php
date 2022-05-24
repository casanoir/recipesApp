<div>
    @isset($apiIngredientId)
        <h1>{{$apiIngredientId}}</h1>
        {{-- <h3>{{$ingredientData->name}}</h3> --}}
        {{-- @foreach($apiIngredientId as $item)
            {{$item->name}}
        @endforeach --}}
    @endisset

    @empty($apiIngredientId)
        <h2>RECIPES AT HOME</h2>
    @endempty
</div>
