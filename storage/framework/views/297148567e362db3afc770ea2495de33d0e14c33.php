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
              <div id="step-3">
                                      <h1 class="text-center text-uppercase font-weight-bold">Traveller Details</h1>
                                      <P class="ml-4">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>

                                      <p class="text-center"></p>
                                      <form class="pb-5 ml-4" id="step-3-form" action="<?php echo e(action('Main\RequestController@postStep3',[$request->id])); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <?php
                                           $class_of_travel_id = ($request->classOfTravel_id == "")?old('classOfTravel'):$request->classOfTravel_id;
                                        ?>
                                          <div class="alert alert-danger d-none" id="main-2-Error"></div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                          <input type="text" name="adults" placeholder="Adults" id="adults" class="form-control"  value="<?php echo e(($request->adults != "")?$request->adults:old('adults')); ?>">

                                                      </div>
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                              <input type="text" name="children" placeholder="Children(2-12 years)" id="children" class="form-control"  value="<?php echo e(($request->children != "")?$request->children:old('children')); ?>">

                                                      </div>
                                                      <div class="form-group col-md-4 col-sm-12 col-12">
                                                              <input type="text" name="infants" placeholder="Infants(0-2 years)" id="infants" class="form-control"  value="<?php echo e(($request->infants != "")?$request->infants:old('infants')); ?>">

                                                      </div>
                                                      <?php if ($errors->has('adults')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('adults'); ?>
                                                          <span class="text-danger" role="alert">
                                                              <?php echo e($message); ?>

                                                          </span>
                                                      <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                          <select name="classOfTravel" class="form-control" id="classOfTravel">
                                                            <option value="">Select class of travel</option>
                                                              <?php $__currentLoopData = $classOfTravels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classOfTravel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($classOfTravel->id); ?>" <?php echo e(($class_of_travel_id == $classOfTravel->id)?"selected":""); ?>><?php echo e(ucwords($classOfTravel->title)); ?></option>
                                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                          </select>
                                                          <?php if ($errors->has('classOfTravel')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('classOfTravel'); ?>
                                                              <span class="text-danger" role="alert">
                                                                  <?php echo e($message); ?>

                                                              </span>
                                                          <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                                      </div>
                                              </div>
                                              <div class="form-row">
                                                      <div class="form-group col-md-12">
                                                              <textarea name="message" rows="2" class="form-control" placeholder="Message" id="message"><?php echo e(($request->message != "")?$request->message:old('message')); ?></textarea>
                                                      </div>
                                              </div>


                                              <div class="btn-group float-right" role="group">
                                                <a href="/step-2/<?php echo e($request->id); ?>" class="btn btn-MUA-next float-right brand-bg-red ">Previous</a>

                                                      <span class="text-uppercase mt-3 pl-3 pr-3">Done</span>
                                                      <button type="submit" id="step-3-btn" class="btn btn-MUA-next float-right brand-bg-red">
                                                          Submit

                                                      </button>
                                              </div>
                                      </form>
                              </div>

            </div>
        </div>
    </section>
	<!-- sect 2 tab system -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/request/step-3.blade.php ENDPATH**/ ?>