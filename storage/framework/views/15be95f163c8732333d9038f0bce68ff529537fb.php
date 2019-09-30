<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-arrow-circle-o-right"></i> Assign Vendor </h1>
            </div>
            <span class="float-right"><a href="<?php echo e(URL::to('/admin/vendor/create')); ?>" class="btn btn-success text-uppercase">Create Vendor</a></span>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">                      
                    <div class="tile-body">
                        <form id="assignVendor" action="<?php echo e(action('VendorController@assignVendor')); ?>" method="post">
                                <?php echo csrf_field(); ?>               
                            <div class="form-group row">
                                <label for="labelVendorName" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Vendor Name')); ?></label>

                                <div class="col-md-9">
                                    <select id="vendor" type="text" class="form-control <?php if ($errors->has('vendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vendor'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="vendor"  autocomplete="vendor" placeholder="Select Vendor">
                                    <option value="" selected>Select Vendor</option>
                                    <?php $__currentLoopData = $vendors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vendor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($vendor->id); ?>"><?php echo e(ucwords($vendor->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>

                                    <?php if ($errors->has('vendor')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('vendor'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>  
                            <div class="form-group row">
                                <label for="labelAirportName" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Airport Name')); ?></label>

                                <div class="col-md-9">
                                    <input  class="form-control" name="airportName" placeholder ="Airport Name" id="airportName">
                                    <?php if ($errors->has('airportName')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('airportName'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div> 
                            
                            <div class="form-group row">
                                <label for="labelPriority" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Priority')); ?></label>

                                <div class="col-md-9">
                                <select id="priority" type="text" class="form-control <?php if ($errors->has('priority')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('priority'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="priority"  autocomplete="priority" placeholder="Select Priority">
                                    <option value="" selected>Select Priority</option>
                                    <?php for($i = 1; $i <= 10; $i++): ?>
                                    <option value=" <?php echo e($i); ?>"> <?php echo e($i); ?></option>
                                    <?php endfor; ?>
                                    </select>

                                    <?php if ($errors->has('priority')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('priority'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div> 
                            <button name="assignVendor" type="submit" class="btn btn-danger float-right" id="assignVendor">Assign</button> 
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
$("#airportName").autocomplete({
    minLength: 3,
    source: "/admin/airport/autocomplete",
    focus: function(event, ui) {
        $("#airportName").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    },
    select: function(event, ui) {
        $("#airportName").val(ui.item.airportName.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        }));
        return false;
    }
}).data("ui-autocomplete")._renderItem = function(ul, item) {
    return $("<li>").data("ui-autocomplete-item", item).append("<span class='airport-code'>" + item.iata + "</span>" + " " + "<span class='airport-name'>" + item.airportName + "</span>" + "<div class='autocomplete-divider'></div>").appendTo(ul);
};
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/vendor/assign.blade.php ENDPATH**/ ?>