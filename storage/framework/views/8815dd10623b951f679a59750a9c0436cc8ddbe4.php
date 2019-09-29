<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-75991732-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-75991732-1');
</script>


<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '1067364606643550');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=1067364606643550&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
    <head>

         <title><?php echo e((isset($pageTitle))?$pageTitle:"Airport Assist By MUrgency"); ?></title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="<?php echo e((isset($pageDescription))?$pageDescription:''); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('main/images/brand/favicon-32x32.png')); ?>">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('main/css/bootstrap.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/hover-min.css')); ?>">
       <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/jquery-ui.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/jquery.timepicker.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/easy-autocomplete.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/easy-autocomplete.themes.min.css')); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
        <link rel="stylesheet" href="<?php echo e(asset('main/build/css/intlTelInput.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/style.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('main/css/responsive.css')); ?>">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
            rel="stylesheet">
        </head>

        <body>

            <header class="MUA-main-header p-b-5">
                <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                    <a class="navbar-brand" href="/">
                        <img src="<?php echo e(asset('main/images/brand/MUA-logo.png')); ?>" height="50" alt="">
                    </a>
                    <button class="navbar-toggler bg-menu_bar " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="<?php echo e(asset('main/images/icons/menu-bar.png')); ?>" alt="">
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="mr-auto"></div>
                        <ul class="navbar-nav">
                             <li class="nav-item hvr-overline-from-center">
                                <a class="nav-link text-uppercase" href="<?php echo e(route('step-1')); ?>">Book Airport Service</a>
                            </li>
                            <li class="nav-item hvr-overline-from-center">
                                <a class="nav-link text-uppercase" href="<?php echo e(route('service')); ?>">Services</a>
                            </li>
                            <li class="nav-item hvr-overline-from-center">
                                <a class="nav-link text-uppercase" href="<?php echo e(route('airportserved')); ?>">Airports Served</a>
                            </li>


                            <li class="nav-item hvr-overline-from-center">
                                <a class="nav-link" href="https://web.whatsapp.com/send?phone=+16503089964&text=Hello"><img src="<?php echo e(asset('main/images/icons/whatsapp_logo.png')); ?>" style="height: 35px;" alt=""><span class="ml-2">+1 650 308 9964</span></a>
                            </li>
                            <li class="nav-item hvr-overline-from-center">
                                <a class="nav-link" href="mailto:MUAirportAssist@MUrgency.com"  title="Email" ><img src="<?php echo e(asset('main/images/icons/email-logo.png')); ?>" style="height: 35px;" alt="MUAirportAssist@MUrgency.com"><span class="ml-2">MUAirportAssist@MUrgency.com</span></a></a>
                            </li>

                            <li class="nav-item dropdown header-menu-box" style="background-color:#BD2026">
                                <a class="nav-link text-white" href="#" id="navbarDropdown-menu" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="<?php echo e(asset('main/images/icons/menu-bar.png')); ?>" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right bg-dark text-white" aria-labelledby="navbarDropdown-menu">
                                    <a class="dropdown-item text-white text-uppercase" href="<?php echo e(route('traveltips')); ?>">blog</a>
                                    <a class="dropdown-item text-white text-uppercase" href="<?php echo e(route('legal')); ?>">Legal</a>
                                    <a class="dropdown-item text-white text-uppercase" href="<?php echo e(route('faq')); ?>">FAQ</a>
                                    <a class="dropdown-item text-white text-uppercase" href=" <?php echo e(route('contact')); ?>">Contact Us</a>
                                  </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
              <?php echo $__env->yieldContent('content'); ?>
              <footer class="MUA-MainFooter pb-5">
    <section class="foot-1" style="position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2 col-2">
                    <img src="<?php echo e(asset('main/images/icons/footer-circle-band.png')); ?>" class="img-fluid" alt="bom voyage">
                </div>
                <div class="col-md-10 col-sm-10 col-10">
                    <h5 class="text-center text-uppercase text-white ml-5">we ensure swift, smooth and safe passage through
                    airports.
                    </h5>
                </div>
            </div>

        </div>
    </section>
    <section class="foot-2">
        <div class="container">
            <img src="<?php echo e(asset('main/images/brand/footer-img.png')); ?>" style="height: 90px;" class="d-block m-auto img-fluid" alt="MUrgency Airport Assistance Logo">
            <ul class="social-connect text-center">
                <li>
                    <a href="https://www.facebook.com/MUAirportAssist/" class="text-black" target="_blank"> <i class="fa fa-facebook-square fa-2x" aria-hidden="true" ></i></a>
                </li>
                <li>
                    <a href="https://plus.google.com/s/MUAirportAssist/top" class="text-black" target="_blank"><i class="fa fa-google-plus-square fa-2x" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.instagram.com/muairportassist/" class="text-black" target="_blank"><i class="fa fa-instagram fa-2x " aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://www.pinterest.com/muairportas0334/" class="text-black" target="_blank"><i class="fa fa-pinterest-square fa-2x" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="https://twitter.com/MUAirportAssist" class="text-black" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
                </li>

                <li>
                    <button class="btn btn-dark btn-subscribe" data-toggle="modal" data-target="#subscribeModal">Subscribe</button>
                </li>
            </ul>
        </div>
    </section>
    <!-- subscribe modal -->
    <!-- Modal -->
    <div class="modal fade" id="subscribeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Subscribe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center text-uppercase">STAY CONNECTED</h3>
                    <p>Enter your email address below to receive latest updates on services and packages.</p>
                    <form action="">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter Your Email">
                            <div class="input-group-append">
                                <button class="btn btn-danger brand-bg-red no-radius-border text-white" type="button">SUBSCRIBE</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src=" <?php echo e(asset('main/js/jquery.min.js')); ?>" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
crossorigin="anonymous" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/bootstrap.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/smoothscroll.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/jquery.form-validator.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/jquery-ui.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/jquery.timepicker.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/jquery.easy-autocomplete.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/masonry.pkgd.min.js')); ?>" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js" type="text/javascript" ></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/highcharts.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/exporting.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/build/js/intlTelInput.min.js')); ?>" type="text/javascript" ></script>
<script src=" <?php echo e(asset('main/js/app.js')); ?>" type="text/javascript" ></script>
<script>
$(document).ready(function(){
$('[data-toggle="popover"]').popover();
});
</script>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php /**PATH /Users/manojvelyalan/Sites/airport-assist-laravel/resources/views/layouts/main.blade.php ENDPATH**/ ?>