<?php $__env->startSection('content'); ?>

<section class="adminpage-section">
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text-o"></i> Create Blog</h1>
                </div>
            </div>

        <div class="row">
            <div class="container">
                <div class="tile pb-5">
                  <div class="tile-body">
                    <form id="createBlogs" action="<?php echo e(action('BlogController@store')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                        <div class="form-group row">
                        <label for="lblTitle" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>
                        <div class="col-md-9">
                            <input id="title" type="text" class="form-control <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="title"  autocomplete="title" placeholder="Title">
                            <?php if ($errors->has('title')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('title'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="lblDetails" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Details')); ?></label>
                        <div class="col-md-9">
                          <textarea id="details" class="form-control <?php if ($errors->has('details')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('details'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="details" autocomplete="details" placeholder="Details"></textarea>
                            <?php if ($errors->has('details')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('details'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        </div>

                        <div class="form-group row">
                        <label for="lblTags" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Tags')); ?></label>
                        <div class="col-md-9">
                          <input id="tags" type="text" class="form-control <?php if ($errors->has('tags')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tags'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="tags"  autocomplete="tags" placeholder="Tags">
                            <?php if ($errors->has('tags')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('tags'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        </div>


                        <div class="form-group row">
                        <label for="lblCategory" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Category')); ?></label>
                        <div class="col-md-9">
                          <select id="blogCategory" name="blogCategory" class="form-control <?php if ($errors->has('blogCategory')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('blogCategory'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>">
                            <option value="">Select Category</option>
                            <?php $__currentLoopData = $blogCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blogCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($blogCategory->id); ?>"><?php echo e($blogCategory->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                          <?php if ($errors->has('blogCategory')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('blogCategory'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                        </div>
                        </div>

                        <div class="form-group row d-none" id="imageDiv">
                            <label class="col-md-3 form-control-label text-md-right">Selected Image</label>
                            <div class="col-md-9" >
                                <img src="" class="img-fluid" alt="Image Preview" id="imagePreview">
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-3 form-control-label text-md-right">Main Image</label>
                            <div class="col-md-9">
                                 <input type="file" class=" form-control text-muted" id="postImage" name="postImage" aria-describedby="postHelp">
                                <small id="postHelp" class="form-text text-muted ">Please upload jpg, png files.</small>
                                <?php if ($errors->has('postImage')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('postImage'); ?>
                                <span class="text-danger" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>

                        </div>

                        <button name="createBlog" type="submit" class="btn btn-danger float-right" id="createBlog">Create Blog</button>

                    </form>
                  </div>
                </div>
            </div>
        </div>
      </main>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('js/tinymce/js/tinymce/tinymce.min.js')); ?>"></script>
<script type="text/javascript">
  tinymce.init({
    selector: 'textarea#details',
    height: 300,
    menubar: false,
    branding: false,
    plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table paste code help wordcount jbimages contextmenu'
    ],
    toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',


  });
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#imagePreview').attr('src', e.target.result);
              $("#imageDiv").removeClass("d-none");
          }

          reader.readAsDataURL(input.files[0]);
      }
  }

  $("#postImage").change(function(){
      $("#postHelp").removeClass("text-danger").addClass("text-muted");
      var notificationImage = $("#postImage").val();
      var extension = notificationImage.split('.').pop().toUpperCase();
      if(extension === "PNG" || extension === "JPG"){
          readURL(this);
      }else{
          $("#postHelp").removeClass("text-muted").addClass("text-danger");
      }
  }); 
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.common', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/blogs/create.blade.php ENDPATH**/ ?>