<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Request as Req;
use App\Mail\Invoice;
use App\Mail\Confirmation;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rights:22',['only'=>['invoice','sendInvoice']]);
        $this->middleware('rights:23',['only'=>['confirmation','sendConfirmation','details','showRequest']]);
    }
    public function sendInvoice(Request $request){
        request()->validate([
            'invoice'=>['required'],
        ]);
        $invoiceId = $request->invoice;
        $requestDetails = Req::where('serviceCode',$invoiceId)->first();
        Mail::to($requestDetails->email)->send(new Invoice($requestDetails));
        successFlash('Invoice mail has been sent');
        return redirect("admin/mail/invoice");
    }

    public function invoice(){
        return view('admin.mail.invoice');
    }

    public function confirmation(){

      return view('admin.mail.confirmation',['details'=>false,'serviceCode'=>'','data'=>[]]);
    }

    public function sendConfirmation(Request $request){
      request()->validate([
          'email'=>['required'],
          'cNumber'=>['required'],
          'pName'=>['required'],
          'noPassengers'=>['required'],
          'serviceLocation'=>['required'],
          'serviceType'=>['required'],
          'flightNumber'=>['required']
      ]);
      Mail::to($request->email)->send(new Confirmation($request));
      successFlash('Confirmation mail has been sent');
      return redirect("admin/mail/$request->cNumber/show");

    }

    public function details(Request $req){
        $req->validate([
          'serviceCode'=>['required'],
        ]);
        $serviceCode =  $req->serviceCode;
        return redirect("admin/mail/$serviceCode/show");
      }
      public function showRequest(Request $req){
          $serviceCode =  $req->serviceCode;
          $result = Req::where('serviceCode',$serviceCode)->first();
          $data = [];
          if($result != NULL){
            $data['email']  = $result->email;
            $data['cNumber']  = $result->serviceCode;
            $data['pName']  = ucwords($result->titleName).". ".ucwords($result->firstName)." ".ucwords($result->lastName);
            $childern = $result->children;
            $adult = $result->adults;
            $infants = $result->infants;
            $data['noPassengers'] = (int)$childern + (int)$adult + (int)$infants;
            $data['serviceLocation'] = ucwords($result->originAirport);
            $data['serviceType']  = ucwords($result->serviceType->title);
            $data['arrivalDate']  =(isset($result->arrivalDate))?date('d/m/Y',strtotime($result->arrivalDate)):"";
            $data['departureDate']  =(isset($result->departureDate))?date('d/m/Y',strtotime($result->departureDate)):"";
            $data['eta'] = $result->arrivalTime;
            $data['etd'] = $result->departureTime;
            $data['pNumber']  = $result->countryCode." ".$result->contactNumber;
            $data['flightNumber']  = $result->flightNumber;
            $details = true;
          }else{
            errorFlash('Sorry, No details available.');
            $details = false;
          }
          return view('admin.mail.confirmation',['details'=>$details,'serviceCode'=>$serviceCode,'data'=>$data]);
      }
      
}
