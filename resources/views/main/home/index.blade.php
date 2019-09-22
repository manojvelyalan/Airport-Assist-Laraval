@extends('layouts.main')

@section('content')
<section class="banner-header">
	<div class="four-features">
		<ul>
			<li class="feature-open flightTracker">
				<img src="{{asset('main/images/icons/icon-01.png')}}" alt="Flight Tracker">
				<img src="{{asset('main/images/icons/icon-01-red.png')}}" class="disp-none" alt="Flight Tracker">
				<span class="text-uppercase font-weight-bold ml-4" align="center">Flight Tracker <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
			</li>
			<li class="feature-open wifiLocator">
				<img src="{{asset('main/images/icons/icon-02.png')}}" alt="Airport Wifi">
				<img src="{{asset('main/images/icons/icon-02-red.png')}}" class="disp-none" alt="Airport Wifi">
				<span class="text-uppercase font-weight-bold ml-4" align="center">Airport Wifi <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
			</li>
			<li class="feature-open weather">
				<img src="{{asset('main/images/icons/icon-03.png')}}" alt="Weaher">
				<img src="{{asset('main/images/icons/icon-03-red.png')}}" class="disp-none" alt="Weaher">
				<span class="text-uppercase font-weight-bold ml-4" align="center">Weather <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
			</li>
			<li class="feature-open currencyConverter">
				<img src="{{asset('main/images/icons/icon-04.png')}}" alt="Currency Converter">
				<img src="{{asset('main/images/icons/icon-04-red.png')}}" class="disp-none" alt="Currency Converter">
				<span class="text-uppercase font-weight-bold ml-4" align="center">Currency Converter <i class="fa fa-arrow-right" aria-hidden="true"></i></span>
			</li>
		</ul>
	</div>
	<div id="home-slider-carousel" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators carousel-indicators-numbers">
			<li data-target="#home-slider-carousel" data-slide-to="0" class="active">1</li>
			<li data-target="#home-slider-carousel" data-slide-to="1">2</li>
			<li data-target="#home-slider-carousel" data-slide-to="2">3</li>
			<!--<li data-target="#home-slider-carousel" data-slide-to="3">4</li>-->
		</ol>

		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="d-block w-100">
						<a href="service"><h5 class="slider-cap brand-bg-grey text-white p-3">SPEED through Airport with <br><label class="pt-1"> {{$displayAirportName}} by <img src="{{asset('main/images/brand/murgency-logo.png')}}" alt="speed through airport"></label></h5></a>
				</div>
			</div>

			<div class="carousel-item">
				<div class="d-block w-100">
						<a href="service"><h5 class="slider-cap brand-bg-grey text-white p-3">Be a VIP at the Airport with <br><label class="pt-1">{{$displayAirportName}} by <img src="{{asset('main/images/brand/murgency-logo.png')}}" alt="vip service in airprot"></label></h5></a>
				</div>
			</div>
			<div class="carousel-item">
				<div class="d-block w-100">
						<a href="service"><h5 class="slider-cap brand-bg-grey text-white p-3">Lounge at the Airport with <br><label class="pt-1">{{$displayAirportName}}		 by <img src="{{asset('main/images/brand/murgency-logo.png')}}" alt="lounge service in airport"></label></h5></a>
				</div>
			</div>
		</div>

		<a class="carousel-control-prev" href="#home-slider-carousel" role="button" data-slide="prev">
			<span aria-hidden="true">
				<img src="{{asset('main/images/icons/prev-button.png')}}" alt="">
			</span>
			<span class="sr-only">Previous</span>
		</a>

		<a class="carousel-control-next" href="#home-slider-carousel" role="button" data-slide="next">
			<span aria-hidden="true">
				<img src="{{asset('main/images/icons/next-button.png')}}" alt="">
			</span>
			<span class="sr-only">Next</span>
		</a>

	</div>


	<div id="MUA-Band-Banner">
		<div class="MUA-Band-one">
			<div class="MUA-Band-Panel">
                            <p class="p1  text-white text-center lh-1 text-skewToNormal font-weight-bold ">{{strtoupper($displayAirportName)}} <span class="d-block mt-2 mb-2">by</span><img src="{{asset('main/images/brand/murgency-logo.png')}}" width="120" alt="MUrgency Logo" ></p>
			</div>
			<div class="MUA-band-content pt-4">
				<div class="row">
					<div class="col-md-6 pt-3">
						<p class="p1 text-white text-center font-weight-bold text-white float-right text-capitalize">World's Largest Airport <br>Assistance Network</p>
					</div>
					<div class="col-md-6 pt-3">
						<p class="p2 ml-3 font-weight-bold text-white text-skewToNormal">Serving 626 Airports <br>136 Countries</p>
					</div>
				</div>
				<div class="row pt-4">
					<div class="col-md-12">
						<hr class="w-90">
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="text-white text-center text-skewToNormal ml-3">Services at Arrival, Departure and Transit <br>that saves your time and stress</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<p class="text-uppercase ml-5 text-center text-white font-weight-bold text-skewToNormal fast-easy-hassle">Fast, Easy And Hassle Free <br> Air Travel</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-10">
						<a href="service" class="pl-4 w-50 pr-4 btn btn-lg btn-secondary text-skewToNormal text-uppercase bg-dark no-border m-auto d-block no-radius-border">book Now
						</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<!-- About MUrgency Airport Assistance -->
