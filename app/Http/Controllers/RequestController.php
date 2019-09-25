<?php

namespace App\Http\Controllers;

use App\Request as Req;
use Illuminate\Http\Request;
use App\RequestStatus;
use App\ClassOfTravel;
use App\Service;
use App\ServiceType;
use App\PaymentMethod;
use App\AirportList;
use App\Currency;
use App\VendorPaymentMode;
use App\Title;
use App\jobs\SendPaymentLink;


class RequestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('rights:14',['only'=>['index']]);
        $this->middleware('rights:15',['only'=>['changeStatus']]);
        $this->middleware('rights:16',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requests = Req::where('isDelete',false)->orderBy('created_at','desc')->get();
        $requestStatus = RequestStatus::where('status',true)->get();
        return view('admin.request.index',['requests'=>$requests,'count'=>0,'requestStatus'=>$requestStatus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Request as Req  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Req $request)
    {
        $airportName = strtolower($request->originAirport);
        $vendors = self::getVendorDetails($airportName);
        return view('admin.request.show',['request'=>$request,'vendors'=>$vendors]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request as Req $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Req $request)
    {
        if($request->serviceType == ""){
          $serviceTypeId = "";
        }else{
          $serviceTypeId = $request->serviceType->id;
        }
        $airportName = strtolower($request->originAirport);
        $classOfTravels = ClassOfTravel::where('status',true)->get();
        $serviceTypes = ServiceType::where('status',true)->get();
        $allStatus = RequestStatus::where('status',true)->get();
        $paymentMethods = PaymentMethod::where('status',true)->get();
        $vendors = self::getVendorDetails($airportName);
        $titles = Title::where('status',true)->orderBy('title','asc')->get();
        $vendorCurrencies = Currency::where('status',true)->orderBy('currencyName','asc')->get();
        $vendorPaymentModes = VendorPaymentMode::where('status',true)->orderBy('paymentTitle','asc')->get();
        return view('admin.request.edit',['request'=>$request,
                    'classOfTravels'=>$classOfTravels,
                    'serviceTypes'=>$serviceTypes,
                    'allStatus'=>$allStatus,
                    'paymentMethods'=>$paymentMethods,
                    'vendors'=>$vendors,
                    'vendorCurrencies'=>$vendorCurrencies,
                    'vendorPaymentModes'=>$vendorPaymentModes,
                    'titles'=>$titles,
                    'serviceTypeId'=>$serviceTypeId,
                ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Request as Req  $req
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, Req $request)
    {
      $mailSent = false;
      if($request->totalAmount != $req->totalAmount){
        $mailSent = true;
      }
        $request->update([
            "originAirport"=> strtolower($req->originAirport),
            "transitFlightNumber"=>$req->transitFlightNumber,
            "flightNumber"=>$req->flightNumber,
            "adults"=>$req->adults,
            "infants"=>$req->infants,
            "children"=>$req->children,
            'classOfTravel_id'=>$req->classOfTravel,
            'arrivalDate'=>date("Y-m-d",strtotime($req->arrivalDate)),
            'arrivalTime'=>$req->arrivalTime,
            'departureDate'=>($req->departureDate != "")?date("Y-m-d",strtotime($req->departureDate)):null,
            'departureTime'=>$req->departureTime,
            'service_type_id'=>$req->servicesType,
            'service_id'=>$req->services,
            'message'=>$req->message,
            'pickOrDropAddress'=>$req->pickOrDropAddress,
            'isPickup'=>($req->pickUp === 'pickup')?true:false,
            'titleName'=>$req->titleName,
            'firstName'=>$req->firstName,
            'lastName'=>$req->lastName,
            'companyName'=>$req->companyName,
            'email'=>$req->email,
            'contactNumber'=>$req->contactNumber,
            'countryCode'=>$req->countryCode,
            'request_status_id'=>$req->status,
            'adminComment'=>$req->adminComment,
            'payment_method_id'=>$req->paymentMethod,
            'invoiceRemarks'=>$req->invoiceRemarks,
            'vendor_list_id'=>$req->vendorId,
            'invoiceNumber'=>$req->invoiceNumber,
            'creditCardCharges'=>$req->creditCardCharges,
            'totalAmount'=>$req->totalAmount,
            'currency_id'=>137,
            'vendorAmount'=>$req->vendorAmount,
            'vendorCurrency_id'=>$req->vendorCurrency,
            'vendor_payment_mode_id'=>$req->paymentMode,
            'greeterContactNumber'=>$req->greeterNumber,
            'greeterName'=>$req->greeterName
        ]);

        if($mailSent){
          dispatch(new SendPaymentLink($request));
        }
        successFlash('Successfully updated the request');
        return redirect("/admin/request/".$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Request as Req $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Req $request)
    {
        $request->update([
            'isDelete'=>true
        ]);
        successFlash('Successfully deleted the request.');
        return redirect('admin/request');
    }
    /**
     * change the status of the request
     *
     * @param  \App\Request as Req $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Req $request){
        if($request->request_status_id == 1 or $request->request_status_id ==2){
            $statusId = 3;
        }else if($request->request_status_id == 3){
            $statusId = 4;
        }
        if(isset($statusId)){
            $request->update([
                'request_status_id'=>$statusId
            ]);
        }
        successFlash('Successfully changed the status.');
        return redirect('admin/request');
    }
    public static function getVendorDetails($airportName){
        $airport = AirportList::where('airportName',$airportName)->first();
        return ($airport!= "") ? $airport->vendors : [];
    }
}
