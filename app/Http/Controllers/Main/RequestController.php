<?php
namespace App\Http\Controllers\Main;

use App\Title;
use App\Http\Controllers\Controller;
use App\Common;
use App\ClassOfTravel;
use App\ServiceType;
use App\Request as Req;
use Illuminate\Http\Request;
use App\User;
class RequestController  extends Controller{
  public function __construct(){

    $this->middleware('airport.name');

  }
  public function attributes(){
    return [
      'email'=>'email',
      'email_confirmation'=>'confirm email',
      'titleName'=>'title',
      'firstName'=>'first name',
      'lastName'=>'last name',
      'mobile_number'=>'phone number',
      'country_code'=>'country code',
      'originAirport'=>'origin airport',
      'service_type'=>'servie type',
      'airlineName'=>'airline name',
      'flightNumber'=>'flight number',
      'arrivalDate' => 'arrival date',
      'arrivalTime'=>'arrival time',
      'pickordropAddress'=>'pick or drop address',
      'departureDate'=>'departure date',
      'departureTime'=>'departure time',
      'TAirlineName'=>'transit airline name',
      'transitNumber'=>'transit flight number',
      'adults'=>'adults',
      'classOfTravel'=>'class of travel'
    ];
  }
  public function step1(Request $request){
      $req = false;
      $full_number = "";
      $request_id = "";
      if(isset($request->r)){
          $req = Req::find($request->r);
          $full_number = "+".$req->countryCode.$req->contactNumber;
          $request_id = $req->id;
      }
      $titles = Title::where('status',true)->orderBy('title','asc')->get();
      return view('main.request.step-1',[
        'titles'=>$titles,
        'request'=>$req,
        'full_number'=>$full_number,
        'request_id'=>$request_id
      ]);
  }
  public function step1Rule(){
    return [
      'email'=>['required','email','confirmed'],
      'titleName'=>['required'],
      'firstName'=>['required'],
      'lastName'=>['required'],
      'mobile_number'=>['required','integer'],
      'country_code'=>['required'],
      'originAirport'=>['required'],
    ];
  }
  public function step2Rule(){
    return[
      'service_type'=>['required'],
      'airlineName'=>['required'],
      'flightNumber'=>['required'],
      'arrivalDate'=>['required_if:service_type,2,5,1'],
      'arrivalTime'=>['required_if:service_type,2,5,1'],
      'departureDate'=>['required_if:service_type,4,5'],
      'departureTime'=>['required_if:service_type,4,5'],
      'pickordropAddress'=>['required_if:service_type,1'],
      'TAirlineName'=>['required_if:service_type,5'],
      'transitNumber'=>['required_if:service_type,5'],
    ];
  }
  public function step3Rule(){
      return[
        'adults'=>'required_without_all:children,infants',
        'classOfTravel'=>'required'
      ];
  }
  public function postStep1(Request $request){

    $request['mobile_number'] = str_replace(' ', '', $request->mobile_number);
      Common::validator($request->all(),$this->step1Rule(),$this->attributes())->validate();

      $user = User::where('username',$request->email)->first();
      if($user == ""){
        $user = new User();
        $userid = $user->createUser($request)->id;
        $isRepeat = false;
      }else{
        $userId = $user->id;
        $isRepeat = true;
      }
      $userRequest = new Req;
      $req = $userRequest->createOrUpdateRequest($request, $userId, $isRepeat);
      return redirect("step-2/$req->id");
  }
  public function step2(Request $request, Req $req){
    $serviceTypes = ServiceType::where('status',true)->orderBy('title','asc')->get();
    return view('main.request.step-2',[
      'serviceTypes'=>$serviceTypes,
      'request'=>$req
    ]);
  }

  public function postStep2(Request $request, Req $req){
      Common::validator($request->all(),$this->step2Rule(),$this->attributes())->validate();
      $req->update([
          'service_type_id'=>$request->service_type,
          'flightNumber'=>$request->airlineName."-".$request->flightNumber,
          'arrivalDate'=>($request->arrivalDate != "")?date("Y-m-d",strtotime($request->arrivalDate)):NULL,
          'arrivalTime'=>($request->arrivalTime != "")?$request->arrivalTime:NULL,
          'departureDate'=>($request->departureDate != "")?date("Y-m-d",strtotime($request->departureDate)):NULL,
          'departureTime'=>($request->departureTime != "")?$request->departureTime:NULL,
          'pickOrDropAddress'=>($request->pickordropAddress != "")?$request->pickordropAddress:NULL,
          'isPickup'=>($request->isPickUp == "pickup")?true:false,
          'transitFlightNumber'=>$request->TAirlineName."-".$request->transitNumber,
      ]);
      return redirect("step-3/$req->id");
  }

  public function step3(Request $request, Req $req){
      $classOfTravels = ClassOfTravel::where('status',true)->get();
      return view('main.request.step-3',[
        'classOfTravels'=>$classOfTravels,
        'request'=>$req
      ]);
  }
  public function postStep3(Request $request, Req $req){
    Common::validator($request->all(),$this->step3Rule(),$this->attributes())->validate();
    $req->update([
      'adults'=>($request->adults != "")?$request->adults : NULL,
      'children'=>($request->children != "")?$request->children : NULL,
      'infants'=>($request->infants != "")?$request->infants : NULL,
      'classOfTravel_id'=>$request->classOfTravel,
      'message'=>($request->message != "")?$request->message : NULL,
    ]);
    return redirect("welcome");
  }
  public function welcome(Request $request){
    return view('main.request.welcome');
  }

}
