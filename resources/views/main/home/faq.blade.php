@extends('layouts.main')

@section('content')

<section class="faq-main-section">

    <!-- sect 1 banner image -->
	<section class="banner-header">

	<div id="home-slider-carousel" class="carousel slide" data-ride="carousel">

		<div class="carousel-inner" id="faq">
                    <div class="carousel-item active">
                        <div class="d-block w-100" ></div>
                    </div>

		</div>

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
						<p class="text-uppercase ml-5 text-center text-white font-weight-bold text-skewToNormal fast-easy-hassle">AIRPORT ASSISTANCE <br>FAQ</p>
					</div>
				</div>
				<div class="row">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-10">
                                            <a href="service" class="pl-4 w-50 pr-4 btn btn-lg btn-secondary text-skewToNormal text-uppercase bg-dark no-border m-auto d-block no-radius-border">book Now
                                            </a>
                                    </div>
                                </div>
                        </div>
	</div>
</div>
</section>
	<!-- sect 2 tab system -->





	<!-- sect 1 banner image -->
	<!--<div class="faq-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-text pt-10">
						<h1 class="text-white text-uppercase text-center m-auto font-weight-light">Airport Assiatance</h1>
						<div class="pt-1"></div>
						<h1 class="text-white text-uppercase text-center m-auto font-weight-bold">FAQ</h1>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	<!-- sect 2 tab system -->

	<div class="faq-tabs">
		<div class="container-fluid">
			<ul class="nav nav-tabs row" id="myTab" role="tablist">
				<li class="nav-item col-md-3 col-sm-12 col-12 plr-clear">
					<a class="nav-link pt-5 pb-5 active" id="general-tab" data-toggle="tab" href="#general" role="tab" aria-controls="general" aria-selected="true">
						<img src="{{asset('main/images/icons/faq-general.png')}}" class="img-fluid m-auto d-block" alt="" width="100">
						<h3 class="text-center text-uppercase font-weight-bold pt-5">General</h3>
					</a>
				</li>
				<li class="nav-item col-md-3 col-sm-12 col-12 plr-clear">
					<a class="nav-link pt-5 pb-5" id="booking-tab" data-toggle="tab" href="#booking" role="tab" aria-controls="booking" aria-selected="false">
						<img src="{{asset('main/images/icons/faq-booking.png')}}" class="img-fluid m-auto d-block" alt="" width="100">
						<h3 class="text-center text-uppercase font-weight-bold pt-5">Booking</h3>
					</a>
				</li>
				<li class="nav-item col-md-3 col-sm-12 col-12 plr-clear">
					<a class="nav-link pt-5 pb-5" id="service-tab" data-toggle="tab" href="#service" role="tab" aria-controls="service" aria-selected="false">
						<img src="{{asset('main/images/icons/faq-service.png')}}" class="img-fluid m-auto d-block" alt="" width="100">
						<h3 class="text-center text-uppercase font-weight-bold pt-5">Service</h3>
					</a>
				</li>
				<li class="nav-item col-md-3 col-sm-12 col-12 plr-clear">
					<a class="nav-link pt-5 pb-5" id="giftCard-tab" data-toggle="tab" href="#giftCard" role="tab" aria-controls="giftCard" aria-selected="false">
						<img src="{{asset('main/images/icons/faq-giftcard.png')}}" class="img-fluid m-auto d-block" alt="" width="100">
						<h3 class="text-center text-uppercase font-weight-bold pt-5">Gift card</h3>
					</a>
				</li>
			</ul>
			<div class="tab-content pt-5 pb-5 timeline-wrapper" id="myTabContent">
				<div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
					<div class="w-80 m-auto">
						<div id="accordion">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									1. Who might want to use the MUrgency Airport Assistance service?
									</button>
									</h5>
								</div>
								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
									<div class="card-body">
										Business executives travelling to unfamiliar or challenging locations, seasoned travelers wishing for a dedicated service to help them through the airport, children who want to ensure smooth transit of their parents and / or grandparents through airports, parents who look to handhold their kids at airports as well as all those who want to make an ordinary journey special. MUrgency Airport Assistance is popular at handling group travel and all the above mentioned passengers. We also provide special services to elderly, seniors, differently abled, non English speaking persons, VIPs, CEOs, Private Jets, Celebrities, Music Stars, Sports Stars, Rock Stars etc. with total discretion and privacy.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
									2. Do you offer airport concierge services at every airport?
									</button>
									</h5>
								</div>
								<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
									<div class="card-body">
										We offer our personalized services at 626 airports across 136 countries around the world. We are expanding rapidly adding more airports to our service coverage every week. Our aim is to cover all major airports throughout the world with our high quality and reliable MUrgency Airport Assistance service. If we do not provide assistance at an airport of your choice, then please email us at MUAirportAssist@MUrgency.com and we will try our best to help you.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
									3. What is MUrgency Airport Assistance service?
									</button>
									</h5>
								</div>
								<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
									<div class="card-body">
										MUrgency Airport Assistant is a personal and professional meet & greet service for passengers at the airport. We provide a delightful experience during departure, arrival or in transit at the airport. Our trained representatives will assist passengers through the formalities of security and immigration and / or deal with any issues that might arise because of cultural or language differences. We also offer porter service, baggage delivery service, lounge service, limousine service, etc. Our services are tailored to give passengers a hassle-free and quality airport experience.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
									4. Can I book on behalf of someone else?
									</button>
									</h5>
								</div>
								<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordion">
									<div class="card-body">
										You can book for anyone else by simply entering the passenger’s details in the booking form. For extra reassurance, please contact our experienced MUrgency Airport Assistance team at MUAirportAssist@MUrgency.com who will ensure that the right details are communicated to our local representatives.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="booking" role="tabpanel" aria-labelledby="booking-tab">
					<div class="w-80 m-auto">
						<div id="accordionTwo">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#bookingOne" aria-expanded="true" aria-controls="bookingOne">
									1. How do I get confirmation of my MUrgency Airport Assistance booking?
									</button>
									</h5>
								</div>
								<div id="bookingOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionTwo">
									<div class="card-body">
										We will send you an email with complete details as soon as your MUrgency Airport Assistance booking is confirmed. Please check all the details on this email carefully and let us know immediately if anything is amiss. Kindly ensure that you or your customer / relative receives all the relevant service information to ensure a smooth MUrgency Airport Assistance experience. The confirmation email will include an MUrgency Airport Assistance Service Request Code. Please quote this in all correspondence with us about your booking. You will also receive a confirmation email on payment. If not, please check your spam or junk mail or email us at MUAirportAssist@MUrgency.com.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#bookingTwo" aria-expanded="false" aria-controls="bookingTwo">
										2. How do I cancel an MUrgency Airport Assistance booking?
									</button>
									</h5>
								</div>
								<div id="bookingTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionTwo">
									<div class="card-body">
										You can cancel an MUrgency Airport Assistance booking more than 48 hours before commencement of the service and receive a full refund. If you cancel an MUrgency Airport Assistance booking between 24 and 48 hours before commencement of the service, we will refund 50% of the price paid for the service. Cancellations made less than 24 hours before commencement of the MUrgency Airport Assistance service, or “no shows”, will not be entitled to any refund.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#bookingThree" aria-expanded="false" aria-controls="bookingThree">
										3. How do I amend my MUrgency Airport Assistance booking?
									</button>
									</h5>
								</div>
								<div id="bookingThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionTwo">
									<div class="card-body">
										Please email us at MUAirportAssist@MUrgency.com to make amendments to MUrgency Airport Assistance Service Bookings. This includes instances where there has been a flight re-scheduling by the airline you or your customers / relatives are traveling on. Please note that amendments made to MUrgency Airport Assistance Service Bookings less than 48 hours before commencement of the service time may incur an amendment fee.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#bookingFour" aria-expanded="false" aria-controls="bookingFour">
										4. Can I include children in the booking?
									</button>
									</h5>
								</div>
								<div id="bookingFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionTwo">
									<div class="card-body">
										Yes, you can include children and should count them for the total number of passengers. Charges for infants under 2 years of age are not applicable and they are not included in passenger count. Please note that there may be changes according to the local airport’s terms and conditions. Kindly contact us at MUairportassist@murgency.com for details. ​​
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#bookingFive" aria-expanded="false" aria-controls="bookingFive">
										5. How do I make a booking?
									</button>
									</h5>
								</div>
								<div id="bookingFive" class="collapse" aria-labelledby="headingFour" data-parent="#accordionTwo">
									<div class="card-body">
										You can book through our website at www.murgencyairprotassistance.com or place your request via email at muairportassist@murgency.com preferably 48 hours prior to your flight. If you need to make a booking at short notice (less than 48 hours), please contact us via email provided above to enable us to check availability with our local representatives. ​​ Our 24 / 7 MUrgency Airport Assistance Control Room will contact you to confirm the price and complete the booking.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#bookingSix" aria-expanded="false" aria-controls="bookingSix">
										6. How do I make a short notice booking?
									</button>
									</h5>
								</div>
								<div id="bookingSix" class="collapse" aria-labelledby="headingFour" data-parent="#accordionTwo">
									<div class="card-body">
										If you want to make a booking for an MUrgency Airport Assistance service within 48 hours of your flight, please email us at MUAirportAssist@MUrgency.com to enable us to check availability with our local representatives. Our 24 / 7 MUrgency Airport Assistance Control Room will contact you to confirm if we could provide the service. All bookings made within 48 hours remaining to the flight time are subject to a 50% surcharge.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="service" role="tabpanel" aria-labelledby="service-tab">
					<div class="row">
						<div class="col-md-8 offset-md-1 mt-5 mb-5">
							<h5 class="ml-3">I. Airport Assistance Services</h5>
						</div>
					</div>
					<div class="w-80 m-auto">
						<div id="accordionThree">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#serviceOne" aria-expanded="true" aria-controls="serviceOne">
									1. Where will the MUrgency Airport Assistance representative meet the passenger(s) at the airport?
									</button>
									</h5>
								</div>
								<div id="serviceOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionThree">
									<div class="card-body">
										For Arrival Passengers: Our representative will be waiting with the name board near the end of the aerobridge where allowed by airport security or else inside the terminal at the nearest point possible. For Departure Passengers: A meeting point will be arranged at or near the entrance of the terminal building. If you have arranged ground transportation, please let us know. This may help with providing a smooth handover between the service providers.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceTwo" aria-expanded="false" aria-controls="serviceTwo">
									2. What happens if the passenger’s flight departure / arrival has been delayed?
									</button>
									</h5>
								</div>
								<div id="serviceTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionThree">
									<div class="card-body">
										Our local MUrgency representative will wait with your customer and assist until the new scheduled departure / arrival time. In case the passenger needs further assistance after our service has concluded, it can be arranged directly with our representative subject to availability and payment of additional fee.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceThree" aria-expanded="false" aria-controls="serviceThree">
										3. Will my customer need to tip the MUrgency Airport Assistance representative?
									</button>
									</h5>
								</div>
								<div id="serviceThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionThree">
									<div class="card-body">
										There is absolutely no need to give a tip to our local representative. If you or your customer/ relative feels they have experienced an outstanding service and want to reward the representative, then they are free to do so.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceFour" aria-expanded="false" aria-controls="serviceFour">
										4. Does the passenger need to bring any paperwork with them?
									</button>
									</h5>
								</div>
								<div id="serviceFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionThree">
									<div class="card-body">
										Yes, the passenger needs to carry a printed copy of the MUrgency Airport Assistance booking confirmation MUrgency Airport Assistance has sent you. Also, retain the mobile phone number of our local representative which shall be sent to you at least 24 hours before commencement of the service.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#serviceFive" aria-expanded="true" aria-controls="serviceFive">
										5. How will I or my customer recognize the MUrgency Airport Assistance representative?
									</button>
									</h5>
								</div>
								<div id="serviceFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionThree">
									<div class="card-body">
										Our local representative will be carrying a name board with passenger / party’s name on it.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceSix" aria-expanded="false" aria-controls="serviceSix">
									6. Will the MUrgency Airport Assistance representative assist with baggage?
									</button>
									</h5>
								</div>
								<div id="serviceSix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionThree">
									<div class="card-body">
										Our local MUrgency Meet & Greet representatives are not insured to carry baggage. Airports stipulate that passengers must keep their hand baggage with them and under their control at all times. However, if required, our local representative would be pleased to arrange porter services for you or your customer / relatives, for which local payment may be required. Please check the service notes as you make the booking to understand what is included with regard to porterage. We can arrange for porter service at an additional cost.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
										7. What Fast Track and airside services can you offer in the United States?
									</button>
									</h5>
								</div>
								<div id="collapseSeven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionThree">
									<div class="card-body">
										Under current legislation, the access to airside is severely restricted, especially for international travel. Therefore, MUrgency Airport Assistance service, together with all other service providers, is unable to provide meet & greet service for international arrivals or transits at the arrival gate. Our services for Arrival and Transit will meet passengers after Customs control. Please note, US domestic travel is not affected by these restrictions. We will meet customers at the gate for domestic arrivals and transit services. Also, the US Customs and Border Control agency does not consistently provide ‘preferential Fast Track’ style services for passport control and TSA security check. We will endeavor to guide our customers through such expedited service lanes wherever available, but cannot guarantee the service.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
									8. What should be done if the passenger is running late?
									</button>
									</h5>
								</div>
								<div id="collapseEight" class="collapse" aria-labelledby="headingFour" data-parent="#accordionThree">
									<div class="card-body">
										If you have booked a departure service and the passenger will be late in reaching the airport, please inform about the same to our local MUrgency representative on the number we have provided. Kindly note that neither we nor our representatives can take any responsibility for the consequences of missed flights. It is your responsibility to make bookings with us in good time for your customer to catch the flight, allowing for all eventualities.
									</div>
								</div>
							</div>
						</div>
					</div>

					<hr>
					<div class="row">
						<div class="col-md-8 offset-md-1 mt-5 mb-5">
							<h5 class="ml-3">II. Aircraft Groundhandling Assistance Services</h5>
						</div>
					</div>
					<div class="w-80 m-auto">
						<div id="accordionFour">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#serviceNine" aria-expanded="true" aria-controls="serviceNine">
										1. Is my personal or corporate information and / or transaction activity used for marketing purposes?
									</button>
									</h5>
								</div>
								<div id="serviceNine" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFour">
									<div class="card-body">
										Privacy of clients and customers is paramount in MUrgency. We do not share any financial and / or personal or corporate information about our client to anyone for marketing purpose. Personal and / or corporate information required to be shared for providing the service requested for alone will be shared as required for providing the services.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceTen" aria-expanded="false" aria-controls="serviceTen">
										2. Is MUrgency capable to provide Aircraft Ground Handling services?
									</button>
									</h5>
								</div>
								<div id="serviceTen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFour">
									<div class="card-body">
										We specialize in providing Aircraft Ground Handling services for private jets and charter flights. Our team members are veterans in aviation and aircraft ground handling. The experience gained by our team over the years makes our service to you smooth and of immense value.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceEleven" aria-expanded="false" aria-controls="serviceEleven">
										3. Are MUrgency Aircraft Ground Handling Services available 24/7?
									</button>
									</h5>
								</div>
								<div id="serviceEleven" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFour">
									<div class="card-body">
										MUrgency Aircraft Ground Handling Team is available 24/7 to provide immediate attention and assist all your Aircraft Ground Handling requests. Once you confirm the order with us, we follow through start to end of the trip to make sure you enjoy swift, smooth and safe service at the Airport.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingFour">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceTwelve" aria-expanded="false" aria-controls="serviceTwelve">
										4. Are there any additional service charges or administrative fees to the price quote you offer?
									</button>
									</h5>
								</div>
								<div id="serviceTwelve" class="collapse" aria-labelledby="headingFour" data-parent="#accordionFour">
									<div class="card-body">
										Our price quote is all inclusive. We do not charge any additional service charge or administrative fees to the price quote we offer. Of course, if you use additional services than what you requested for initially, we will charge additional fees for the additional services requested by you and offered by us.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#serviceThirteen" aria-expanded="true" aria-controls="serviceThirteen">
										5. How fast can I have my services confirmed?
									</button>
									</h5>
								</div>
								<div id="serviceThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordionFour">
									<div class="card-body">
										Confirmations for Aircraft Ground Handling service by MUrgency have a benchmarked turnaround time of 8 hours normally, but may depend on the type of service required. We can work on quick turnarounds for emergencies and medical evacuations. For government related services such as emergency entry / medical visas, etc., we can expedite the request vide our global network.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#serviceFourteen" aria-expanded="false" aria-controls="serviceFourteen">
									6. Do I have to submit my credit card to get services confirmed?
									</button>
									</h5>
								</div>
								<div id="serviceFourteen" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFour">
									<div class="card-body">
										Yes. We take the payment upfront through credit card before providing confirmation of services from our end.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
										7. What are the benefits of using MUrgency over other agencies?
									</button>
									</h5>
								</div>
								<div id="collapseFifteen" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFour">
									<div class="card-body">
										MUrgency provides:
										<ul>
											<li>Service in 626 Airports in 126 Countries.</li>
											<li>24/7/365 availability</li>
											<li>Highly competitive rates</li>
											<li>High service quality standard</li>
											<li>Reliability</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="giftCard" role="tabpanel" aria-labelledby="giftCard-tab">
					<div class="w-80 m-auto">
						<div id="accordionFive">
							<div class="card">
								<div class="card-header" id="headingOne">
									<h5 class="mb-0">
									<button class="btn btn-link" data-toggle="collapse" data-target="#giftCardOne" aria-expanded="true" aria-controls="giftCardOne">
										1. What is the refund policy on Gift Card?
									</button>
									</h5>
								</div>
								<div id="giftCardOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionFive">
									<div class="card-body">
										Gift Cards are non-refundable
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#giftCardTwo" aria-expanded="false" aria-controls="giftCardTwo">
									2. How do you redeem the Gift card?
									</button>
									</h5>
								</div>
								<div id="giftCardTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionFive">
									<div class="card-body">
										The Gift Card is redeemable based on inputting the Gift Code Card in the link which is sent once the service is confirmed. You must redeem the Gift Card Voucher in one booking only. Any amount not redeemed in that booking will be lost and no credit will remain. Any additional service booked in conjunction with the use of this Voucher will be subject to standard booking conditions.
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingThree">
									<h5 class="mb-0">
									<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#giftcardThree" aria-expanded="false" aria-controls="giftcardThree">
										3. What is the validity of the Gift Card?
									</button>
									</h5>
								</div>
								<div id="giftcardThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionFive">
									<div class="card-body">
										Gift Card Vouchers are valid for 12 months (365 days) from the Gift Card Voucher issue date. The validity of the Gift Card Vouchers cannot be extended.
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- sect 3 request service part -->
</section>
@endsection
