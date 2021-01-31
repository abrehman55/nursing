<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call(CategorySeeder::class);

        $this->call(UserSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(StripeSeeder::class);
    }
}
