<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> List All Actions</h1>
                </div>
            <span class="float-right"><a href="<?php echo e(URL::to('/admin/blogs/create')); ?>" class="btn btn-danger text-uppercase">Create Blog</a></span>

        </div>

        <div class="row">
            <div class="container">
                <div class="tile pb-5">
                  <div class="tile-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                      <?php if($blogs->count() > 0): ?>
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="row mb-4">
                              <div class="col-md-4"><img src="<?php echo e(URL::asset('images/blog/'.$blog->image)); ?>" class="img-thumbnail" alt="<?php echo e($blog->tags); ?>"></div>
                              <div class="col-md-8">
                                  <p><a href="<?php echo e(URL::to('/admin/blogs/'. $blog->id)); ?>" class="text-dark"><h4><?php echo e($blog->title); ?></h4></a></p>
                                  <p><?=substr(strip_tags($blog->content),0,200);?></p>
                                  <span class="float-right">
                                      <?php echo e(date('d/M/Y',strtotime($blog->created_at))); ?><br><br>
                                      <?php echo e(Form::open(array('url' => '/admin/blogs/' . $blog->id, 'class' => 'pull-right'))); ?>

                                      <?php echo e(Form::hidden('_method', 'DELETE')); ?>

                                      <?php echo e(Form::button('<i class="fa fa-trash"></i>', ['type' =>'submit', 'class' => 'btn btn-danger'])); ?>

                                      <?php echo e(Form::close()); ?>

                                      <a href = "<?php echo e(URL::to('/admin/blogs/' . $blog->id . '/edit')); ?>" class="btn btn-info mr-1"><i class="fa fa-pencil-square-o"></i></a>
                                 </span>
                              </div>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                      <?php else: ?>
                      <div class="alert alert-danger"><p>No blogs are available.</p></div>
                      <?php endif; ?>
                  </div>
                </div>
            </div>
        </div>
  </main>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/blogs/index.blade.php ENDPATH**/ ?>