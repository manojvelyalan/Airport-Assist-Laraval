<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title>Login - Airport Assist By MUrgency Admin</title>

   
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
     <!-- Scripts -->
    <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/main.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/plugins/pace.min.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/common.js')); ?>" defer></script>
</head>
  <body>
  <?php echo $__env->yieldContent('content'); ?>
    
  </body>
</html>

<script type="text/javascript">
      // Login Page Flipbox control
      $('.login-content [data-toggle="flip"]').click(function() {
      	$('.login-box').toggleClass('flipped');
      	return false;
      });
    </script><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/layouts/login.blade.php ENDPATH**/ ?>