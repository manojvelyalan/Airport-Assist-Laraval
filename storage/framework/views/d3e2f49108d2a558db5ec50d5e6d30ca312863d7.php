<?php $__env->startSection('content'); ?>
<section class="banner-header">

<div id="home-slider-carousel" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" id="airportserved">
                  <div class="carousel-item active">
                      <div class="d-block w-100" ></div>
                  </div>

  </div>

</div>
<div id="MUA-Band-Banner">
  <div class="MUA-Band-one">
    <div class="MUA-Band-Panel">
                          <p class="p1  text-white text-center lh-1 text-skewToNormal font-weight-bold "><?php echo e(strtoupper($displayAirportName)); ?> <span class="d-block mt-2 mb-2">by</span><img src="<?php echo e(asset('main/images/brand/murgency-logo.png')); ?>" width="120" alt="MUrgency Logo" ></p>
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
          <p class="text-uppercase ml-5 text-center text-white font-weight-bold text-skewToNormal fast-easy-hassle">Serving Airports Worldwide</p>
                                              <p class="text-center text-white text-skewToNormal ml-4">Airport Assist by MUrgency is the World's Largest Airport Assistance Network currently serving 626 Airports in 136 Countries. We are working to add more Airports to our network. We provide Departure, Arrival and Transit services in all these Airports listed below. You can also win big prizes from our Airport Assistance Websites by purchasing MUrgency Pen/s and participating in the Airport Assistance Grand Prize Draw</p>

                                      </div>
      </div>

  </div>
</div>
</div>
</section>
<section class="airport-served-location-detector pt-5 pb-5">
	<div class="container">
		<div class="form-wrappper w-40 m-auto">
			<form action="" method="post" id="ariportServedForm">
				<div class="input-group mb-3">
					<select name="country" class="form-control" id="country">
						<option value="">List all airport</option>
            <?php $__currentLoopData = $countryLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($key); ?>" <?php echo e(($countryId == $key)?"selected":""); ?>><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<!--<div class="input-group-append">
						<button class="btn btn-danger" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
					</div>-->
				</div>

			</form>
		</div>
	</div>
</section>
<section class="airports-listing-wrapper-3 mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 order-xl-1">
                <div class="row">
                  <?php
                    $c = 0;
                    $i=0;
                    ?>
                <?php $__currentLoopData = $airportServedLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airportServedList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($c == 0): ?>
                    <div class="col-md-6 mt-4">
                        <div class="card">

                            <div class="card-body" style="text-align: center !important;">
                                <table>
                                    <tbody>
                                      <?php endif; ?>
                                        <tr>
                                            <td>
                                                <i class="fa fa-circle" aria-hidden="true"></i>
                                                <span class=" ml-2"><?php echo e(ucwords($airportServedList->airportName)); ?></span>
                                            </td>
                                        </tr>
                                        <?php
                                          ++$c;
                                          ?>
                                          <?php if($i >= $airportServedLists->count() - 1 || $c ==17): ?>
                                          <?php
                                            $c = 0;
                                            ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
<?php
  ++$i;
  ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
            </div>
            <div class="col-md-4 order-1 order-md-2 order-xl-2 mt-4">
                <div class="card">
                    <div class="card-header"><h4> Featured Airport</h4></div>
                    <div class="card-body" style="text-align: center !important;">
                        <table>
                            <tbody>
                                <?php for($i=0;$i<count($featuredCity);$i++){?>
                                <tr>
                                    <td>
                                        <i class="fa fa-circle" aria-hidden="true"></i>
                                        <span class="ml-2"><a class="text-black" href="https://www.murgencyairportassistance.com/<?=$featuredCity[$i];?>/<?=$featuredCity[$i];?>"><?=ucwords($featuredCity[$i]);?></a></span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$("#country").change(function(){
    window.location.replace("/airportserved?cd="+$("#country").val());
});
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/main/home/served.blade.php ENDPATH**/ ?>