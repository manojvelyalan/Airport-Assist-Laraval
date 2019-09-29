@extends('layouts.common')

@section('content')
<section class="editUserDetails-section">
	<main class="app-content">
		<div class="app-title">
			<div>
				<h1><i class="fa fa-pencil-square-o"></i> Edit Request Details</h1>
			</div>

		</div>
		<div class="row">
            <div class="container">
                <div class="tile">
                    <div class="tile-body">
					<form id="createAction" action="{{ action('RequestController@update',[$request->id]) }}" method="post">
					@method('PUT')
                                @csrf
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Service Provided Airport</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="originAirport" id="originAirport" value="{{ucwords($request->originAirport)}}">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Transit Flight Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="transitFlightNumber" value="{{$request->transitFlightNumber}}" id="transitFlightNumber"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Flight Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="flightNumber" id="flightNumber" value="{{$request->flightNumber}}">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Adults</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="adults" value="{{$request->adults}}" id="adults">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Children</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="children" value="{{$request->children}}" id="children">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Infants</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="infants" value="{{$request->infants}}" id="infants">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Class Of Travel</label>
								</div>
								<div class="col-md-8 form-group">
									<select id="classOfTravel" name="classOfTravel" class="form-control">
										<option value="">Select class of travel</option>
											@foreach($classOfTravels as $classOfTravel)
												<option value="{{$classOfTravel->id}}" {{($request->classOfTravel_id == $classOfTravel->id)?"selected":""}}>{{ucwords($classOfTravel->title)}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Arrival Date & Time</label>
								</div>
								<div class="col-md-5 form-group">
									<input type="text" class="form-control" name="arrivalDate" id="arrivalDate" value="{{( $request->arrivalDate !='')?date('Y-m-d',strtotime($request->arrivalDate)):''}}">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control" name="arrivalTime" id="arrivalTime" value="{{$request->arrivalTime}}">
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Departure Date & Time</label>
								</div>
								<div class="col-md-5 form-group">
									<input type="text" class="form-control" name="departureDate" id="departureDate" value="{{( $request->departureDate !='')?date('Y-m-d',strtotime($request->departureDate)):''}}">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control" name="departureTime" id="departureTime" value="{{$request->departureTime}}">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Service Type</label>
								</div>
								<div class="col-md-8 form-group">
									<select class="form-control field_color place_holder field_color" name="servicesType" id="servicesType">
										<option value="">Select Service Type</option>
											@foreach($serviceTypes as $serviceType)
												<option value="{{$serviceType->id}}" {{($request->service_type_id == $serviceType->id)?"selected":""}}>{{ucwords($serviceType->title)}}</option>
											@endforeach
										</select>
								</div>
							</div>

							<div class="row {{($serviceTypeId == '1')?'d-none':''}}" id="serviceList">
								<div class="col-md-4">
									<label class="form-control-label">Service</label>
								</div>
								<div class="col-md-8 form-group">
									<select class="form-control field_color place_holder field_color" name="services" id="services">
										<option value="">Select service</option>
											@if($request->serviceType != "")
												@foreach($request->serviceType->services as $service)
														<option value="{{$service->id}}" {{($request->service_id == $service->id)?"selected":""}}>{{ucwords($service->title)}}</option>
												@endforeach
											@endif
									</select>
								</div>
							</div>

							<div class="row {{($serviceTypeId != '1')?'d-none':''}}" id="limousineField">
								<div class="col-md-4">
									<label class="form-control-label">Pick Up Or Drop Off</label>
								</div>
								<div class="col-md-8 form-group">
									<label class="mr-4">
										<input type="radio" name="pickUp" id="pickup" value="pickup" {{($request->isPickup)?"checked":""}}><span class="ml-3">PickUp</span>
									</label>
									<label class="mr-4">
										<input type="radio" name="pickUp" id="drop" value="drop" {{(!$request->isPickup)?"checked":""}}><span class="ml-3">Drop Off</span>
									</label>
								</div>
								<div class="col-md-4">
									<label class="form-control-label">Pick Up Or Drop Off Address</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="pickOrDropAddress" rows="5" class="form-control" id="pickOrDropAddress">{{$request->pickOrDropAddress}}</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Full Name</label>
								</div>

								<div class="col-md-2 form-group">
									<select name="titleName" class="form-control" id="titleName">
										<option value="">Select Title</option>
										@foreach($titles as $title)
										<option value="{{$title->title}}" {{($request->titleName == $title->title)?"selected":""}}>{{ucfirst($title->title)}}</option>
                    @endforeach
									</select>

								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control label_top" name="firstName" value="{{ucwords($request->firstName)}}" id="firstName">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control label_top" name="lastName" value="{{ucwords($request->lastName)}}" id="lastName">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Company Name</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="companyName" value="{{$request->companyName}}" id="companyName">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Email</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="email" value="{{$request->email}}" id="email">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Mobile Number</label>
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="countryCode" class="form-control" value="{{$request->countryCode}}" id="countryCode">
								</div>
								<div class="col-md-5 form-group">
									<input type="text" name="contactNumber" class="form-control" value="{{$request->contactNumber}}" id="contactNumber">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Message</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="message" rows="5" class="form-control" id="message">{{$request->message}}</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Request Status</label>
								</div>
								<div class="col-md-8 form-group">
									<select name="status" class="form-control" id="status">
									<option value="">Select Status</option>
										@foreach($allStatus as $status)
										<option value="{{$status->id}}" {{($request->request_status_id == $status->id)?"selected":""}}>{{$status->title}}</option>
                                        @endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Payment Method</label>
								</div>
								<div class="col-md-8 form-group">

									<select name="paymentMethod" class="form-control" id="paymentMethod">
										<option value="">Select Payment Method</option>
											@foreach($paymentMethods as $paymentMethod)
												<option value="{{$paymentMethod->id}}" {{($request->payment_method_id == $paymentMethod->id)?"selected":""}}>{{ucwords($paymentMethod->title)}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Admin Comment</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="adminComment" class="form-control" id="adminComment">{{$request->adminComment}}</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Invoice Remarks</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="invoiceRemarks" class="form-control" id="invoiceRemarks">{{$request->invoiceRemarks}}</textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Name</label>
								</div>
								<div class="col-md-8 form-group">
									<select name="vendorId" class="form-control" id="vendorId">
										<option value="">Select vendor name</option>
										@foreach($vendors as $vendor){?>
												<option value="{{$vendor->id}}" {{($request->vendor_list_id == $vendor->id)?"selected":""}}>{{ucwords($vendor->name)}}</option>
											@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Invoice Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="invoiceNumber" value="{{$request->invoiceNumber}}" id="invoiceNumber">
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Credit Card Charge (%)</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" value="{{($request->creditCardCharges != '')?$request->creditCardCharges:'3'}}" id="creditCardCharges" name="creditCardCharges">
                                 </div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Total Amount (USD)</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" value="{{($request->totalAmount != '')?$request->totalAmount:'0'}}" id="totalAmount" name="totalAmount">
                                 </div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Amount</label>
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" name="vendorAmount" value='{{($request->vendorAmount !="")?$request->vendorAmount:"0"}}' id="vendorAmount">
								</div>
								<div class="col-md-4 form-group">
									<select name="vendorCurrency" class="form-control" id="vendorCurrency">
										<option value="">Select currency</option>
										@foreach($vendorCurrencies as $vendorCurrency)
										<option value="{{$vendorCurrency->id}}" {{($request->vendorCurrency_id == $vendorCurrency->id)?"selected":""}}>{{$vendorCurrency->currencyName ." (".$vendorCurrency->currencyCode.")"}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Payment Mode</label>
								</div>
								<div class="col-md-8 form-group">
									<select name="paymentMode" class="form-control" id="paymentMode">
										<option value="">Select payment mode</option>
										@foreach($vendorPaymentModes as $vendorPaymentMode)
										<option value="{{$vendorPaymentMode->id}}" {{($request->vendor_payment_mode_id == $vendorPaymentMode->id)?"selected":""}}>{{ucwords($vendorPaymentMode->paymentTitle)}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Greeter Name</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="greeterName" value="{{$request->greeterName}}" id="greeterName"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Greeter Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="greeterNumber" value="{{$request->greeterContactNumber}}" id="greeterNumber"/>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<button class="btn btn-success float-right text-uppercase" type="submit" id="updateRequest" name="updateRequest">update request</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>
    </main>
</section>
@endsection
@push('scripts')
<script>
$("#arrivalDate").datepicker();
$("#arrivalTime").timepicker();
$("#departureDate").datepicker();
$("#departureTime").timepicker();
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
$("#servicesType").change(function () {
	var serviceType = $("#servicesType").val();
	var option = '<option selected  value="">Select Service</option>';
	if(serviceType !== "1"){
		$.get("/admin/service/"+serviceType+'/services', function(data){
			var services = JSON.parse(data);
			for(i=0;i<services.length;i++){
				option +='<option  value="'+services[i]['id']+'">'+services[i]['title']+'</option>';
			}
			$("#services").html(option);
		});
		$("#serviceList").removeClass("d-none");
		$("#limousineField").addClass("d-none");
	}else{
		$("#serviceList").addClass("d-none");
		$("#limousineField").removeClass("d-none");
	}
});
</script>
@endpush
