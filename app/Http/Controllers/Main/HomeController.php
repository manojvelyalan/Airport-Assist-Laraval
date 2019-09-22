<?php

namespace App\Http\Controllers\Main;

use App\Title;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Testimonial;
use App\AirportServedList;
use App\Common;
class HomeController extends Controller
{
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
        'mobile_number_country'=>'country code',
        'phoneNumber'=>'phone number',
        'originAirport'=>'origin airport'
      ];
    }

    public function index(Request $request){
        $titles = Title::where('status',true)->get();
        $testimonials = Testimonial::all();
        $pageTitle = "Airport Assistance | Meet &amp; Assist| Fast Track | Ground Handling Across 626 Airports";
        $pageDescription ="Get all airport related services ranging from airport assistance, Meet &amp; Assist, Ramp
          Handling, Baggage handling, Visa VIP, Crew maintenance at competitive rates";
        return view('main.home.index',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'displayAirportName'=>$request->session()->get('displayName'),'testimonials'=>$testimonials,'titles'=>$titles]);
    }


    public function service(Request $request){
        $pageTitle = "Airport Assistance Services | Meet & Assist | Baggage Assistance |VIP| Airport Limo |Service for Disabled";
        $pageDescription = "We provide airport assistance services worldwide including meet & greet service, special needs for disabled, Non-English speaking passengers or when travelling with small kids. Ask us for any airport assistance service at 625 airports across 195 countries.";
        return view('main.home.service',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'displayAirportName'=>$request->session()->get('displayName')]);
    }

    public function book(){

        return view('main.home.book');
    }
    public function served(Request $request){
      $countryId = "";
      $countryLists  = AirportServedList::All()->unique('country_id');
      foreach($countryLists as $countryList){
        $countries[$countryList->country_id] = $countryList->country->title;
      }
      asort($countries);
    if($request->filled('cd')){
        $airportServedLists = AirportServedList::where('country_id',$request->cd)->orderBy('airportName')->get();
        $countryId = $request->cd;
      }else{
        $airportServedLists = AirportServedList::orderBy('airportName')->get();
      }

      $pageTitle = "Airport Assistance Worldwide | Services in 625 Airports | Dubai | London | Hong Kong | Ground handling globally";
      $pageDescription = "Be it London, Dubai, Hong Kong, or Australia, we provide airport assistance & ground handling services in 625 airports in 195 countries across the globe. Find your city here.";
      $featuredCity = ['atlanta','brisbane','chennai','denver','dhaka','dubai','frankfurt','heathrow','jeddah','johannesburg','melbourne','mumbai','munich','muscat','paris','singapore'];
      return view('main.home.served',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'displayAirportName'=>$request->session()->get('displayName'),'airportServedLists'=>$airportServedLists,'countryLists'=>$countries,'featuredCity'=>$featuredCity,'countryId'=>$countryId]);
    }
    public function faq(Request $request){
      $pageTitle = "Airport Services – Frequently Asked Questions";
      $pageDescription = "Got questions related to Airport assistance or ground handling service? Check out our FAQs here";
      return view('main.home.faq',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription,'displayAirportName'=>$request->session()->get('displayName')]);
    }
    public function legal(Request $request){
        $pageTitle = "Airport Assistance Worldwide | Services in 625 Airports | Dubai | London | Hong Kong | Ground handling globally";
        $pageDescription = "Be it London, Dubai, Hong Kong, or Australia, we provide airport assistance & ground handling services in 625 airports in 195 countries across the globe. Find your city here.";
        return view('main.home.legal',['pageTitle'=>$pageTitle,'pageDescription'=>$pageDescription]);
    }

    public function store(Request $request){
        $rules = [
          'email'=>['required','email','confirmed'],
          'titleName'=>['required'],
          'firstName'=>['required'],
          'lastName'=>['required'],
          'mobile_number_country'=>['required'],
          'phoneNumber'=>['required'],
          'originAirport'=>['required'],
        ];
        Common::validator($request->all(),$rules,$this->attributes())->validate();

    }

}
