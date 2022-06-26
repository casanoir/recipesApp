<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //add 1000 ingredients to ingredient table
        $this->call(IngredientsTableSeeder::class);

        //add the teammembers for about us page to table
        $this->call(TeamMembersTableSeeder::class);

        //add mealtype names to table
        $this->call(MealTypesTableSeeder::class);
        
    }
}
