<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('main/images/favicon-32x32.png')); ?>">
    <title>Airport Assist</title>


    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/main.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery-ui.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/jquery.timepicker.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/datatable.css')); ?>">



</head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Airport Assist</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">

        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
           <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>-->
            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out fa-lg"></i> Logout</a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                      </li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src= "<?php echo e((Auth::user()->profileImage != '')?
          URL::asset('images/users/'.Auth::user()->profileImage): URL::asset('images/users/profile.png')); ?>" alt="User Image" style="width:50px;height: 50px;">

        <div>
          <p class="app-sidebar__user-name"><?php echo e(ucwords(Auth::user()->firstName .' '. Auth::user()->lastName)); ?></p>

          <p class="app-sidebar__user-designation">Super Admin<br><a href="updateprofile" class="edit_profile">Edit Profile</a><br></p>


        </div>
      </div>
      <ul class="app-menu">
          <li><a class="app-menu__item active" href="<?php echo e(route('dashboard')); ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
        <li><a class="app-menu__item" href="<?php echo e(URL::to('/admin/request')); ?>"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">List All Request</span></a></li>
       <!-- <li><a class="app-menu__item" href="listallraffle"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">List All Raffle</span></a></li>
        <li><a class="app-menu__item" href="partnerlist"><i class="app-menu__icon fa fa-list"></i><span class="app-menu__label">List All Partners</span></a></li>-->

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-rss"></i><span class="app-menu__label">Blog</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/blogs')); ?>"><i class="icon fa fa-file-text-o"></i>List All Blog</a></li>
                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/blogs/create')); ?>"><i class="icon fa fa-pencil-square-o"></i>Create Blog</a></li>
                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/blog-comments')); ?>"><i class="icon fa fa-comments-o"></i>View Blog Comments</a></li>

            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Settings</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="listallfeedback"><i class="icon fa fa-comments-o"></i>Feedback List</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('sendinvoice')); ?>"><i class="icon fa fa-envelope-o"></i>Send Invoice</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('sendconfirmation')); ?>"><i class="icon fa fa-envelope-o"></i>Send Confirmation Mail</a></li>
                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/vendor')); ?>"><i class="icon fa fa-file-text-o"></i>Vendor List</a></li>
                <li><a class="treeview-item" href="listallsubscribes"><i class="icon fa fa-file-text-o"></i>Subscriber List</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('adminuserlist')); ?>"><i class="icon fa fa-file-text-o"></i>Administrator List</a></li>

                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/department')); ?>"><i class="icon fa fa-file-text-o"></i>Department List</a></li>
                <li><a class="treeview-item" href="<?php echo e(URL::to('/admin/action')); ?>"><i class="icon fa fa-file-text-o"></i>Action List</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('actionassign')); ?>"><i class="icon fa fa-arrow-circle-o-right"></i>Assign Action to Department</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('assignvendor')); ?>"><i class="icon fa fa-arrow-circle-o-right"></i>Assign Vendor to Airport</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('assignedairport')); ?>"><i class="icon fa fa-file-text-o"></i>Assigned Airport List</a></li>

            </ul>
        </li>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-download"></i><span class="app-menu__label">Download Reports</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?php echo e(route('paymentreport')); ?>"><i class="icon fa fa-file-excel-o"></i>Payment Report</a></li>
                <li><a class="treeview-item" href="requestreport"><i class="icon fa fa-file-excel-o"></i>Request Report</a></li>
                <li><a class="treeview-item" href="<?php echo e(route('responderreport')); ?>"><i class="icon fa fa-file-excel-o"></i>Individual Responding Report</a></li>
            </ul>
        </li>
      </ul>
    </aside>

    <?php echo $__env->yieldContent('content'); ?>

    </body>
</html>
   <!-- Scripts -->
   <script src="<?php echo e(asset('js/jquery-3.2.1.min.js')); ?>"></script>

      <script src="<?php echo e(asset('js/datatable.js')); ?>"></script>
      <script src="<?php echo e(asset('js/bootstrap-datatable.js')); ?>"></script>
      <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/main.js')); ?>"></script>
      <script src="<?php echo e(asset('js/plugins/pace.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
      <script src="<?php echo e(asset('js/jquery.timepicker.min.js')); ?>"></script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/layouts/common.blade.php ENDPATH**/ ?>