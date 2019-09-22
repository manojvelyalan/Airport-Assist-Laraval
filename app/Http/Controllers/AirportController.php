<?php

namespace App\Http\Controllers;

use App\AirportList;
use App\VendorList;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function autocomplete(Request $request){
          $startLetter = strtolower($request->term);
            $lists = AirportList::select("airportName","iata")
                    ->where("airportName","LIKE","%{$startLetter}%")
                    ->orWhere("iata","LIKE","%{$startLetter}%")
                    ->orWhere("location","LIKE","%{$startLetter}%")
                    ->get();
            return response()->json($lists);
    }
    
}
