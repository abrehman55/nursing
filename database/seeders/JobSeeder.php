<?php

namespace Database\Seeders;

use App\Models\Job;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = Job::create([
            'user_id' =>1,
            'title' =>'job',
            'pay' =>12000,
            'hours' => 8,
            'category_id'=>'2'

        ]);
    }
    
}
