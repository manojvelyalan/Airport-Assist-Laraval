<?php $__env->startSection('content'); ?>
<section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content">
      <div class="logo">
        <h1>Admin - Airport Assist By MUrgency</h1>
      </div>

      <div class="login-box">
      <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
                        <?php echo csrf_field(); ?>
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <input class="form-control" type="text" placeholder="Email" autofocus id="email" name="email">
            <span class="text-danger d-dnone" id="emailError"></span>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" placeholder="Password" id="password" name="password">
            <span class="text-danger d-dnone" id="passwordError"></span>
          </div>
          
          <div class="form-group btn-container">
              <button class="btn btn-primary btn-block" type="submit" id="loginButton"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN </button>
          </div>
          <div class="alert alert-danger d-none" id="loginError"></div>
          <div class="form-group mt-3">
            <div class="utility">
              <div class="animated-checkbox">
                <!--<label>
                  <input type="checkbox"><span class="label-text">Stay Signed in</span>
                </label>-->
              </div>
                <p class="semibold-text mb-2"><a href="#" data-toggle="flip" class="text-danger">Forgot Password ?</a></p>
            </div>
          </div>
        </form>
        
        <form class="forget-form">
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
          <span id="resetStatus" class="d-none"></span>
          <div class="form-group">
            <label class="control-label">EMAIL</label>
            <input class="form-control" type="text" placeholder="Email" id="resetEmail">
            <span class="text-danger d-none" id="resetEmailError"></span>
          </div>
          <div class="form-group btn-container">
              <button class="btn btn-primary btn-block" type="button" id="reset"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET<i class="fa fa-spinner d-none" id="FAReset"></i></button>
          </div>
          <div class="form-group mt-3">
              <p class="semibold-text mb-0"><a href="#" data-toggle="flip" class="text-danger"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
          </div>
        </form>
      </div>
    </section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/admin/login.blade.php ENDPATH**/ ?>