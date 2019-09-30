<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-arrow-circle-o-right"></i> Assigned Airport List </h1>
            </div>
            <span class="float-right"><a href="<?php echo e(URL::to('/admin/vendors/assign')); ?>" class="btn btn-success text-uppercase">Assign Vendor</a></span>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">                      
                    <div class="tile-body">          
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
                                    <option value="<?php echo e($vendor->id); ?>" <?php echo e(($vendorId == $vendor->id)?"selected":""); ?>><?php echo e(ucwords($vendor->name)); ?></option>
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
                    </div>
                </div>
                <?php if(count($airports) > 0): ?>
                <div class="tile pb-5"> 
                    <div class="tile-body">  
                    <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?> 
                    <table class="table table-hover table-bordered" id="tblVendor">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Airport Name</th>  
                                    <th>Priority</th>                                                           
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $airports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $airport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$count); ?></td>                                     
                                        <td><?php echo e($airport->airportName); ?></td>  
                                        <td><?php echo e($airport->pivot->priority); ?></td>
                                        <td>
                                        <?php echo e(Form::open(array('url' => '/admin/vendors/' . $vendorId.'/'.$airport->id.'/detach', 'class' => 'pull-right'))); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                        <?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])); ?>

                                        <?php echo e(Form::close()); ?>

                                        </td>             
                                       
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php else: ?> 
                    <div class="alert alert-danger"><p>No Airports are available.</p></div>
                <?php endif; ?>
            </div>
        </div>
    </main>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    $("#vendor").change(function(){
        if($("#vendor").val() != ""){
            window.location.replace("/admin/vendors/"+$("#vendor").val()+"/airportlist");		
        }		
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/vendor/assignedairport.blade.php ENDPATH**/ ?>