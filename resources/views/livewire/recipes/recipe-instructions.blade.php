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
            <div class="div">
                {{-- Instruction Step Number --}}
                <li>Step: {{$instructionStep['number']}}</li>
            
                {{-- Instruction Step Equipment --}}
                @if ($instructionStep['equipment'])
                    <h5>Equipment: </h5>
                    @foreach ($instructionStep['equipment'] as $instructionEquipment)
                        <p>{{$instructionEquipment['name']}}</p>
                    @endforeach
                @endif 
            
                {{-- Instruction Step Ingredients --}}
                @if ($instructionStep['ingredients'])
                    <h5>Ingredient: </h5>
                    @foreach ($instructionStep['ingredients'] as $instructionIngredient)
                        <p>{{$instructionIngredient['name']}}</p>
                    @endforeach
                @endif 

                {{-- Instruction Step Discription --}}
                <p>->{{$instructionStep['step']}}</p>
                
            </div>
        @endforeach
    @endforeach
</div>
