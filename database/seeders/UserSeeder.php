<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            User::create([
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => '1234',
                'api_token' => Str::random(60),
                'type' => 'user',
                'lat'=>'32.8',
                'long'=>'72.68',
                'location' => '32.8'.','.'72.68',
                'genre' => 1
            ]);
            
            User::create([
                'name' => 'Nurse',
                'email' => 'nurse@mail.com',
                'password' => '1234',
                'api_token' => Str::random(60),
                'type' => 'user',
                'lat'=>'32.8',
                'cat_id' => '2',
                'long'=>'72.68',
                'location' => '32.8'.','.'72.68',
                'genre' => 2

            ]);
    
     
    }
}
