<?php $__env->startSection('content'); ?>
<section class="adminpage-section">
	
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text"></i> Request Details</h1>
            </div>
        </div>
        
        <div class="tile">
            <div class="tile-header">
                <h3>Airport & Flight Information</h3>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered" id="payment-detaile-table">
                    <tbody>                                
                        <tr>
                            <td>Origin Airport</td>
                            <td><?php echo e(($request->originAirport != "")?$request->originAirport:"-"); ?></td>
                        </tr>                               
                        <tr>
                            <td>Transit Flight Number</td>
                            <td><?php echo e(($request->transitFlightNumber != "")?$request->transitFlightNumber:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Flight Number</td>
                            <td><?php echo e(($request->flightNumber != "")?$request->flightNumber:"-"); ?></td>
                        </tr>
                        
                        <tr>
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
                            <td><?php echo e(($request->classOfTravel_id != "")?ucwords($request->classoftravel->title):"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Arrival Date & Time</td>
                            <td><?php echo e(($request->arrivalDate!="")?date("d/M/Y",strtotime($request->arrivalDate)):"-"); ?> & <?php echo e(($request->arrivalTime!="")?$request->arrivalTime:"-"); ?> </td>
                        </tr>
                        <tr>
                            <td>Departure Date & Time</td>
                            <td><?php echo e(($request->departureDate!="")?date("d/M/Y",strtotime($request->departureDate)):"-"); ?> & <?php echo e(($request->departureTime!="")?$request->departureTime:"-"); ?> </td>
                            
                        </tr>                       
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile mt-5">
            <div class="tile-header">
                <h3>Service Information</h3>
            </div>
            <div class="tile-body">
                <table class="table table-bordered table-hover">
                    <tbody>

                        <tr>
                            <td>Service Type</td>
                            <td><?php echo e(($request->service_type_id!="")?ucwords($request->serviceType->title):"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Service</td>
                            <td><?php echo e(($request->service_id!="")?ucwords($request->service->title):"-"); ?></td>
                        </tr>
                        <?php if($request->service_type_id == 1): ?>
                            <tr>
                                <td>Pick Up / Drop</td>
                                <td><?php echo e(($request->isPickup)?"PickUp" :"Drop"); ?> </td>
                            </tr>
                            <tr>
                                <td>Pick Up / Drop Address</td>
                                <td><?php echo e(($request->pickOrDropAddress != "")?$request->pickOrDropAddress :"-"); ?> </td>
                            </tr>
                        <?php endif; ?>

                        <tr>
                            <td>Message</td>
                            <td><?php echo e(($request->message!="")?ucwords($request->message):"-"); ?></td>
                        </tr>  
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile mt-5">
            <div class="tile-header">
                <h3>Customer Information</h3>
            </div>
            <div class="tile-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Full Name</td>
                            <td><?php echo e(($request->firstName!="")?ucwords($request->titleName.". ".$request->firstName." ".$request->lastName):"-"); ?></td>
                    
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo e(($request->email!="")?$request->email:"-"); ?></td>

                        </tr>
                        <tr>
                            <td>Company Name</td>
                            <td><?php echo e(($request->companyName!="")?$request->companyName:"-"); ?></td>

                        </tr>
                        <tr>
                            <td>Mobile Number</td>
                            <td>+<?php echo e(($request->contactNumber!="")?$request->countryCode." ".$request->contactNumber:"-"); ?></td>			
                        </tr>
                        <tr>
                            <td>Repeating Customer</td>
                            <td><?php echo e(($request->isRepeat)?"Yes":"No"); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card mt-5">
            <div class="card-header">
                    <h3>Available Vendors</h3>
                    
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <th>Vendor Name</th>
                        <th>Contact Person</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="<?php echo e(($vendor->pivot->priority == 1)?'bg-success text-white':''); ?>"> 
                    <td><?php echo e(($vendor->name != "")?$vendor->name:"-"); ?></td>  
                    <td><?php echo e(($vendor->contactPerson != "")?$vendor->contactPerson:"-"); ?></td>
                    <td><?php echo e(($vendor->contactNo != "")?$vendor->contactNo: "-"); ?></td>
                    <td><?php echo e(($vendor->email != "")?$vendor->email: "-"); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
               
        <div class="tile mt-5">
            <div class="tile-header">
                <h3>Vendor Details</h3>
            </div>
            <div class="tile-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Vendor Name</td>
                            <td><?php echo e(($request->vendor_list_id != "")?$request->vendor->name:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Vendor Invoice Number</td>
                            <td><?php echo e(($request->invoiceNumber != "")?$request->invoiceNumber:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Vendor Amount</td>
                            <td><?php echo e(($request->vendorAmount != "")?$request->vendorAmount:"-"); ?></td>
                        
                        </tr>
                        <tr>
                            <td>Payment Mode</td>
                            <td><?php echo e(($request->vendor_payment_mode_id != "")?$request->vendorPaymentMode->paymentTitle:"-"); ?></td>   
                        </tr>
                        <tr>
                            <td>Currency Type</td>
                            <td><?php echo e(($request->vendorCurrency != "")?$request->vendorCurrency->currencyName:"-"); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile mt-5">
            <div class="tile-header">
                <h3>Greeter Details</h3>
            </div>
            <div class="tile-body">
                <table class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td>Greeter Name</td>
                            <td><?php echo e(($request->greeterName != "")?$request->greeterName:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Greeter Number</td>
                            <td><?php echo e(($request->greeterContactNumber != "")?$request->greeterContactNumber:"-"); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="tile mt-5">
            <div class="tile-header">
                <h3>Request Status</h3>
            </div>
            <div class="tile-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Request Status</td>
                            <td><?php echo e(($request->request_status_id != "")?$request->requestStatus->title:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Admin Comment</td>
                            <td><?php echo e(($request->adminComment != "")?$request->adminComment:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Invoice Remarks</td>
                            <td><?php echo e(($request->invoiceRemarks != "")?$request->invoiceRemarks:"-"); ?></td>  
                        </tr>
                        <tr>
                            <td>Total Amount</td>
                            <td><?php echo e(($request->totalAmount != "")?"$".$request->totalAmount:"-"); ?></td>  
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 
        <?php if($request->paymentDetails_id != ""): ?>
        <div class="tile mt-5">
            <div class="tile-header">
                    <h3>Payment Details</h3>
            </div>
            <div class="tile-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <td>Payment Status</td>
                            <td><span class="<?php echo e(($request->request_status_id != 6)?'bg-danger':'bg-success'); ?> text-white p-1 font-weight-bold"><?php echo e(ucwords($request->requestStatus->title)); ?></span></td>
                            </td>
                        </tr>
                        <tr>
                            <td>Payment Id</td>
                            <td><?php echo e(($request->paymentdetails->paymentId != "")?$request->paymentdetails->paymentId:"-"); ?></td>
                        </tr>
                        <tr>
                            <td>Billing Address</td>
                            <td><?php echo e(($request->paymentdetails->billingAddress != "")?ucwords($request->paymentdetails->billingAddress):"-"); ?></td>
                        
                        </tr>
                        <tr>
                            <td>City</td>
                            <td><?php echo e(($request->paymentdetails->billingCity != "")?ucwords($request->paymentdetails->billingCity):"-"); ?></td>
                        
                        </tr>
                        <tr>
                            <td>State</td>
                            <td><?php echo e(($request->paymentdetails->billingState != "")?ucwords($request->paymentdetails->billingState):"-"); ?></td>
                        
                        </tr>
                        <tr>
                            <td>Country</td>
                            <td><?php echo e(($request->paymentdetails->country_id != "")?ucwords($request->paymentdetails->country->title):"-"); ?></td>
                        
                        </tr>
                        <tr>
                            <td>Zip Code</td>
                            <td><?php echo e(($request->paymentdetails->billingZipCode != "")?$request->paymentDetails->billingZipCode:"-"); ?></td>
                        
                        </tr>
                        
                        
                        
                    </tbody>
                </table>
                
            </div>
        </div>
        <?php endif; ?>
        <div>
            <a href="<?php echo e(URL::to('/admin/request/'.$request->id.'/edit')); ?>" class="btn btn-success text-uppercase float-right mb-2">Update Details</a> 
        </div>
    </main>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/request/show.blade.php ENDPATH**/ ?>