<div>
    <div class="recipesIng">
        @foreach ($recipeEquipments['equipment'] as $equipment)
            <div class="card">
                <div class="card__body">
                    <img src="https://spoonacular.com/cdn/equipment_250x250/{{$equipment['image']}}" alt="{{$equipment['name']}}" class="card__image">
                    <h4 class="card__title">{{$equipment['name']}}</h4>
                </div>
            </div>
        @endforeach
    </div>  
</div>