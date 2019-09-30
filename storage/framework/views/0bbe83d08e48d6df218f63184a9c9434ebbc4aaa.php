<?php $__env->startSection('content'); ?>
<div class="payment-detailed-section mt-5 mb-5">
	<div class="container">
		<div class="payment-code-wrapper">

		</div>
		<div class="user-details-wrapper">
			<div class="row">
				<div class="col-md-12">
				
					<h3 class="text-danger text-uppercase">Request Details</h3>
					<hr>
				</div>
			</div>

        <div class="row mt-5">
				<div class="col-md-12">
					<table class="table table-hover table-bordered" id="payment-detaile-table">
						<tbody>
							<tr>
								<td>Origin Airport</td>
                <td><?php echo e(($request->originAirport != "")?ucwords($request->originAirport):"-"); ?></td>
      			</tr>

							<tr>
								<td>Full Name</td>
                <td><?php echo e(($request->firstName != "")?ucwords($request->titleName.". ".$request->firstName." ".$request->lastName):"-"); ?></td>
                </tr>
							<tr>
								<td>Email</td>
                <td><?php echo e(($request->email != "")?$request->email:"-"); ?></td>

									</tr>
							<tr>
								<td>Mobile Number</td>
                  <td><?php echo e(($request->contactNumber != "")?"+".$request->countryCode." ".$request->contactNumber:"-"); ?></td>

								</tr>
							<tr>
								<td>Flight Number</td>
                <td><?php echo e(($request->flightNumber != "")?$request->flightNumber:"-"); ?></td>

								</tr>
            <tr>
								<td>Transit Flight Number</td>
                <td><?php echo e(($request->transitFlightNumber != "")?$request->transitFlightNumber:"-"); ?></td>
						</tr>
              <tr>
								<td>Service Type</td>
                <td><?php echo e(($request->serviceType != "")?$request->serviceType->title:"-"); ?></td>

							</tr>

								<td>Adults</td>
                <td><?php echo e(($request->adults != "")?$request->adults:"-"); ?></td>


							</tr>
							<tr>
								<td>Children</td>
            <td><?php echo e(($request->children != "")?$request->children:"-"); ?></td>
									</tr>
							<tr>
								<td>Infants</td>
                  <td><?php echo e(($request->infants != "")?$request->infants:"-"); ?></td>

								</tr>
							<tr>
								<td>Class Of Travel</td>
                <td><?php echo e(($request->classOfTravel != "")?ucwords($request->classOfTravel->title):"-"); ?></td>
								</tr>
							<tr>
								<td>Arrival Date & Time</td>
                <td><?php echo e(($request->arrivalDate != "")?date('Y/M/d', strtotime($request->arrivalDate))." & ".$request->arrivalTime:"-"); ?></td>
								</tr>
              <tr>
								<td>Departure Date & Time</td>
                <td><?php echo e(($request->departureDate != "")?date('Y/M/d', strtotime($request->departureDate))." & ".$request->departureTime:"-"); ?></td>

								</tr>
                <?php if($request->service_type_id == 1): ?>
              <tr>
								<td>Pick Up / Drop</td>
                <td><?php echo e(($request->isPickup)?"Pick up":"Drop"); ?></td>
								</tr>
                <tr>
								<td>Pick Up / Drop Address</td>
                <td><?php echo e(($request->pickOrDropAddress)?$request->pickOrDropAddress:"-"); ?></td>
								</tr>
                <?php endif; ?>

							<tr>
								<td>Message</td>
                <td><?php echo e(($request->message)?$request->message:"-"); ?></td>
								</tr>
							<tr>
								<td>Total Amount ($)</td>
                  <td><?php echo e(($request->totalAmount)?number_format($request->totalAmount,2):"-"); ?></td>
            	</tr>

              <tr>
                  <td>Request Status</td>
                  <td ><span class="pt-2 pb-2 pl-5 pr-5 <?php echo e(($request->request_status_id=="6")?'btn-success':'btn-danger'); ?>"><?php echo e(($request->request_status_id!="")?$request->requestStatus->title:"-"); ?></span></td>
              </tr>

							<tr>
								<td colspan="2">
									<a href="checkout" class="btn btn-success text-uppercase float-right">Make Payment</a>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/payment/show.blade.php ENDPATH**/ ?>