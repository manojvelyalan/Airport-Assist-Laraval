<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlightController extends Controller
{
    public function search(Request $request){
      $startLetter = strtolower($request->term);
      $str = file_get_contents('../database/data/AirlineList.json');
       $json_str = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $str);
       $json_data = json_decode($json_str, true );
       $jsonArr = $json_data['airlines'];
       foreach( $jsonArr as $value){
           if ( strpos(strtolower($value['fs']),$startLetter) !== false || strpos(strtolower($value['name']),$startLetter) !== false ){
               $data[] = array( 'label' => $value['name']."(".$value['fs'].")" , 'value' => $value['fs'] );
           }
       }
       return(json_encode($data));
    }
}