<section class="About-MUA pt-4 p-b-5">
<div class="container">
	<!-- <img class="d-block m-auto pb-5 img-fluid" src="images/icons/get-the-app.png" alt=""> -->
	<!-- Image Map Generated by http://www.image-map.net/ -->
	<h1 class="text-center brand-red text-uppercase brand-header mt-5 mb-5">Airport Assistance Services</h1>
	<p class="w-75 d-block m-auto text-justify">
		Ensure a comfortable, convenient & time saving journey with Airport Assistance by MUrgency. We provide a swift and hassle-free passage throughout airports worldwide and cover airport assistance and concierge services at arrival, departure, transfer and aircraft ground handling services in 195 countries. Our fast track, meet and greet, concierge, baggage assistance & lounge access services extend to VIPs, business executives, diplomats, families, elderly, and travelers with special needs.
	</p>
	<div class="play-video-wrapper mt-5">
		<a href="#" data-toggle="modal" data-target="#playVideoModal">
		<i class="fa fa-play-circle text-center d-block brand-text-red fa-3x" aria-hidden="true"></i>
		</a>
		<!-- Modal -->
		<div class="modal fade" id="playVideoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Airport Assist by MUrgency</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe width="560" height="315" src="https://www.youtube.com/embed/5eL0poEUWJ8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                        </div>
                                    </div>

                                </div>
                            </div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
</div>
</section>
<!--book now section-->
<section class="bookNow-MUA p-t-5 p-b-5 container-fluid">
<h1 class="text-center brand-red text-uppercase brand-header">Book Now</h1>
<p class="text-center">To get professional and personalize services at airports worldwide.</p>
<div class="w-75 m-auto pt-5 form-section">
	<form class="container" action="{{action('Main\HomeController@store')}}" method="post">
		@csrf
		<div class="row">
				<div class="col-md-6 mb-3">
		        <div class="input-group">
		             <input type="email" class="form-control" name="email" placeholder="Email" id="email" required>
		             <i class="fa fa-spinner m-auto d-none" area-hdden="true" id="emailSpinner"></i>
								 @error('email')
										 <span class="text-danger" role="alert">
												 <strong>{{ $message }}</strong>
										 </span>
								 @enderror
		        </div>
				</div>
				<div class="form-group col-md-6">
        		<input  class="form-control" name="email_confirmation" placeholder ="Confirm Email" id="email_confirmation"  required>
						@error('email_confirmation')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
				</div>
    </div>
    <div class="row">
        <div class="col-md-2 mb-3">
            <select class="form-control" id="titleName" name="titleName" required>
                <option value="">Select title</option>
								@foreach($titles as $title)
								<option value="{{$title->id}}">{{ucfirst($title->title)}}</option>
								@endforeach
            </select>
						@error('titleName')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
        </div>
        <div class="col-md-5 mb-3">
            <input type="text" class="form-control" name="firstName" placeholder="FirstName"  id="firstName" required>
						@error('firstName')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
        </div>
        <div class="col-md-5 mb-3">
            <input type="text" class="form-control" name="lastName" placeholder="Last Name"  id="lastName" required>
						@error('lastName')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
        </div>
		</div>
		<div class="row">
				<div class="col-md-2">
        		<input type="tel" class="form-control" id="mobile_number_country" name="mobile_number_country" placeholder="Country Code"  readonly required>
						@error('mobile_number_country')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
				</div>
				<div class="col-md-5 mb-3">
						<input type="tel" class="form-control" name="phoneNumber" placeholder="Phone number" id="phoneNumber" required>
						@error('phoneNumber')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
				</div>
				<div class="col-md-5 mb-3">
        		<input  class="form-control" name="originAirport" placeholder ="Airport where you want service" id="originAirport" required>
						@error('originAirport')
								<span class="text-danger" role="alert">
										<strong>{{ $message }}</strong>
								</span>
						@enderror
				</div>

			</div>
			<button type="submit" class="btn btn-MUA-next float-right brand-bg-red" id="submitButton">Submit</button>
		</form>
