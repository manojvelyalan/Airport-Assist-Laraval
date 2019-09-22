<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
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
        'greeterName'
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
    
}
