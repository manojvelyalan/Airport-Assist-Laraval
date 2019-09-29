<?php $__env->startSection('content'); ?>
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i>Assign Action To Department</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">

                    <div class="tile-body ">
                    <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <form id="uploadimage" action="" method="post" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                            <div id="assignStatus" class="alert alert-success d-none text-center"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label class="form-control-label">DEPARTMENTS</label>
                                </div>
                                <div class="col-md-6 form-group">
                                   <select name="department" id="admindepartment" class="form-control field_size place_holder">
                                       <option value="">Select Department</option>
                                       <?php $__currentLoopData = $departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $department): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($department->id); ?>" <?php echo e(($departmentId == $department->id) ? "selected":""); ?>><?php echo e($department->title); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                                   <?php if ($errors->has('department')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('department'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>
                            </div>
                            <div class="row">
                                  <div class="col-md-12 mt-3 mb-3">
                                      <h3 class="text-center">ACTIONS</h3>
                                  </div>
                            </div>
                            <div class="row">
                                <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4"> <input type = "checkbox" value ="<?php echo e($action->id); ?>" name = "action[]" <?php echo e((in_array($action->id,$actionList))?"checked":""); ?>>
                                        <label class = "form-control-label"><?php echo e($action->title); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                            </div>

                            <?php if ($errors->has('action')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('action'); ?>
                                <span class="text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            <div class="row">
                                  <div class="col-md-12">
                                    <button type="submit" name="assign" class="btn btn-danger text-uppercase float-right <?php echo e(($departmentId == '')?'d-none':''); ?>" id="assign">Assign</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/assign/actiontodepartment.blade.php ENDPATH**/ ?>