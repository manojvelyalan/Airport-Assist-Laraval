<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirportServedList extends Model
{
    public function country(){
        return $this->belongsTo(Country::class,'country_id')->orderBy('title');
    }

    public static function airportDetails($airportCode){

      $airportServed = self::where('airportCode',strtolower($airportCode))->first();
      if($airportServed != ""){
          return  ['displayName'=>$airportServed->displayName,
            'domainName'=>$airportServed->airportLink,
          ];
      }else{
          return ['displayName'=>"Airport Assist",
            'domainName'=>"murgencyairportassistance.com",
          ];
      }
    }
}
