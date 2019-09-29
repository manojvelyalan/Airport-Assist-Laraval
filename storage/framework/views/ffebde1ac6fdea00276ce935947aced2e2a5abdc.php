<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Request</h1>
                </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="tile">
                    <div class="tile-body" style="overflow-x:auto;">
                        <?php $__currentLoopData = $requestStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $requestStat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-inline-block mb-2 p-2 ml-2 <?php echo e($requestStat->className); ?>"><h6><?php echo e(ucwords($requestStat->title)); ?></h6></div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <?php if($requests->count() > 0): ?>

                            <table class="table table-bordered pt-5" id="tblRequest" >
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Request Id</th>
                                        <th>Email</th>
                                        <th>Airport</th>
                                        <th>Service</th>
                                        <th>Arr Date & Time</th>
                                        <th>Dep Date & Time</th>
                                        <th>Repeat</th>
                                        <th>Responded By</th>
                                        <th>Requested Date</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr class="<?php echo e($request->requestStatus->className); ?>">
                                    <td><?php echo e(++$count); ?></td>
                                    <td><a href="<?php echo e(URL::to('/admin/request/' . $request->id)); ?>" class="text-danger"><?php echo e($request->serviceCode); ?></a></td>

                                    <td><?php echo e($request->email); ?></td>
                                    <td><?php echo e($request->originAirport); ?></td>
                                    <td><?php echo e(($request->serviceType != "")?$request->serviceType->title:"-"); ?></td>
                                    <td><?php echo e($request->arrivalDate." ".$request->arrivalTime); ?></td>
                                    <td><?php echo e($request->departureDate." ".$request->departureTime); ?></td>
                                    <td><?php echo e(($request->isRepeat)?"Yes":"No"); ?></td>
                                    <td><?php echo e(($request->respondedBy !="")?$request->respondedUser->email:""); ?></td>
                                    <td><?php echo e($request->created_at); ?></td>
                                    <td>
                                    <?php if(in_array($request->request_status_id,[1,2,3])): ?>

                                        <?php echo e(Form::open(array('url' => '/admin/request/' . $request->id.'/status'))); ?>

                                        <?php echo e(Form::hidden('_method', 'PUT')); ?>

                                        <?php echo e(Form::button(ucwords($request->requestStatus->title), ['type' =>'submit', 'class' => 'btn btn-secondary',])); ?>

                                        <?php echo e(Form::close()); ?>

                                    <?php else: ?>
                                        <?php echo e(ucwords($request->requestStatus->title)); ?>

                                    <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo e(Form::open(array('url' => '/admin/request/' . $request->id, 'class' => 'pull-right'))); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                        <?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])); ?>

                                        <?php echo e(Form::close()); ?>

                                    </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/request/index.blade.php ENDPATH**/ ?>