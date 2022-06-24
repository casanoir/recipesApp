<div>
    <div class="recipesIng">
        @foreach ($recipeEquipments['equipment'] as $equipment)
            <div class="card">
                <div class="card__body px-2">
                    <img src="https://spoonacular.com/cdn/equipment_250x250/{{$equipment['image']}}" alt="{{$equipment['name']}}" class="card__image mt-2">
                    <hr class="mt-2"/>
                    <h4 class="card__title">{{$equipment['name']}}</h4>
                </div>
            </div>
        @endforeach
    </div>  
</div>