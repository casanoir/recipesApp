           
            <div >
                @foreach ($alphabets as $alphabet)
                <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>

                @endforeach
                @foreach ($ingredientsAlphabetically as $ingredient)
                <p>{{$ingredient->name}} </p>                
                <form action="#" wire:submit.prevent="ingredientsInfo({{$ingredient->apiIngredientId}})">
                    <button>show info</button>
                </form>
                
                @endforeach
            </div>