@extends('layouts.common')
@section('content')
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-envelope-o"></i> Send Confirmation Mail</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
              <form id="createAction" action="{{ action('MailController@details') }}" method="post">
                  @csrf
                <div class="tile pb-5">
                  @if(session('error'))
                      <div class="alert alert-danger">{{session('error')}}</div>
                  @endif
                  @if(session('success'))
                      <div class="alert alert-success">{{session('success')}}</div>
                  @endif
                  <div class="form-group row">

                          <label for="lblRequestId" class="col-md-3 col-form-label text-md-right">{{ __('Request Id') }}</label>

                          <div class="col-md-9">
                              <input id="serviceCode" type="text" class="form-control @error('serviceCode') is-invalid @enderror" name="serviceCode"  autocomplete="serviceCode" placeholder="Enter Service Code" value="{{$serviceCode}}">

                              @error('serviceCode')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                    </div>
                      <button name="submit" type="submit" class="btn btn-danger float-right" id="submit">Submit</button>

                  </div>

                </form>
                @if($details)
                <div class="tile pb-5" id="reqDetails">
                    <form id="createAction" action="{{ action('MailController@sendConfirmation') }}" method="post">
                        @csrf
                        <div class="row mt-4">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{$data['email']}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('cNumber') is-invalid @enderror" name="cNumber" id="cNumber"
                                       placeholder="Confirmation Number" value="{{$data['cNumber']}}">

                                @error('cNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('pName') is-invalid @enderror" name="pName" id="pName"
                                       placeholder="Passenger's Name" value="{{$data['pName']}}" >

                                @error('pName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('noPassengers') is-invalid @enderror" name="noPassengers" id="noPassengers"
                                       placeholder="Number Of Passengers" value="{{$data['noPassengers']}}">

                                @error('noPassengers')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('serviceLocation') is-invalid @enderror" name="serviceLocation" id="serviceLocation"
                                        placeholder="Service Location (Airport)" value="{{$data['serviceLocation']}}">

                                @error('serviceLocation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('serviceType') is-invalid @enderror" name="serviceType" placeholder="Service Type" id="serviceType" value="{{$data['serviceType']}}">

                                @error('serviceType')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="arrivalDate" id="arrivalDate"
                                       placeholder="Arrival Date" value={{$data['arrivalDate']}}>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="eta" placeholder="ETA" id="eta" value={{$data['eta']}}>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="departureDate" id="departureDate"
                                       placeholder="Departure Date" value={{$data['departureDate']}}>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="etd" placeholder="ETD " id="etd" value={{$data['etd']}}>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control @error('flightNumber') is-invalid @enderror" name="flightNumber" placeholder="Flight Number" id="flightNumber" value={{$data['flightNumber']}}>

                                @error('flightNumber')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="pNumber"
                                       placeholder="Passenger's Contact Number"  id="pNumber" value="{{$data['pNumber']}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="dNumber"
                                       placeholder="Driver's Contact Number"  id="dNumber">
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="nameSign" id="nameSign"
                                       placeholder="Name Sign">
                            </div>

                            <div class="col-md-12 form-group">
                                <textarea name='remarks' class='form-control' placeholder="Remarks If Any" id="remarks"></textarea>
                            </div>
                            </div>
                            <button type="submit" name="send" class="btn btn-danger float-right" id="btnConfirmMail">Send Confirmation Mail</button>


                    </form>
                </div>
                @endif
            </div>
        </div>
    </main>
</section>
@endsection
