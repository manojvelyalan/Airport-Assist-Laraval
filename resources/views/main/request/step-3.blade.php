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
              <div id="step-3">
                                      <h1 class="text-center text-uppercase font-weight-bold">Traveller Details</h1>
                                      <p class="text-center"></p>
                                      <form class="pb-5 ml-4" id="step-3-form">
                                          <div class="alert alert-danger d-none" id="main-2-Error"></div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                          <input type="text" name="adults" placeholder="Adults" id="adults" class="form-control">
                                                          <span class="text-danger d-none" id="adultsError"></span>
                                                      </div>
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                              <input type="text" name="children" placeholder="Children(2-12 years)" id="children" class="form-control">
                                                              <span class="text-danger d-none" id="childrenError"></span>
                                                      </div>
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                              <input type="text" name="infants" placeholder="Infants(0-2 years)" id="infants" class="form-control">
                                                              <span class="text-danger d-none" id="infantsError"></span>
                                                      </div>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                          <select name="classOfTravel" class="form-control" id="classOfTravel">
                                                            <option value="">Select class of travel</option>
                                                              @foreach($classOfTravels as $classOfTravel)
                                                                <option value="{{$classOfTravel->id}}">{{ucwords($classOfTravel->title)}}</option>
                                                              @endforeach
                                                          </select>
                                                          <span class="text-danger d-none" id="classOfTravelError"></span>
                                                      </div>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                              <textarea name="message" rows="5" class="form-control" placeholder="Message" id="message"></textarea>
                                                      </div>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-6 col-sm-12 col-12">
                                                              <div class="input-group">
                                                                      <span class="input-group-addon">
                                                                          <input  id="ta" name="checkedAsMember" value="1" type="checkbox">
                                                                          <span class="pl-2">I am a member travel agent</span>
                                                                      </span>
                                                              </div>
                                                      </div>
                                                      <div class="form-group col-md-6 col-sm-12 col-12">
                                                              <div class="input-group">
                                                                      <span class="input-group-addon">
                                                                              <input  id="co" name="checkedAsMember" value="1" type="checkbox" >
                                                                              <span class="pl-2">corporate agent</span>
                                                                      </span>
                                                              </div>
                                                      </div>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                              <input type="text" class="form-control" placeholder="Enter Your MUrgency Network Code" id="agentId" name="agentId">
                                                              <span class="text-danger d-none" id="agentIdError"></span>
                                                      </div>
                                              </div>
                                              <div class="btn-group float-right" role="group">
                                                      <button type="button" id="step-3-btn-back" class="btn btn-MUA-next float-right brand-bg-red">
                                                      Previous
                                                      </button>
                                                      <span class="text-uppercase mt-3 pl-3 pr-3">Done</span>
                                                      <button type="button" id="step-3-btn" class="btn btn-MUA-next float-right brand-bg-red">
                                                          Submit
                                                      <i  id="button-3-FA"></i>
                                                      </button>
                                              </div>
                                      </form>
                              </div>

            </div>
        </div>
    </section>
	<!-- sect 2 tab system -->

</section>
@endsection
