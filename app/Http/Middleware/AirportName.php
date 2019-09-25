<?php


namespace App\Http\Middleware;
use App\AirportServedList;

use Closure;

class AirportName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      if(isset($request->c)){
        $airportServedList = AirportServedList::airportDetails($request->c);
        if ($request->session()->has('airportCode')) {
            if($request->session()->get('airportCode') != $request->c){
              $request->session()->put('displayName',$airportServedList['displayName']);
              $request->session()->put('domainName',$airportServedList['domainName']);
              $request->session()->put('airportCode',$request->c);
              $request->session()->put('currentTime',date("Y-m-d H:i:s"));

            }
        }else{
          $request->session()->put('displayName',$airportServedList['displayName']);
          $request->session()->put('airportCode',$request->c);
          $request->session()->put('domainName',$airportServedList['domainName']);
          $request->session()->put('currentTime',date("Y-m-d H:i:s"));
          dd($request->session()->get('displayName'));
        }
      }else{
        if($request->session()->has('displayName')){
            if($request->session()->has('currentTime')){
                $dateTime = $request->session()->get('currentTime');
                $dateTimeAfterTwoHours = strtotime("+1 hour", strtotime($dateTime));
                $currentDateTime = strtotime(date("Y-m-d H:i:s"));
                if($dateTimeAfterTwoHours <  $currentDateTime){
                      $request->session()->forget(['displayName', 'airportCode', 'currentTime','domainName']);
                }

            }
        }
      }
      if(!$request->session()->has('displayName')){
          $request->session()->put('displayName','Airport Assist');
          $request->session()->put('airportCode',"");
          $request->session()->put('domainName',"murgencyairportassistance.com");
          $request->session()->put('currentTime',date("Y-m-d H:i:s"));
      }
        return $next($request);
    }
}
