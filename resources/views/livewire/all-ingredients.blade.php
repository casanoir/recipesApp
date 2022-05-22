           
            <div >
                @foreach ($alphabets as $alphabet)
                <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>

                @endforeach
                @foreach ($ingredientsAlphabetically as $ingredient)
                <p>{{$ingredient->name}} </p>
                {{-- <p>{{$ingredient->image}} </p>
                <p>{{$ingredient->apiIngredientId}}</p>
                <button wire:click="ingredientsInfo()">show</button> --}}
                @endforeach
            </div>