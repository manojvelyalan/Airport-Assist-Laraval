<?php

namespace App\Http\Controllers\Main;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Common;
class MailController extends Controller
{
   public function attributes(){

       return [
         'fullName'=>'full name',
         'email'=>'email',
         'mobile_number_country'=>'country code',
         'phoneNumber'=>'mobile number',
         'subject'=>'subject',
         'message'=>'message'
       ];

   }
   public function rules(){

     return [
       'fullName'=>['required'],
       'email'=>['required','email'],
       'mobile_number_country'=>['required'],
       'phoneNumber'=>['required','numeric','min:8'],
       'subject'=>['required'],
       'message'=>['required'],
     ];

   }
    public function contact_send(Request $request){

        Common::validator($request->all(),$this->rules(),$this->attributes())->validate();

        Mail::to(env('ADMIN_ADDRESS'))->send(new Contact($request));
        successFlash('Message has been sent successfully. We will contact you soon.');
        return redirect("contact");
    }
}
