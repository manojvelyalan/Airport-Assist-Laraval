<?php $__env->startSection('content'); ?>
<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-pencil-square-o"></i> Dashboard</h1>
            </div>
        </div>
        <div class="row">
        <div class="container">
                <div class="tile pb-5">    
                    
                    <div class="tile-body ">
                        Welcome <?php echo e(Auth::user()->username); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
</section>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>