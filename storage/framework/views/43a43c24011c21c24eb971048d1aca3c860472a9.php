<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Payment Report</h1>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile pb-5">

                    <div class="tile-body ">
                        <form id="createAction" action="<?php echo e(action('ReportController@processPaid')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                            <div class="form-group row">
                            <label for="lblFromDate" class="col-md-3 col-form-label text-md-right"><?php echo e(__('From Date')); ?></label>

                            <div class="col-md-9">
                                <input id="fromDate" type="text" class="form-control <?php if ($errors->has('fromDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fromDate'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="fromDate"  autocomplete="fromDate">

                                <?php if ($errors->has('fromDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('fromDate'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            </div>

                            <div class="form-group row">
                            <label for="lblToDate" class="col-md-3 col-form-label text-md-right"><?php echo e(__('To Date')); ?></label>

                            <div class="col-md-9">
                                <input id="toDate" type="text" class="form-control <?php if ($errors->has('toDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('toDate'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="toDate"  autocomplete="toDate">

                                <?php if ($errors->has('toDate')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('toDate'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                            </div>




                            <button name="createDepartment" type="submit" class="btn btn-danger float-right" id="createDepartment">Submit</button>

                        </form>
                        </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script type="text/javascript">
    $("#fromDate").datepicker();
    $("#toDate").datepicker();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/report/payment.blade.php ENDPATH**/ ?>