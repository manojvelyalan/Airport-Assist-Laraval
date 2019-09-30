<?php $__env->startSection('content'); ?>
<section class="contact-us-form-section">
    <section class="banner-header">
    <div id="home-slider-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" id="contactus">
            <div class="carousel-item active">
                <div class="d-block w-100" >
                </div>
            </div>
        </div>
    </div>
    <div id="MUA-Band-Banner">
        <div class="MUA-Band-one-White">
            <div class="text-skewToNormal form-wrapper">
                <div id="step-1">
                    <h1 class="text-center text-uppercase font-weight-bold mt-1">Contact Us</h1>
                    <p class="text-center mt-3 mb-3 ml-4">
                        Send us your questions or concerns and we will be happy to assist.
                    </p>

                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                        <form class="pb-5 mt-5" role="form" id="contactForm" action="<?php echo e(action('Main\MailController@contact_send')); ?>" method="post">
                          <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name" id="fullName" value="<?php echo e(old('fullName')); ?>">
                                    <?php $__errorArgs = ['fullName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6" id="airport-autocomplete">
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email"value="<?php echo e(old('email')); ?>" >
                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 form-group">
                                        <input type="tel" class="form-control" id="mobile_number_country" name="mobile_number_country" placeholder="Country Code"   readonly>
                                        <?php $__errorArgs = ['mobile_number_country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" role="alert">
                                                <?php echo e($message); ?>

                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="col-md-4 form-group">
        <input type="tel" class="form-control" name="phoneNumber" placeholder="Phone number" id="phoneNumber" value="<?php echo e(old('phoneNumber')); ?>">
        <?php $__errorArgs = ['phoneNumber'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="text-danger" role="alert">
                <?php echo e($message); ?>

            </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-5" id="airport-autocomplete">
                                    <input type="text" class="form-control" name="subject" placeholder="Subject" id="subject" value="<?php echo e(old('subject')); ?>">
                                    <?php $__errorArgs = ['subject'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger" role="alert">
                                            <?php echo e($message); ?>

                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Message" id="message"><?php echo e(old('message')); ?></textarea>
                                <?php $__errorArgs = ['message'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" role="alert">
                                        <?php echo e($message); ?>  
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="btn-group float-right" role="group">
                                <button type="submit" class="btn btn-MUA-next float-right brand-bg-red" id="contact"><i class="ion-android-arrow-forward" id="contactFA"></i>
                                </button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>
</section>


</section>

<section class="contact-us-footer-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12 plr-clear">
                <div class="bg-image mb-5">
                    <div class="row">
                        <div class="col-md-4 head-quarters">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="m-l-2">
                                        <img src="<?php echo e(asset('main/images/brand/favicon-32x32.png')); ?>" alt="Airport Assist By MUrgency"/>
                                        <p class="mt-3">Head Quarters</p>
                                    </div>
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1">San Fransisco</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        MUrgency <br>
                                        1885 Mission Street <br>
                                        Impact Hub San Fransisco - D5 <br>
                                        San Fransisco, CA, 94103 <br>
                                        United States of America
                                    </p>
                                    <p class="m-l-2">
                                        <a href="#"
                                           target="_blank">MUAirportAssist@MUrgency.com</a>
                                        <br> <br>
                                        Global Contact Centre<br>
                                        <a href="https://web.whatsapp.com/send?phone=+16503089964&text=Hello MUrgnecy Airport Assistance" target="_blank"><img src="<?php echo e(asset('main/images/icons/whatsapp_logo.png')); ?>" style="height: 25px;" alt=""> +971 52 790 5292</a><br>
        <a href="https://web.whatsapp.com/send?phone=+16503089964&text=Hello MUrgnecy Airport Assistance" target="_blank"><img src="<?php echo e(asset('main/images/icons/whatsapp_logo.png')); ?>" style="height: 25px;" alt=""> +91 90 720 55511</a>
</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1 text-uppercase">New York</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        183, Madison Ave <br>
                                        Suite 1450 <br>
                                        New York, NY, 10016-4501 <br>
                                        United States of America
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1 text-uppercase">London</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        Impact Investment Partners <br>
                                        16,Hanover Square <br>
                                        London, W1S 1HT <br>
                                        United Kingdom
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1 text-uppercase">Dubai</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        Oud Metha Offices, <br>
                                        Suite 204, Oud Metha Area, <br>
                                        Dubai Health Care City <br>
                                        Dubai PO Box 119631 <br>
                                        United Arab Emirates
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1">Mumbai</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        The Garage
                                        210, S B Marg <br>
                                        Lower Parel <br>
                                        Mumbai 400013 <br>
                                        India
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1">Singapore</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        10 UBI Crescent <br>
                                        Suite 02-82 <br>
                                        UBI Techpark <br>
                                        Singapore 408564
                                    </p>
                                </div>
                                <div class="col-md-4 col-sm-12 col-12">
                                    <div class="head-quarters-city pb-4">
                                        <img src="<?php echo e(asset('main/images/icons/location.png')); ?>" height="30" alt="">
                                        <span class="ml-1">HongKong</span>
                                    </div>
                                    <p class="city-address m-l-2">
                                        Apece Plaza, Suite 2102 <br>
                                        49 Hoi Yuen Road <br>
                                        Kwun Tong, Kowloon <br>
                                        Hong Kong
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$("#mobile_number_country").intlTelInput({
    preferredCountries: ["us"],
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/contact/contact.blade.php ENDPATH**/ ?>