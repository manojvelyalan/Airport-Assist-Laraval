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
              <div id="step-2" >
                      <h1 class="text-center text-uppercase font-weight-bold  pb-2">Flight Details</h1>
                      <P class="ml-5">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>
                      <p class="text-center"></p>
                      <div class="btn-group d-block text-center container" role="group">
                          <form class="pb-1 " id="step-2-form">
                              <div class="alert alert-danger d-none" id="mainError"></div>
                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <select name="mainService" id="mainService" class="form-control">
                                            <option value="">Select Service Type</option>
                                              @foreach($serviceTypes as $serviceType)
                                                <option value="{{$serviceType->id}}" >{{ucwords($serviceType->title)}}</option>
                                              @endforeach
                                          </select>
                                          <span class="text-danger d-none" id="mainServiceError"></span>
                                      </div>

                                  </div>
                                  <div class="row d-none" id="pickDropRadio">
                                      <div class="col-md-12">
                                          <div class="card mb-3 pt-2 pb-2 bs-2">
                                              <div class="row">
                                                  <div class="col-md-6 form-group">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="pickUp" value="pickup" name="isPickUp" checked="true"/>
                                                              Pick up
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="drop" value="drop" name="isPickUp" />
                                                              Drop
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row d-none" id="pickDropAddress">
                                      <div class="form-group col-md-12">
                                              <textarea name="pickordropAddress" class="form-control" placeholder="Pick Up / Drop Address" rows="5" id="pickordropAddress"></textarea>
                                       </div>

                                  </div>
                                  <div class="form-row">
                                      <div class="input-group form-group col-md-6" >
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="airlineName" name="airlineName">

                                           <input type="text" class="form-control" placeholder="Arrival flight no." id="flightNumber" name="flightNumber" onkeypress="return isNumberKey(event)">

                                      </div>

                                      <div class="input-group form-group col-md-6 " id="transit">
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="TAirlineName"  disabled name="TAirlineName">

                                          <input type="text" class="form-control" placeholder="Transit flight no." id="transitNumber"  disabled name="transitNumber" onkeypress="return isNumberKey(event)">

                                      </div>

                                  </div>
                                  <div class="form-row" id="arrival">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalDate" class="form-control" placeholder="Arrival Date" name="arrivalDate">
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalTime" class="form-control" placeholder="Arrival Time" name="arrivalTime">
                                           </div>
                                  </div>
                                  <div class="form-row d-none" id="departure">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureDate" class="form-control" placeholder="Departure Date" name="departureDate">
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureTime" class="form-control" placeholder="Departure Time" name="departureTime">
                                            </div>
                                  </div>
                                  <div class="btn-group float-right" role="group">
                                    <a href="/step-1?r={{$request->id}}" class="btn btn-MUA-next float-right brand-bg-red ">Previous</a>

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
