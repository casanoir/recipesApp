           
            <div >
                @foreach ($alphabets as $alphabet)
                <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>

                @endforeach
                @foreach ($ingredientsAlphabetically as $ingredient)
                <p>{{$ingredient->name}} </p>                
                <button wire:click="ingredientsInfo({{$ingredient->apiIngredientId}})">show</button>
                @endforeach
            </div>