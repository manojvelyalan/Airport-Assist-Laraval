<?php

namespace App\Http\Controllers\Main;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Request as Req;
class PaymentController extends Controller
{
    public function show(Request $request){
      $req = false;
      if(isset($request->service_code)){
          $request = Req::where('serviceCode',$request->service_code)->first();
      }

      return view("main.payment.show",['request'=>$request]);
    }
}
