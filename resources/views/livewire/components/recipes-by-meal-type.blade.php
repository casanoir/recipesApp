<div>
@foreach ($recipesByMealType['recipes'] as $recipes)
    @livewire('components.recipe-card',['recipes' => $recipes]) 
@endforeach


</div>
