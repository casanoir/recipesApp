@extends('layouts.app')
@section('content')
{{-- navbar  --}}
@include ('layouts.layout.navbar')
<!-- home Page content-->

<div class="row" style="width:100%; margin:0 ;">    
        {{-- All Ingredients Alphabetically --}}
                <div class="col-md-3 p-0" style="background-color:  rgb(0 80 64); height: 100vh; " >
                        @livewire('recipes.recipe-ingredients',['recipeId'=>$recipeId])
                </div>
        {{-- Show Ingredient details --}}
        <div class="col-md-9" style="background-color: rgb(242, 242, 242); height: 100vh;">
              
                <div class="ingredient-details">
                        <div class="tabs">
                
                            <input type="radio" id="tab1" name="tab-control" checked>
                            <input type="radio" id="tab2" name="tab-control">
                            <input type="radio" id="tab3" name="tab-control">
                            <ul>
                                <li title="Ingredient Nutrients">
                                    <label for="tab1" role="button">
                                        <span>Ingredient Nutrients</span>
                                    </label>
                                </li>
                                <li title="Recipes by Ingredient">
                                    <label for="tab2" role="button">
                                        <span>Recipes by Ingredient</span></label></li>
                                <li title="Caloric Breakdown">
                                    <label for="tab3" role="button">
                                        <span>Caloric Breakdown</span></label></li>
                               
                            </ul>
                            {{-- <svg viewBox="0 0 24 24"> --}}
                                {{-- <path d="M3,4A2,2 0 0,0 1,6V17H3A3,3 0 0,0 6,20A3,3 0 0,0 9,17H15A3,3 0 0,0 18,20A3,3 0 0,0 21,17H23V12L20,8H17V4M10,6L14,10L10,14V11H4V9H10M17,9.5H19.5L21.47,12H17M6,15.5A1.5,1.5 0 0,1 7.5,17A1.5,1.5 0 0,1 6,18.5A1.5,1.5 0 0,1 4.5,17A1.5,1.5 0 0,1 6,15.5M18,15.5A1.5,1.5 0 0,1 19.5,17A1.5,1.5 0 0,1 18,18.5A1.5,1.5 0 0,1 16.5,17A1.5,1.5 0 0,1 18,15.5Z" /> --}}
                            {{-- </svg> --}}
                            {{-- <br> --}}
                            <div class="slider">
                              <div class="indicator"></div>
                            </div>
                            <div class="content tab-content">
                              <section>
                                <h2>Recipe Info</h2>
                        @livewire('recipes.recipe-info',['recipeId'=>$recipeId])
                                
                              </section>
                              <section>
                                <h2>Recipe Instructions</h2>
                        @livewire('recipes.recipe-instructions')        
                                
                              </section>
                              <section>
                                <h2>Recipe Nutrition</h2>
                                <div style="height: 25rem;">
                                        @livewire('recipes.recipe-nutrition')

                                 </div>
                              </section>
                              
                            </div>
                        </div>
                        
                </div>
        </div>
</div>
@endsection


