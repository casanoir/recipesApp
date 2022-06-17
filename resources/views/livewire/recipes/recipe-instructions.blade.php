<!-- Get an analyzed breakdown of a recipe's instructions. Each step is enriched with the ingredients and equipment required. -->
<div>
    <h2>Recipe Instructions</h2>
    {{-- Recipe Instructions --}}
    @foreach ($recipeInstructions as $recipeInstruction)
        {{-- Instruction Name --}}
        @if ($recipeInstruction['name'])
            <h3>{{$recipeInstruction['name']}}</h3>
            <hr>
        @endif 
        
        {{-- Instruction Steps --}}
        @foreach ($recipeInstruction['steps'] as $instructionStep)
            <div class="div mt-4">
                {{-- Instruction Step Number --}}
                <h4 class="h4">Step: {{$instructionStep['number']}}</h4>
            
                {{-- Instruction Step Equipment --}}
                @if ($instructionStep['equipment'])
                    <b>Equipment: </b>
                    @foreach ($instructionStep['equipment'] as $instructionEquipment)
                        <p>{{$instructionEquipment['name']}}</p>
                    @endforeach
                @endif 
            
                {{-- Instruction Step Ingredients --}}
                @if ($instructionStep['ingredients'])
                    <b>Ingredient: </b>
                    @foreach ($instructionStep['ingredients'] as $instructionIngredient)
                        <p>{{$instructionIngredient['name']}}</p>
                    @endforeach
                @endif 

                {{-- Instruction Step Discription --}}
                <p class="mt-2">->{{$instructionStep['step']}}</p>
                
            </div>
        @endforeach
    @endforeach
</div>
