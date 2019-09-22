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
          if($request->session()->has('displayName') && $request->session()->has('airportCode') && $request->session()->has('currentTime')){
              if($request->session()->get('airportCode') != $request->c){
                $request->session()->put('displayName', AirportServedList::getDispalyName($request->c));
                $request->session()->put('airportCode', $request->c);
                $request->session()->put('currentTime', date("Y-m-d H:i:s"));
              }else{
                $dateTime = $request->session()->get('currentTime');
                $dateTimeAfterTwoHours = strtotime("+1 hour", strtotime($dateTime));
                $currentDateTime = strtotime(date("Y-m-d H:i:s"));
                if($dateTimeAfterTwoHours <  $currentDateTime){
                  $request->session()->forget(['displayName', 'airportCode', 'currentTime']);
                }else{
                  $request->session()->put('displayName', 'Airport Assist');
                }
              }
          }else{
              $request->session()->put('displayName', AirportServedList::getDispalyName($request->c));
              $request->session()->put('airportCode', $request->c);
              $request->session()->put('currentTime', date("Y-m-d H:i:s"));
          }
      }
      if(!$request->session()->has('displayName')){
          $request->session()->put('displayName', 'Airport Assist');
      }

        return $next($request);
    }
}
