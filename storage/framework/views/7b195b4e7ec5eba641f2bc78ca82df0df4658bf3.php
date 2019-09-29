<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Actions</h1>
                </div>
            <span class="float-right"><a href="<?php echo e(URL::to('/admin/action/create')); ?>" class="btn btn-danger text-uppercase">Create Action</a></span>
            
        </div>

        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        <?php if(session('success')): ?>
                            <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                        <?php endif; ?>
                        <?php if($allActions->count() > 0): ?>
                            <table class="table table-hover table-bordered" id="tblAction">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Action Title</th>                                                              
                                    <th>Status</th>
                                    <th>Created Time</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $allActions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allAction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e(++$count); ?></td>                                     
                                        <td><?php echo e(($allAction->title != "" ? $allAction->title:"-")); ?></td>  
                                        <td><?php echo e(($allAction->status == 1 ?"Active":"Not Active")); ?></td> 
                                        <td><?php echo e($allAction->created_at); ?></td> 
                                       
                                        <td>
                                        <?php echo e(Form::open(array('url' => '/admin/action/' . $allAction->id, 'class' => 'pull-right'))); ?>

                                        <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                        <?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])); ?>

                                        <?php echo e(Form::close()); ?>

                                        </td>             
                                        <td><a href = "<?php echo e(URL::to('/admin/action/' . $allAction->id . '/edit')); ?>" class="btn btn-info "><i class="fa fa-pencil-square-o"></i></a></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                            </tbody>
                        </table>
                        
                         <?php else: ?>
                            <div class="alert alert-danger"><p>No Actions are available.</p></div>
                         <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/action/index.blade.php ENDPATH**/ ?>