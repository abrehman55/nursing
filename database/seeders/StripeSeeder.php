<?php

namespace Database\Seeders;

use App\Models\StripeKey;
use Illuminate\Database\Seeder;

class StripeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StripeKey::create([
            'public_key' => 'pk_test_51GxWFUBWndAApmnXy1V3eBe1Up1u3DpEe18J1YQTXzH3lX6aGqp2x37wbW9490pxcOEonsT68gn9fAIgk7z13A7Z00JdJA6Dqj',
            'secret_key' => 'sk_test_51GxWFUBWndAApmnXy7J7vJJsal8JDPTzELLVngyJJdZrhsDhPuAj0GA1jkcagcP4INiS33IuTNbD2n2Q324c78Qy00Cr7xKFsd',
        ]); 
    }
}
