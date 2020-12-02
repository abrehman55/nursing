<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       

            Category::create([
                'name' => 'Certified Nursing Assistant'
            ]); 
             Category::create([
                'name' => 'Licenced Practical Nurse'
            ]); 
             Category::create([
                'name' => 'Registered Nurse'
            ]);
              Category::create([
                'name' => 'BabySitter'
            ]);
        }
    
}
