<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Jobs\SendAdminRequestSuccessMail;
use App\Jobs\UserRequestSuccessMail;
class Request extends Model

{
    protected $fillable = [
        'request_status_id',
        'isDelete',
        'originAirport',
        'transitFlightNumber',
        'flightNumber',
        'adults',
        'infants',
        'children',
        'classOfTravel_id',
        'arrivalDate',
        'arrivalTime',
        'departureDate',
        'departureTime',
        'service_type_id',
        'service_id',
        'message',
        'pickOrDropAddress',
        'isPickup',
        'titleName',
        'firstName',
        'lastName',
        'companyName',
        'email',
        'contactNumber',
        'countryCode',
        'request_status_id',
        'adminComment',
        'payment_method_id',
        'invoiceRemarks',
        'vendor_list_id',
        'invoiceNumber',
        'creditCardCharges',
        'totalAmount',
        'currency_id',
        'vendorAmount',
        'vendorCurrency_id',
        'vendor_payment_mode_id',
        'greeterContactNumber',
        'greeterName',
        'serviceCode',
        'domainName',
        'isRepeat',
        'user_id'
    ];
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function serviceType(){
        return $this->belongsTo(ServiceType::class);
    }
    public function requestStatus(){
        return $this->belongsTo(RequestStatus::class);
    }
    public function respondedUser(){
        return $this->belongsTo(User::class,'respondedBy');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function vendor(){
        return $this->belongsTo(VendorList::class,'vendor_list_id');
    }
    public function vendorCurrency(){
        return $this->belongsTo(Currency::class,'vendorCurrency_id');
    }
    public function paymentdetails(){
        return $this->belongsTo(PaymentDetail::class,'paymentDetails_id');
    }
    public function classoftravel(){
        return $this->belongsTo(ClassOfTravel::class,'classOfTravel_id');
    }
    public function vendorPaymentMode(){
        return $this->belongsTo(VendorPaymentMode::class,'vendor_payment_mode_id');
    }
    

    public function createOrUpdateRequest($request, $userId, $isRepeat){
      if($request->request_id != ""){
        $req = self::find($request->request_id);

            $req->update([
            'titleName'=>$request->titleName,
            'firstName'=>strtolower($request->firstName),
            'lastName'=>strtolower($request->lastName),
            'email'=>strtolower($request->email),
            'countryCode'=>$request->country_code,
            'contactNumber'=>$request->mobile_number,
            'originAirport'=>strtolower($request->originAirport),
            'user_id'=>$userId,
          ]);
          return $req;
        }else{
           $req =  self::create([
            'serviceCode'=>Str::random(10),
            'titleName'=>$request->titleName,
            'firstName'=>strtolower($request->firstName),
            'lastName'=>strtolower($request->lastName),
            'email'=>strtolower($request->email),
            'countryCode'=>$request->country_code,
            'contactNumber'=>$request->mobile_number,
            'request_status_id'=>1,
            'isDelete'=>false,
            'originAirport'=>strtolower($request->originAirport),
            'user_id'=>$userId,
            'domainName'=>$request->session()->get('domainName'),
            'isRepeat'=>$isRepeat
          ]);
            dispatch(new SendAdminRequestSuccessMail($req));
            dispatch(new UserRequestSuccessMail($req));
            return $req;
      }

    }

}
