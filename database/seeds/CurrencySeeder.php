<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = File::get("database/data/Currency.json");
        $currencies = json_decode($jsonData)->results;   
        foreach($currencies as $currency){
            DB::table('currencies')->insert([
                'currencyCode'=>$currency->currencyCode,
                'currencyName'=>$currency->currencyName,
                'status'=>true
            ]);                 
        }
    }
}
