@extends('layouts.main')

@section('content')

<section class="service-form-wrapper">

			<!-- sect 1 banner image -->
<section class="banner-header">
    <div id="home-slider-carousel" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner" id="service">
                <div class="carousel-item active">
                    <div class="d-block w-100" ></div>
                </div>

            </div>

    </div>
<div id="MUA-Band-Banner">
    <div class="MUA-Band-one-White">
        <div class="text-skewToNormal">
            <div class="form-wrapper">
              @php
                $service_type = ($request->service_type_id == "")?old('service_type'):$request->service_type_id;
                if($request->flightNumber != ""){
                  $flightArray = explode("-",$request->flightNumber);
                  $flightNumber = $flightArray[1];
                  $airlineName = $flightArray[0];
                }else{
                  $flightNumber = old('flightNumber');
                  $airlineName = old('airlineName');
                }
                if($request->transitFlightNumber != ""){
                  $tflightArray = explode("-",$request->transitFlightNumber);
                  $transitNumber = $tflightArray[1];
                  $tairlineName = $tflightArray[0];
                }else{
                  $transitNumber = old('transitNumber');
                  $tairlineName = old('TAirlineName');
                }
                $isPick = true;
                if($request->isPickup == true || old('isPickUp') == "pickup"){
                  $isPick = true;
                }else{
                  $isPick = false;
                }
              @endphp
              <div id="step-2" >
                      <h1 class="text-center text-uppercase font-weight-bold  pb-2">Flight Details</h1>
                      <P class="ml-1 {{($service_type == 1)?'d-none':''}}" id="details">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>

                      <p class="text-center"></p>
                      <div class="btn-group d-block text-center container" role="group">

                          <form class="pb-1 " id="step-2-form" action="{{action('Main\RequestController@postStep2',[$request->id])}}" method="post">
                            @csrf
                            @method('PUT')

                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <select name="service_type" id="service_type" class="form-control">
                                            <option value="">Select Service Type</option>
                                              @foreach($serviceTypes as $serviceType)
                                                <option value="{{$serviceType->id}}" {{($service_type == $serviceType->id)?"selected":""}}>{{ucwords($serviceType->title)}}</option>
                                              @endforeach
                                          </select>
                                          @error('service_type')
                              								<span class="text-danger" role="alert">
                              										{{ $message }}
                              								</span>
                              						@enderror
                                      </div>

                                  </div>
                                  <div id="lim" class="{{($service_type != 1)?'d-none':''}}" >
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="card mb-3 pt-2 bs-2">
                                              <div class="row">
                                                  <div class="col-md-6 form-group">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="pickUp" value="pickup" name="isPickUp" {{($isPick)?'checked':''}} />
                                                              Pick up
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="drop" value="drop" name="isPickUp" {{(!$isPick)?'checked':''}} />
                                                              Drop
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-12">
                                              <textarea name="pickordropAddress" class="form-control" placeholder="Pick Up / Drop Address" rows="2" id="pickordropAddress">{{($request->pickOrDropAddress != "")?$request->pickOrDropAddress:old('pickordropAddress')}}</textarea>
                                              @error('pickordropAddress')
                                                 <span class="text-danger" role="alert">
                                                    {{ $message }}
                                                 </span>
                                              @enderror
                                       </div>

                                  </div>
                                </div>
                                  <div class="form-row">
                                      <div class="input-group form-group col-md-6" >
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="airlineName" name="airlineName" value="{{$airlineName}}">

                                           <input type="text" class="form-control" placeholder="{{($service_type == 4)?'Departure flight no.':'Arrival flight no.'}}" id="flightNumber" name="flightNumber" onkeypress="return isNumberKey(event)" value="{{$flightNumber}}">

                                      </div>

                                      <div class="input-group form-group col-md-6 " id="transit">
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="TAirlineName" {{($service_type != 5)?'disabled':''}}  name="TAirlineName" value="{{$tairlineName}}">

                                          <input type="text" class="form-control" placeholder="Transit flight no." id="transitNumber"  {{($service_type != 5)?'disabled':''}} name="transitNumber" onkeypress="return isNumberKey(event)" value="{{$transitNumber}}">

                                      </div>
                                      @error('airlineName')
                                         <span class="text-danger" role="alert">
                                            {{ $message }}
                                         </span>
                                      @enderror
                                      @error('flightNumber')
                                        <span class="text-danger ml-4" role="alert">
                                            {{ $message }}
                                        </span>
                                      @enderror
                                      @error('TAirlineName')
                                         <span class="text-danger" role="alert">
                                            {{ $message }}
                                         </span>
                                      @enderror
                                      @error('transitNumber')
                                        <span class="text-danger ml-4" role="alert">
                                            {{ $message }}
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-row {{($service_type == 4)?'d-none':''}}" id="arrival">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalDate" class="form-control" placeholder="Arrival Date" name="arrivalDate" value="{{($request->arrivalDate != "")?date('m/d/Y',strtotime($request->arrivalDate)):old('arrivalDate')}}">
                                          @error('arrivalDate')
                                            <span class="text-danger" role="alert">
                                              {{ $message }}
                                            </span>
                                          @enderror
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalTime" class="form-control" placeholder="Arrival Time" name="arrivalTime"  value="{{($request->arrivalTime != "")?$request->arrivalTime:old('arrivalTime')}}">
                                          @error('arrivalTime')
                                            <span class="text-danger" role="alert">
                                              {{ $message }}
                                            </span>
                                          @enderror
                                           </div>
                                  </div>
                                  <div class="form-row {{(!in_array($service_type,[4,5]))?'d-none':''}}" id="departure">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureDate" class="form-control" placeholder="Departure Date" name="departureDate" value="{{($request->departureDate != "")?date('m/d/Y',strtotime($request->departureDate)):old('departureDate')}}">
                                          @error('departureDate')
                                            <span class="text-danger" role="alert">
                                              {{ $message }}
                                            </span>
                                          @enderror
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureTime" class="form-control" placeholder="Departure Time" name="departureTime" value="{{($request->departureTime != "")?$request->departureTime:old('departureTime')}}">
                                          @error('departureTime')
                                            <span class="text-danger" role="alert">
                                              {{ $message }}
                                            </span>
                                          @enderror
                                      </div>
                                  </div>
                                  <div class="btn-group float-right" role="group">
                                    <a href="/service?r={{$request->id}}" class="btn btn-MUA-next float-right brand-bg-red ">Previous</a>

                                      <span class="text-uppercase mt-3 pr-3 pl-3">step 2 of 3</span>
                                      <button type="submit" id="step-2-btn" class="btn btn-MUA-next float-right brand-bg-red">Next

                                      </button>
                                  </div>
                          </form>
                      </div>
                  </div>

            </div>
        </div>
    </section>
	<!-- sect 2 tab system -->

</section>
@endsection
@push('scripts')
  <script src="{{asset('main/js/common.js')}}" type="text/javascript"></script>
  <script>
  setTimeout(function() {
         $(".text-danger").hide('blind', {}, 500)
     }, 2000);
  </script>
@endpush
