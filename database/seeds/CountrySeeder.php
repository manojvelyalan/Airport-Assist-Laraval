<?php

use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonData = File::get("database/data/Country.json");
        $countries = json_decode($jsonData)->results;   
        foreach($countries as $country){
            DB::table('countries')->insert([
                'countryCode'=>$country->countryCode,
                'title'=>$country->name,
                'code'=>$country->code,
                'status'=>true
            ]);                 
        }
    }
}