</div>
<div class="container">
	<div class="img-wrapper mt-5 pt-5">
		<img class="d-block m-auto pb-1 img-fluid" src="{{asset('main/images/icons/get-the-app.png')}}" usemap="#image-map">
		<map name="image-map">
		<area target="_blank" alt="Android Airport Assist Application" title="Android Airport Assist Application" href="https://play.google.com/store/apps/details?id=com.airport.assistance" coords="115,48,223,88" shape="rect">
			<area target="_blank" alt="IOS Airport Assist Application" title="IOS Airport Assist Application" href="https://itunes.apple.com/gb/app/airport-assist/id1256650769?mt=8" coords="229,49,339,88" shape="rect">
				</map>
			</div>
		</div>
	</section>
	<hr class="w-95">
	<!--what we offer section-->
	<section class="WWO-MUA p-t-5 p-b-5">
		<h1 class="text-center brand-red text-uppercase brand-header">What we offer</h1>
		<p class="w-70 d-block m-auto text-justify pt-5">
			We offer services that get you in and out the airport in minutes, personal concierge at any airport in the world, and any sort of assistance at the airport. These services assures you do not have to wait in long lines, feel lost at major airports, or lose out on special services that you can avail to suit your requirements. Travel the way that you deserve to—in Comfort.
		</p>
		<!-- section 01 -->
		<section class="container pt-5 mt-5 pb-6">
			<div class="row one">
				<div class="col-md-6 col-sm-12">
					<h2 class="text-uppercase brand-header">Hassle free departure</h2>
					<p>Get from the driveway to the boarding gate<br>fast and smoothly</p>
					<div class="row">
						<div class="col-md-6">
							<ul class="ls-none">
								<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Meet & Greet</li>
								<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Fast Track - Security
								</li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="ls-none">
								<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Priority Check In</li>
								<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Lounge Access</li>
							</ul>
						</div>
					</div>
					<a href="{{route('service')}}">
					<button type="submit" class="btn btn-MUA-next brand-bg-red mt-3">
					<i class="ion-android-arrow-forward" aria-hidden="true"></i>
					</button>
					</a>
				</div>
				<div class="col-md-6 col-sm-12">
					<img class="d-block m-auto wwd-img" src="{{asset('main/images/services/hassle-free-departure.png')}}"
					alt="hassle-free-departure">
				</div>
			</div>
		</section>
		<hr class="hr-dotted w-95">
		<!-- section 02 -->
		<section class="container pt-5 pb-6">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<img src="{{asset('main/images/services/expedited-arrival.png')}}	" class="wwd-img" alt="expedited-arrival">
				</div>
				<div class="col-md-6 col-sm-12">
					<div class="ml-5">
						<h2 class="text-uppercase brand-header">Expedited Arrival</h2>
						<p>Our airport concierge assist you to exit the <br> airport quickly and efficiently.</p>
						<div class="row">
							<div class="col-md-6">
								<ul class="ls-none">
									<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Fast Track - Immigration & <span class="m-l-2">Customs</span></li>
									<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Baggage Assistance
									</li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="ls-none">
									<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">VIP Concierge
									</li>
									<li class="mt-4"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Limousine Services
									</li>
								</ul>
							</div>
						</div>
						<a href="{{route('service')}}">
						<button type="submit" class="btn btn-MUA-next brand-bg-red">
						<i class="ion-android-arrow-forward" aria-hidden="true"></i>
						</button>
						</a>
					</div>
				</div>
			</div>
		</section>
		<hr class="hr-dotted w-95">
		<!-- section 03 -->
		<section class="container pt-5 pb-6">
			<div class="row one">
				<div class="col-md-6 col-sm-12">
					<h3 class="text-uppercase brand-header">smooth transfer</h3>
					<p>Never miss a flight even with a small<br>window of time for transfer</p>
					<div class="row">
						<div class="col-md-6">
							<ul class="ls-none">
								<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Gate-To-Gate Service
								</li>
								<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Expedite Transfer from
									<span class="m-l-2">Terminal</span>
								</li>
							</ul>
						</div>
						<div class="col-md-6">
							<ul class="ls-none">
								<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Lounge Access</li>
								<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">
									Meet and Assist
								</li>
							</ul>
						</div>
					</div>
					<a href="{{route('service')}}">
					<button type="submit" class="btn btn-MUA-next brand-bg-red mt-3">
					<i class="ion-android-arrow-forward" aria-hidden="true"></i>
					</button>
					</a>
				</div>
				<div class="col-md-6 col-sm-12">
					<img class="d-block m-auto wwd-img" src="{{asset('main/images/services/smooth-transfer.png')}}"
					alt="smooth-transfer">
				</div>
			</div>
		</section>
		<hr class="hr-dotted w-95">
		<!-- section 04 -->
		<section class="container pt-5 pb-6">
			<div class="row">
				<div class="col-md-6 col-sm-12">
					<img src="{{asset('main/images/services/special-needs.png')}}" class="wwd-img" alt="special-needs">
				</div>
				<div class="col-md-6 col-sm-12">
					<div>
						<h3 class="text-uppercase brand-header">Special Needs</h3>
						<p>We guarantee an efficient and tireless experience,<br>no matter your circumstance.</p>
						<div class="row">
							<div class="col-md-6">
								<ul class="ls-none">
									<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Safety Assistance
									</li>
									<li class="mt-4"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Unaccompanied Minor Service
									</li>
								</ul>
							</div>
							<div class="col-md-6">
								<ul class="ls-none">
									<li><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">Mobility and
										Health-Related <span class="m-l-2">Service</span>
									</li>
									<li class="mt-2"><img src="{{asset('main/images/icons/circle-check.png')}}" height="22" class="pr-2">
										Traveling With Infants
									</li>
								</ul>
							</div>
						</div>
						<a href="{{route('service')}}">
						<button type="submit" class="btn btn-MUA-next brand-bg-red">
						<i class="ion-android-arrow-forward" aria-hidden="true"></i>
						</button>
						</a>
					</div>
				</div>
			</div>
		</section>
	</section>
	<!--MUA download section-->
	<section class="MUA-download-section p-t-5 p-b-5">
		<div class="container">
			<h1 class="text-white text-uppercase brand-header">Download the new <br>
			<span> Airport Assist  by MUrgency App</span></h1>
			<p class="text-white  mt-4">We guarantee an efficient and pleasant experience<br>No matter which Airport you are in</p>
			<ul>
				<li><a target="_blank" href="https://play.google.com/store/apps/details?id=com.airport.assistance"><img src="{{asset('main/images/icons/android-download.png')}}" alt="Android Application"></a></li>
				<li><a target="_blank" href="https://itunes.apple.com/gb/app/airport-assist/id1256650769?mt=8"><img src="{{asset('main/images/icons/apple-download.png')}}" alt="ios Application"></a></li>
			</ul>
		</div>
	</section>
	<!-- who can avail this -->
	<section class="MUA-WCA p-t-5 p-b-5">
		<div class="container">
			<h1 class="text-center text-uppercase brand-red brand-header">Who Can Avail This <br>Services</h1>
			<p class="text-center text-justify w-70 m-auto pt-3">
				We are a one stop airport assistance and concierge service that is available to all passengers regardless of class. We provide a stress free journey to business travelers looking for a smooth experience, or individuals with disabilities who can now fly with ease.
			</p>
			<!-- sections -->
			<section class="mt-5">
				<div class="row">
					<div class="col-md-4">
						<div class="card no-border">
							<div class="card-body">
								<img src="{{asset('main/images/family-individuals.png')}}" class="d-block m-auto pb-4" alt="">
								<h5 class="text-center text-uppercase">Family/Individuals</h5>
								<p class="text-justify text-center">
									Airport assistance for regular passengers, mom traveling alone with kids, large groups, or travelers with special needs.
								</p>
								<a href="service">
								<button type="submit" class="btn m-auto d-block btn-MUA-next brand-bg-red">
								Book Now
								</button>
							</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card no-border">
							<div class="card-body">
								<img src="{{asset('main/images/business-executives-and-vips.png')}}" class="d-block m-auto pb-4" alt="">
								<h5 class="text-center text-uppercase">Business Executives and VIPs</h5>
								<p class="text-justify text-center">
									Airport services for celebrities, business travelers, sports personalities, corporate groups, diplomats or politicians.
								</p>
								<a href="service">
								<button type="submit" class="btn m-auto d-block btn-MUA-next brand-bg-red">
								Book Now
								</button>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card no-border">
							<div class="card-body">
								<img src="{{asset('main/images/jet-owners.png')}}" class="d-block m-auto pb-4" alt="">
								<h5 class="text-center text-uppercase">Jet Owners</h5>
								<p class="text-justify text-center">
									Ground handling services are available for private jets, medical flights, and charter flights.
								</p>
								<a href="service">
								<button type="submit" class="btn m-auto d-block btn-MUA-next brand-bg-red">
								Book Now
								</button>
								</a>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</section>
	<!-- testimonial section -->
	<section class="MUA-Testimonial pt-5 pb-5">
		<div class="container">
			<div class="card p-3">
				<div class="row">
					<div class="col-md-6 col-sm-12 youtube-video">
						<iframe width="100%" height="315" src="https://www.youtube.com/embed/rcHTTlk0FAA"
						frameborder="0" allowfullscreen></iframe>
						<h5>Syrian Refugee Family United By MUrgency Airport Assistance</h5>
					</div>
					<div class="col-md-6 col-sm-12">
						<div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
           @foreach($testimonials as $testimonial)
								<div class="carousel-item {{($testimonial->id==1)?'active':''}}">
									<img src="{{asset('main/images/testimonial/'.$testimonial->image)}}" class="img-circle d-block m-auto" width="100px" alt="">
									<h5 class="text-uppercase w-75 m-auto pt-5 text-center">{{$testimonial->title}}</h5>
									<p class="pt-3 pb-3 text-justify w-65 m-auto">{{$testimonial->shortDescription}}</p>
									<p class="pt-3 text-center brand-red"><b>-{{$testimonial->firstName." ".$testimonial->lastName}}</b></p>
								</div>

            @endforeach
							</div>
							<a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true">
									<img src="{{asset('main/images/icons/prev.png')}}" height="50" alt="">
								</span>
								<span class="sr-only">Previous</span>
							</a>
							<a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true">
									<img src="{{asset('main/images/icons/next.png')}}" height="50" alt="">
								</span>
								<span class="sr-only">Next</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="MUA-partnerWithUs pt-5 pb-5">
		<div class="container">
			<h1 class="text-center brand-header text-uppercase">
			Partner with Us
			</h1>
			<h6 class="text-center">Travel Agents, Corporates, Airlines and Service Provides.</h6>
			<section class="w-75 m-auto p-t-5">
				<form>
					<div class="row">
						<div class="col-md-6 mb-3">
							<input type="text" class="form-control" placeholder="Company Name" required>
						</div>
						<div class="col-md-6 mb-3">
							<input type="text" class="form-control" placeholder="Contact Person" required>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<input type="email" class="form-control" placeholder="Email Address" required>
						</div>
						<div class="col-md-6 mb-3">
							<select name="" class="form-control">
								<option value="Travel_Agent">Travel Agent</option>
								<option value="Corporates">Corporate</option>
								<option value="Airport_Assistance">Airport Assistant</option>
							</select>
						</div>
					</div>
					<button class="btn btn-secondary m-auto d-block brand-bg-red text-uppercase" type="submit">Contact US
					</button>
				</form>
			</section>
		</div>
	</section>
  @endsection
	@push('scripts')
	<script>
	$("#mobile_number_country").intlTelInput({
	    preferredCountries: ["us"],
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
	</script>
	@endpush
