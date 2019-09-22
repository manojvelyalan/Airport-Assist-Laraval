<?php

use Illuminate\Database\Seeder;

class VendorPaymentModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = File::get("database/data/VendorPaymentMode.json");
        $vendorPaymentModes = json_decode($jsonData)->results;   
        foreach($vendorPaymentModes as $vendorPaymentMode){
            DB::table('vendor_payment_modes')->insert([
                'paymentTitle'=>$vendorPaymentMode->paymentTitle,
                'status'=>true
            ]);                 
        }
    }
}
