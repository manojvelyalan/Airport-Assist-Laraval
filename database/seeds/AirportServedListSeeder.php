<?php

use Illuminate\Database\Seeder;
use App\Country;

class AirportServedListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $strJsonFileContents = file_get_contents("database/data/AirportServedList.json");
      $array = json_decode($strJsonFileContents, true);
          for($i=0;$i<count($array['results']);$i++){
          $country = Country::where('title',ucwords($array['results'][$i]['country']))->first();
          if($country != ""){
             $country_id = $country->id;

          }else{
             $country_id  = 1;
          }
              DB::table('airport_served_lists')->insert([
                  'country_id'=>$country_id,
                  'airportName'=>(isset($array['results'][$i]['airportName'])?$array['results'][$i]['airportName']:""),
                  'airportLink'=>(isset($array['results'][$i]['airportLink'])?$array['results'][$i]['airportLink']:""),
                  'airportCode'=>(isset($array['results'][$i]['airportCode'])?$array['results'][$i]['airportCode']:""),
                  'displayName'=>(isset($array['results'][$i]['displayName'])?$array['results'][$i]['displayName']:""),
              ]);
          }
    }
}
