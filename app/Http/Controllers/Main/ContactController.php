<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact(){

      $pageTitle = "MUrgency Airport Assistance – Contact Us";
      $pageDescription = "Get in touch with our airport assistance experts through email or phone here";

      return view('main.contact.contact',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription]);
    }

    public function send(Request $request){

    }
}
