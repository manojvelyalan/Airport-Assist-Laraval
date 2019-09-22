<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportListsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        $strJsonFileContents = file_get_contents("database/data/AirportList.json");
        $array = json_decode($strJsonFileContents, true);
            for($i=0;$i<count($array['results']);$i++)
                DB::table('airport_lists')->insert([
                    'location'=>(isset($array['results'][$i]['location'])?$array['results'][$i]['location']:""),
                    'country'=>(isset($array['results'][$i]['country'])?$array['results'][$i]['country']:""),
                    'iata'=>(isset($array['results'][$i]['iata'])?$array['results'][$i]['iata']:""),
                    'airportName'=>(isset($array['results'][$i]['airportName'])?$array['results'][$i]['airportName']:""),
                    'status'=>true
                ]);
    }
}

