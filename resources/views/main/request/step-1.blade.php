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
                <div id="step-1">
                        <h1 class="text-center text-uppercase font-weight-bold">Personal Details</h1>
                        <P class="ml-5">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>
                        <p class="text-center"></p>
                        <form  role="form" id="step-1-form" method="post" action="{{action('Main\RequestController@postStep1')}}">
@csrf
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="{{($request == false)?old('email'):$request->email}}" >

                                    </div>
                                    @error('email')
                        								<span class="text-danger" role="alert">
                        										<strong>{{ $message }}</strong>
                        								</span>
                        						@enderror
                                </div>
                                <div class="form-group col-md-7">
                                    <input  class="form-control" name="email_confirmation" placeholder ="Confirm Email" id="email_confirmation" value="{{($request == false)?old('email_confirmation'):$request->email}}">
                                    @error('email_confirmation')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input  class="form-control" name="originAirport" placeholder ="Airport where you want service" id="originAirport" value="{{($request == false)?old('originAirport'):$request->originAirport}}">
                                    @error('originAirport')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @php
                              $titleName = ($request == false)?old('titleName'):$request->titleName;
                            @endphp
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="titleName" name="titleName">
                                      <option value="">Title</option>
                                      @foreach($titles as $title)
                                      <option value="{{$title->title}}" {{($title->title == $titleName)?"selected":""}}>{{ucfirst($title->title)}}</option>
                                      @endforeach
                                    </select>
                                    @error('titleName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="firstName" placeholder="FirstName"  id="firstName" value="{{($request == false)?old('firstName'):$request->firstName}}">
                                    @error('firstName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name"  id="lastName" value="{{($request == false)?old('lastName'):$request->lastName}}">
                                    @error('lastName')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-12">
                                    <input type="tel" class="form-control" id="mobile_number" name="mobile_number">
                                    @error('mobile_number')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    @error('country_code')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="country_code" id="country_code">
                            <input type="hidden" name="request_id" id="request_id" value="{{$request_id}}">
                            <div class="btn-group float-right" role="group">
                                <span class="text-uppercase mt-3 pr-3">step 1 of 3</span>
                                <button type="submit" id="step-1-btn" class="btn btn-MUA-next float-right brand-bg-red">Next

                                </button>
                            </div>
                        </form>
                    </div>

                        </div>
                    </div>
            </div>
        </div>
    </section>
	<!-- sect 2 tab system -->

</section>
@endsection
@push('scripts')
<script>
var input = document.querySelector("#mobile_number");
  var iti = intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    dropdownContainer: document.body,
    // excludeCountries: ["us"],
  //   formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
  //       var countryCode = (resp && resp.country) ? resp.country : "";

  //       callback(countryCode);
  //     });
  //   },
     hiddenInput: "country_code",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  //   placeholderNumberType: "MOBILE",
     preferredCountries: ['us', 'in'],
     separateDialCode: true,
    utilsScript: "{{asset('main/build/js/utils.js')}}",

  });
  @if($full_number != "")
  iti.setNumber("{{$full_number}}");
  @endIf
  $("#step-1-btn").click(function(){
      var country = iti.getSelectedCountryData();
      $("#country_code").val(country.dialCode);
  });
  $("#originAirport").autocomplete({
    minLength: 3,
    source: "/admin/airport/autocomplete",
    focus: function(event, ui) {
        $("#originAirport").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    },
    select: function(event, ui) {
        $("#originAirport").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    }
}).data("ui-autocomplete")._renderItem = function(ul, item) {
    return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.iata + "</span>" + " " + "<span class='airport-name'>" + item.airportName + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
};
setTimeout(function() {
       $(".text-danger").hide('blind', {}, 500)
   }, 2000);
</script>
@endpush
