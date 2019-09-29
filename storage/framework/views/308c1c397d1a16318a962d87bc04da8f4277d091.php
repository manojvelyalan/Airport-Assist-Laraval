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
                <div id="step-1">
                        <h1 class="text-center text-uppercase font-weight-bold">Personal Details</h1>
                        <P class="ml-5">Book fast track, meet & assist, VIP service, personal escort, special needs, limousine, baggage handler, lounge access, and much more for arrival, departure, and transit at all airports in the world. Leave us with the information and we will leave you with an extraordinary travel experience.</P>
                        <p class="text-center"></p>
                        <form  role="form" id="step-1-form" method="post" action="<?php echo e(action('Main\RequestController@postStep1')); ?>">
<?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <div class="input-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email" id="email" value="<?php echo e(($request == false)?old('email'):$request->email); ?>" >

                                    </div>
                                    <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                        								<span class="text-danger" role="alert">
                        										<strong><?php echo e($message); ?></strong>
                        								</span>
                        						<?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="form-group col-md-7">
                                    <input  class="form-control" name="email_confirmation" placeholder ="Confirm Email" id="email_confirmation" value="<?php echo e(($request == false)?old('email_confirmation'):$request->email); ?>">
                                    <?php if ($errors->has('email_confirmation')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email_confirmation'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input  class="form-control" name="originAirport" placeholder ="Airport where you want service" id="originAirport" value="<?php echo e(($request == false)?old('originAirport'):$request->originAirport); ?>">
                                    <?php if ($errors->has('originAirport')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('originAirport'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <?php
                              $titleName = ($request == false)?old('titleName'):$request->titleName;
                            ?>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <select class="form-control" id="titleName" name="titleName">
                                      <option value="">Title</option>
                                      <?php $__currentLoopData = $titles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <option value="<?php echo e($title->title); ?>" <?php echo e(($title->title == $titleName)?"selected":""); ?>><?php echo e(ucfirst($title->title)); ?></option>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if ($errors->has('titleName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('titleName'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="firstName" placeholder="FirstName"  id="firstName" value="<?php echo e(($request == false)?old('firstName'):$request->firstName); ?>">
                                    <?php if ($errors->has('firstName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('firstName'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name"  id="lastName" value="<?php echo e(($request == false)?old('lastName'):$request->lastName); ?>">
                                    <?php if ($errors->has('lastName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('lastName'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="form-row mb-2">
                                <div class="col-md-12">
                                    <input type="tel" class="form-control" id="mobile_number" name="mobile_number">
                                    <?php if ($errors->has('mobile_number')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('mobile_number'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    <?php if ($errors->has('country_code')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('country_code'); ?>
                                        <span class="text-danger" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <input type="hidden" name="country_code" id="country_code">
                            <input type="hidden" name="request_id" id="request_id" value="<?php echo e($request_id); ?>">
                            <div class="btn-group float-right" role="group">
                                <span class="text-uppercase mt-3 pr-3">step 1 of 3</span>
                                <button type="submit" id="step-1-btn" class="btn btn-MUA-next float-right brand-bg-red">Next

                                </button>
                            </div>
                        </form>
                    </div>

                        </div>
                    </div>
            </div>
        </div>
    </section>
	<!-- sect 2 tab system -->

</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
var input = document.querySelector("#mobile_number");
  var iti = intlTelInput(input, {
    // allowDropdown: false,
    // autoHideDialCode: false,
    // autoPlaceholder: "off",
    dropdownContainer: document.body,
    // excludeCountries: ["us"],
  //   formatOnDisplay: false,
    // geoIpLookup: function(callback) {
    //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
  //       var countryCode = (resp && resp.country) ? resp.country : "";

  //       callback(countryCode);
  //     });
  //   },
     hiddenInput: "country_code",
    // initialCountry: "auto",
    // localizedCountries: { 'de': 'Deutschland' },
    // nationalMode: false,
    // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
  //   placeholderNumberType: "MOBILE",
     preferredCountries: ['us', 'in'],
     separateDialCode: true,
    utilsScript: "<?php echo e(asset('main/build/js/utils.js')); ?>",

  });
  <?php if($full_number != ""): ?>
  iti.setNumber("<?php echo e($full_number); ?>");
  <?php endif; ?>
  $("#step-1-btn").click(function(){
      var country = iti.getSelectedCountryData();
      $("#country_code").val(country.dialCode);
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
setTimeout(function() {
       $(".text-danger").hide('blind', {}, 500)
   }, 2000);
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/request/step-1.blade.php ENDPATH**/ ?>