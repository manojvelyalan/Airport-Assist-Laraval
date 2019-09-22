<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;
class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create([
            'title'=>'emarates NBD',
            'status'=>true
        ]);

        PaymentMethod::create([
            'title'=>'bank of america',
            'status'=>true
        ]);
    }
}
