<?php $__env->startSection('content'); ?>
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-envelope-o"></i> Send Confirmation Mail</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
              <form id="createAction" action="<?php echo e(action('MailController@details')); ?>" method="post">
                  <?php echo csrf_field(); ?>
                <div class="tile pb-5">
                  <?php if(session('error')): ?>
                      <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                  <?php endif; ?>
                  <?php if(session('success')): ?>
                      <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                  <?php endif; ?>
                  <div class="form-group row">

                          <label for="lblRequestId" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Request Id')); ?></label>

                          <div class="col-md-9">
                              <input id="serviceCode" type="text" class="form-control <?php if ($errors->has('serviceCode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceCode'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="serviceCode"  autocomplete="serviceCode" placeholder="Enter Service Code" value="<?php echo e($serviceCode); ?>">

                              <?php if ($errors->has('serviceCode')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceCode'); ?>
                                  <span class="invalid-feedback" role="alert">
                                      <strong><?php echo e($message); ?></strong>
                                  </span>
                              <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                          </div>
                    </div>
                      <button name="submit" type="submit" class="btn btn-danger float-right" id="submit">Submit</button>

                  </div>

                </form>
                <?php if($details): ?>
                <div class="tile pb-5" id="reqDetails">
                    <form id="createAction" action="<?php echo e(action('MailController@sendConfirmation')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="row mt-4">
                            <div class="col-md-6 ">
                                <div class="form-group">
                                <input type="text" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" id="email" placeholder="Email" value="<?php echo e($data['email']); ?>">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('cNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cNumber'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cNumber" id="cNumber"
                                       placeholder="Confirmation Number" value="<?php echo e($data['cNumber']); ?>">

                                <?php if ($errors->has('cNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cNumber'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('pName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pName'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="pName" id="pName"
                                       placeholder="Passenger's Name" value="<?php echo e($data['pName']); ?>" >

                                <?php if ($errors->has('pName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('pName'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('noPassengers')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('noPassengers'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="noPassengers" id="noPassengers"
                                       placeholder="Number Of Passengers" value="<?php echo e($data['noPassengers']); ?>">

                                <?php if ($errors->has('noPassengers')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('noPassengers'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('serviceLocation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceLocation'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="serviceLocation" id="serviceLocation"
                                        placeholder="Service Location (Airport)" value="<?php echo e($data['serviceLocation']); ?>">

                                <?php if ($errors->has('serviceLocation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceLocation'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                  </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('serviceType')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceType'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="serviceType" placeholder="Service Type" id="serviceType" value="<?php echo e($data['serviceType']); ?>">

                                <?php if ($errors->has('serviceType')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('serviceType'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="arrivalDate" id="arrivalDate"
                                       placeholder="Arrival Date" value=<?php echo e($data['arrivalDate']); ?>>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="eta" placeholder="ETA" id="eta" value=<?php echo e($data['eta']); ?>>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="departureDate" id="departureDate"
                                       placeholder="Departure Date" value=<?php echo e($data['departureDate']); ?>>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="etd" placeholder="ETD " id="etd" value=<?php echo e($data['etd']); ?>>
                            </div>
                            <div class="col-md-6 form-group">
                                <div class="form-group">
                                    <input type="text" class="form-control <?php if ($errors->has('flightNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('flightNumber'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="flightNumber" placeholder="Flight Number" id="flightNumber" value=<?php echo e($data['flightNumber']); ?>>

                                <?php if ($errors->has('flightNumber')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('flightNumber'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="pNumber"
                                       placeholder="Passenger's Contact Number"  id="pNumber" value="<?php echo e($data['pNumber']); ?>">
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
                <?php endif; ?>
            </div>
        </div>
    </main>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/mail/confirmation.blade.php ENDPATH**/ ?>