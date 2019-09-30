<?php $__env->startSection('content'); ?>
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
					<form id="createAction" action="<?php echo e(action('RequestController@update',[$request->id])); ?>" method="post">
					<?php echo method_field('PUT'); ?>
                                <?php echo csrf_field(); ?>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Service Provided Airport</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="originAirport" id="originAirport" value="<?php echo e(ucwords($request->originAirport)); ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Transit Flight Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="transitFlightNumber" value="<?php echo e($request->transitFlightNumber); ?>" id="transitFlightNumber"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Flight Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="flightNumber" id="flightNumber" value="<?php echo e($request->flightNumber); ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Adults</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="adults" value="<?php echo e($request->adults); ?>" id="adults">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Children</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="children" value="<?php echo e($request->children); ?>" id="children">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Infants</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="infants" value="<?php echo e($request->infants); ?>" id="infants">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Class Of Travel</label>
								</div>
								<div class="col-md-8 form-group">
									<select id="classOfTravel" name="classOfTravel" class="form-control">
										<option value="">Select class of travel</option>
											<?php $__currentLoopData = $classOfTravels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classOfTravel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($classOfTravel->id); ?>" <?php echo e(($request->classOfTravel_id == $classOfTravel->id)?"selected":""); ?>><?php echo e(ucwords($classOfTravel->title)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Arrival Date & Time</label>
								</div>
								<div class="col-md-5 form-group">
									<input type="text" class="form-control" name="arrivalDate" id="arrivalDate" value="<?php echo e(( $request->arrivalDate !='')?date('Y-m-d',strtotime($request->arrivalDate)):''); ?>">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control" name="arrivalTime" id="arrivalTime" value="<?php echo e($request->arrivalTime); ?>">
								</div>

							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Departure Date & Time</label>
								</div>
								<div class="col-md-5 form-group">
									<input type="text" class="form-control" name="departureDate" id="departureDate" value="<?php echo e(( $request->departureDate !='')?date('Y-m-d',strtotime($request->departureDate)):''); ?>">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control" name="departureTime" id="departureTime" value="<?php echo e($request->departureTime); ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Service Type</label>
								</div>
								<div class="col-md-8 form-group">
									<select class="form-control field_color place_holder field_color" name="servicesType" id="servicesType">
										<option value="">Select Service Type</option>
											<?php $__currentLoopData = $serviceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($serviceType->id); ?>" <?php echo e(($request->service_type_id == $serviceType->id)?"selected":""); ?>><?php echo e(ucwords($serviceType->title)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
								</div>
							</div>

							<div class="row <?php echo e(($serviceTypeId == '1')?'d-none':''); ?>" id="serviceList">
								<div class="col-md-4">
									<label class="form-control-label">Service</label>
								</div>
								<div class="col-md-8 form-group">
									<select class="form-control field_color place_holder field_color" name="services" id="services">
										<option value="">Select service</option>
											<?php if($request->serviceType != ""): ?>
												<?php $__currentLoopData = $request->serviceType->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<option value="<?php echo e($service->id); ?>" <?php echo e(($request->service_id == $service->id)?"selected":""); ?>><?php echo e(ucwords($service->title)); ?></option>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											<?php endif; ?>
									</select>
								</div>
							</div>

							<div class="row <?php echo e(($serviceTypeId != '1')?'d-none':''); ?>" id="limousineField">
								<div class="col-md-4">
									<label class="form-control-label">Pick Up Or Drop Off</label>
								</div>
								<div class="col-md-8 form-group">
									<label class="mr-4">
										<input type="radio" name="pickUp" id="pickup" value="pickup" <?php echo e(($request->isPickup)?"checked":""); ?>><span class="ml-3">PickUp</span>
									</label>
									<label class="mr-4">
										<input type="radio" name="pickUp" id="drop" value="drop" <?php echo e((!$request->isPickup)?"checked":""); ?>><span class="ml-3">Drop Off</span>
									</label>
								</div>
								<div class="col-md-4">
									<label class="form-control-label">Pick Up Or Drop Off Address</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="pickOrDropAddress" rows="5" class="form-control" id="pickOrDropAddress"><?php echo e($request->pickOrDropAddress); ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Full Name</label>
								</div>

								<div class="col-md-2 form-group">
									<select name="titleName" class="form-control" id="titleName">
										<option value="">Select Title</option>
										<?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($title->title); ?>" <?php echo e(($request->titleName == $title->title)?"selected":""); ?>><?php echo e(ucfirst($title->title)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>

								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control label_top" name="firstName" value="<?php echo e(ucwords($request->firstName)); ?>" id="firstName">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" class="form-control label_top" name="lastName" value="<?php echo e(ucwords($request->lastName)); ?>" id="lastName">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Company Name</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="companyName" value="<?php echo e($request->companyName); ?>" id="companyName">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Email</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="email" value="<?php echo e($request->email); ?>" id="email">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Mobile Number</label>
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="countryCode" class="form-control" value="<?php echo e($request->countryCode); ?>" id="countryCode">
								</div>
								<div class="col-md-5 form-group">
									<input type="text" name="contactNumber" class="form-control" value="<?php echo e($request->contactNumber); ?>" id="contactNumber">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Message</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="message" rows="5" class="form-control" id="message"><?php echo e($request->message); ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Request Status</label>
								</div>
								<div class="col-md-8 form-group">
									<select name="status" class="form-control" id="status">
									<option value="">Select Status</option>
										<?php $__currentLoopData = $allStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($status->id); ?>" <?php echo e(($request->request_status_id == $status->id)?"selected":""); ?>><?php echo e($status->title); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
											<?php $__currentLoopData = $paymentMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paymentMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<option value="<?php echo e($paymentMethod->id); ?>" <?php echo e(($request->payment_method_id == $paymentMethod->id)?"selected":""); ?>><?php echo e(ucwords($paymentMethod->title)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Admin Comment</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="adminComment" class="form-control" id="adminComment"><?php echo e($request->adminComment); ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Invoice Remarks</label>
								</div>
								<div class="col-md-8 form-group">
									<textarea name="invoiceRemarks" class="form-control" id="invoiceRemarks"><?php echo e($request->invoiceRemarks); ?></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Name</label>
								</div>
								<div class="col-md-8 form-group">
									<select name="vendorId" class="form-control" id="vendorId">
										<option value="">Select vendor name</option>
										<?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>{?>
												<option value="<?php echo e($vendor->id); ?>" <?php echo e(($request->vendor_list_id == $vendor->id)?"selected":""); ?>><?php echo e(ucwords($vendor->name)); ?></option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Invoice Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="invoiceNumber" value="<?php echo e($request->invoiceNumber); ?>" id="invoiceNumber">
								</div>
							</div>

							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Credit Card Charge (%)</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" value="<?php echo e(($request->creditCardCharges != '')?$request->creditCardCharges:'3'); ?>" id="creditCardCharges" name="creditCardCharges">
                                 </div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Total Amount (USD)</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" value="<?php echo e(($request->totalAmount != '')?$request->totalAmount:'0'); ?>" id="totalAmount" name="totalAmount">
                                 </div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Vendor Amount</label>
								</div>
								<div class="col-md-4 form-group">
									<input type="text" class="form-control" name="vendorAmount" value='<?php echo e(($request->vendorAmount !="")?$request->vendorAmount:"0"); ?>' id="vendorAmount">
								</div>
								<div class="col-md-4 form-group">
									<select name="vendorCurrency" class="form-control" id="vendorCurrency">
										<option value="">Select currency</option>
										<?php $__currentLoopData = $vendorCurrencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendorCurrency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($vendorCurrency->id); ?>" <?php echo e(($request->vendorCurrency_id == $vendorCurrency->id)?"selected":""); ?>><?php echo e($vendorCurrency->currencyName ." (".$vendorCurrency->currencyCode.")"); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
										<?php $__currentLoopData = $vendorPaymentModes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendorPaymentMode): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($vendorPaymentMode->id); ?>" <?php echo e(($request->vendor_payment_mode_id == $vendorPaymentMode->id)?"selected":""); ?>><?php echo e(ucwords($vendorPaymentMode->paymentTitle)); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Greeter Name</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="greeterName" value="<?php echo e($request->greeterName); ?>" id="greeterName"/>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<label class="form-control-label">Greeter Number</label>
								</div>
								<div class="col-md-8 form-group">
									<input type="text" class="form-control" name="greeterNumber" value="<?php echo e($request->greeterContactNumber); ?>" id="greeterNumber"/>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/request/edit.blade.php ENDPATH**/ ?>