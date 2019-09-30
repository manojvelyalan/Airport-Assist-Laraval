<?php $__env->startSection('content'); ?>

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
              <?php
                $service_type = ($request->service_type_id == "")?old('service_type'):$request->service_type_id;
                if($request->flightNumber != ""){
                  $flightArray = explode("-",$request->flightNumber);
                  $flightNumber = $flightArray[1];
                  $airlineName = $flightArray[0];
                }else{
                  $flightNumber = old('flightNumber');
                  $airlineName = old('airlineName');
                }
                if($request->transitFlightNumber != ""){
                  $tflightArray = explode("-",$request->transitFlightNumber);
                  $transitNumber = $tflightArray[1];
                  $tairlineName = $tflightArray[0];
                }else{
                  $transitNumber = old('transitNumber');
                  $tairlineName = old('TAirlineName');
                }
                $isPick = true;
                if($request->isPickup == true || old('isPickUp') == "pickup"){
                  $isPick = true;
                }else{
                  $isPick = false;
                }
              ?>
              <div id="step-2" >
                      <h1 class="text-center text-uppercase font-weight-bold  pb-2">Flight Details</h1>
                      <P class="ml-1 <?php echo e(($service_type == 1)?'d-none':''); ?>" id="details">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>

                      <p class="text-center"></p>
                      <div class="btn-group d-block text-center container" role="group">

                          <form class="pb-1 " id="step-2-form" action="<?php echo e(action('Main\RequestController@postStep2',[$request->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                                  <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <select name="service_type" id="service_type" class="form-control">
                                            <option value="">Select Service Type</option>
                                              <?php $__currentLoopData = $serviceTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $serviceType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($serviceType->id); ?>" <?php echo e(($service_type == $serviceType->id)?"selected":""); ?>><?php echo e(ucwords($serviceType->title)); ?></option>
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          </select>
                                          <?php if ($errors->has('service_type')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('service_type'); ?>
                              								<span class="text-danger" role="alert">
                              										<?php echo e($message); ?>

                              								</span>
                              						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                      </div>

                                  </div>
                                  <div id="lim" class="<?php echo e(($service_type != 1)?'d-none':''); ?>" >
                                  <div class="row">
                                      <div class="col-md-12">
                                          <div class="card mb-3 pt-2 bs-2">
                                              <div class="row">
                                                  <div class="col-md-6 form-group">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="pickUp" value="pickup" name="isPickUp" <?php echo e(($isPick)?'checked':''); ?> />
                                                              Pick up
                                                          </label>
                                                      </div>
                                                  </div>
                                                  <div class="col-md-6">
                                                      <div class="radio">
                                                          <label>
                                                              <input type="radio" id="drop" value="drop" name="isPickUp" <?php echo e((!$isPick)?'checked':''); ?> />
                                                              Drop
                                                          </label>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                      <div class="form-group col-md-12">
                                              <textarea name="pickordropAddress" class="form-control" placeholder="Pick Up / Drop Address" rows="2" id="pickordropAddress"><?php echo e(($request->pickOrDropAddress != "")?$request->pickOrDropAddress:old('pickordropAddress')); ?></textarea>
                                              <?php if ($errors->has('pickordropAddress')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pickordropAddress'); ?>
                                                 <span class="text-danger" role="alert">
                                                    <?php echo e($message); ?>

                                                 </span>
                                              <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                       </div>

                                  </div>
                                </div>
                                  <div class="form-row">
                                      <div class="input-group form-group col-md-6" >
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="airlineName" name="airlineName" value="<?php echo e($airlineName); ?>">

                                           <input type="text" class="form-control" placeholder="<?php echo e(($service_type == 4)?'Departure flight no.':'Arrival flight no.'); ?>" id="flightNumber" name="flightNumber" onkeypress="return isNumberKey(event)" value="<?php echo e($flightNumber); ?>">

                                      </div>

                                      <div class="input-group form-group col-md-6 " id="transit">
                                          <input type="text" class="form-control col-md-5" placeholder="Airline code" id="TAirlineName" <?php echo e(($service_type != 5)?'disabled':''); ?>  name="TAirlineName" value="<?php echo e($tairlineName); ?>">

                                          <input type="text" class="form-control" placeholder="Transit flight no." id="transitNumber"  <?php echo e(($service_type != 5)?'disabled':''); ?> name="transitNumber" onkeypress="return isNumberKey(event)" value="<?php echo e($transitNumber); ?>">

                                      </div>
                                      <?php if ($errors->has('airlineName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('airlineName'); ?>
                                         <span class="text-danger" role="alert">
                                            <?php echo e($message); ?>

                                         </span>
                                      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                      <?php if ($errors->has('flightNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('flightNumber'); ?>
                                        <span class="text-danger ml-4" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                      <?php if ($errors->has('TAirlineName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('TAirlineName'); ?>
                                         <span class="text-danger" role="alert">
                                            <?php echo e($message); ?>

                                         </span>
                                      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                      <?php if ($errors->has('transitNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('transitNumber'); ?>
                                        <span class="text-danger ml-4" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                  </div>
                                  <div class="form-row <?php echo e(($service_type == 4)?'d-none':''); ?>" id="arrival">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalDate" class="form-control" placeholder="Arrival Date" name="arrivalDate" value="<?php echo e(($request->arrivalDate != "")?date('m/d/Y',strtotime($request->arrivalDate)):old('arrivalDate')); ?>">
                                          <?php if ($errors->has('arrivalDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('arrivalDate'); ?>
                                            <span class="text-danger" role="alert">
                                              <?php echo e($message); ?>

                                            </span>
                                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="arrivalTime" class="form-control" placeholder="Arrival Time" name="arrivalTime"  value="<?php echo e(($request->arrivalTime != "")?$request->arrivalTime:old('arrivalTime')); ?>">
                                          <?php if ($errors->has('arrivalTime')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('arrivalTime'); ?>
                                            <span class="text-danger" role="alert">
                                              <?php echo e($message); ?>

                                            </span>
                                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                           </div>
                                  </div>
                                  <div class="form-row <?php echo e((!in_array($service_type,[4,5]))?'d-none':''); ?>" id="departure">
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureDate" class="form-control" placeholder="Departure Date" name="departureDate" value="<?php echo e(($request->departureDate != "")?date('m/d/Y',strtotime($request->departureDate)):old('departureDate')); ?>">
                                          <?php if ($errors->has('departureDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('departureDate'); ?>
                                            <span class="text-danger" role="alert">
                                              <?php echo e($message); ?>

                                            </span>
                                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                          </div>
                                      <div class="form-group col-md-6">
                                          <input type="text" id="departureTime" class="form-control" placeholder="Departure Time" name="departureTime" value="<?php echo e(($request->departureTime != "")?$request->departureTime:old('departureTime')); ?>">
                                          <?php if ($errors->has('departureTime')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('departureTime'); ?>
                                            <span class="text-danger" role="alert">
                                              <?php echo e($message); ?>

                                            </span>
                                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                      </div>
                                  </div>
                                  <div class="btn-group float-right" role="group">
                                    <a href="/service?r=<?php echo e($request->id); ?>" class="btn btn-MUA-next float-right brand-bg-red ">Previous</a>

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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
  <script src="<?php echo e(asset('main/js/common.js')); ?>" type="text/javascript"></script>
  <script>
  setTimeout(function() {
         $(".text-danger").hide('blind', {}, 500)
     }, 2000);
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/request/step-2.blade.php ENDPATH**/ ?>