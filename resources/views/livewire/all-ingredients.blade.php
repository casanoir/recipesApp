           
            <div >
                {{-- show all alphabets --}}
                @foreach ($alphabets as $alphabet)
                    <button wire:click="getIngerdientsAlphabetically($event.target.innerText)">{{$alphabet}}</button>
                @endforeach

                {{-- Show all ingredients alphabetically --}}
                @foreach ($ingredientsAlphabetically as $ingredient)
                    {{-- Ingredient Name --}}
                    <p>{{$ingredient->name}} </p>    
                    {{-- submit-form to show ingredient details from the api with parameter: apiIngredientId --}}
                    {{-- <form action="#" wire:submit.prevent="ingredientInfo({{$ingredient->apiIngredientId}})">
                        <button >show info</button>
                    </form> --}}
                    <button wire:click="ingredientInfo({{$ingredient->apiIngredientId}})">show info</button>

                @endforeach
            </div>