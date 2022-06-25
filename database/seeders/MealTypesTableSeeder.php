<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MealType;

class MealTypesTableSeeder extends Seeder
{
    public function run()
    {
        MealType::truncate();

        $mealTypes=[
                    
                        ['name'=>'main course'],
                        ['name'=>'side dish'],
                        ['name'=>'dessert'],
                        ['name'=>'appetizer'],
                        ['name'=>'salad'],
                        ['name'=>'bread'],
                        ['name'=>'breakfast'],
                        ['name'=>'soup'],
                        ['name'=>'beverage'],
                        ['name'=>'sauce'],
                        ['name'=>'marinade'],
                        ['name'=>'fingerfood'],
                        ['name'=>'snack'],
                        ['name'=>'drink']
        ];

            MealType::insert($mealTypes);
    }
}
