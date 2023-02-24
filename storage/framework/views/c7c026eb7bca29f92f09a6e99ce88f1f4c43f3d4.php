<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>ธัญวรัตม์ ทราเวล</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/bootstrap.min.css')); ?>">
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/animate.min.css')); ?>">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/fontawesome.all.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <!-- Slick css -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_home/css/slick.min.css')); ?>" />
        <!--slick-theme.css-->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_home/css/slick-theme.min.css')); ?>" />
        <!-- Rangeslider css -->
        <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/nouislider.css')); ?>" />
    <!-- popup css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/popup.css')); ?>">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.carousel.min.css')); ?>">
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.theme.default.min.css')); ?>">
    <!-- navber css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/navber.css')); ?>">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/meanmenu.css')); ?>">
    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/style.css')); ?>">
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/responsive.css')); ?>">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets_home/img/favicon.png')); ?>">
</head>

<body>
    <!-- preloader Area -->
    <div class="preloader">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="lds-spinner">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Header Area -->

    <?php echo $__env->make('home.member_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <!-- search -->
    <div class="search-overlay">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-layer"></div>
                <div class="search-overlay-close">
                    <span class="search-overlay-close-line"></span>
                    <span class="search-overlay-close-line"></span>
                </div>
                <div class="search-overlay-form">
                    <form>
                        <input type="text" class="input-search" placeholder="Search here...">
                        <button type="button"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Common Banner Area -->
    <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>บริการรถบัสให้เช่า</h2>
                        <ul>
                            <li>Bus Rental</li>
                           
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="theme_search_form_tour">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center"> 
                                <?php if(auth()->guard()->check()): ?>
                                <a href="<?php echo e(route('user.car-rental')); ?>" class="btn btn-lg btn-info" type="button">ขอใบเสนอราคา</a>
                                <?php endif; ?>          
                                <?php if(auth()->guard()->guest()): ?>
                                <a href="<?php echo e(route('login.show')); ?>" class="btn btn-lg btn-info" type="button">ขอใบเสนอราคา</a>
                                <?php endif; ?>   
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    
    <!-- Tour Guides Area -->
    <section id="tour_guides_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>Gallery</h2>
                    </div>
                </div>
            </div>
            <div class="row">
               
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/001.jpg')); ?>" alt="img">
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/002.jpg')); ?>" alt="img">
                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/003.jpg')); ?>" alt="img">
                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/004.jpg')); ?>" alt="img">
                      
                    </div>
                </div>
            
            </div>
           
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/008.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/005.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/006.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/007.jpg')); ?>" alt="img">                      
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/009.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/010.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/011.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/012-1.jpg')); ?>" alt="img">                      
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/013.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/014.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/015-1.jpg')); ?>" alt="img">                      
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="<?php echo e(asset('assets_home/img/car/016.jpg')); ?>" alt="img">                      
                    </div>
                </div>

            </div>
       
        </div>
    </section>

    <!--footer-->
    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © <?php echo date('Y'); ?> All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="<?php echo e(asset('assets_home/img/common/cards.png')); ?>" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>


   

    <script src="<?php echo e(asset('assets_home/js/jquery-3.6.0.min.js')); ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?php echo e(asset('assets_home/js/bootstrap.bundle.js')); ?>"></script>
    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.magnific-popup.min.js')); ?>"></script>
     <!-- Slick js -->
     <script src="<?php echo e(asset('assets_home/js/slick.min.js')); ?>"></script>
     <script src="<?php echo e(asset('assets_home/js/slick-slider.js')); ?>"></script>
    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.meanmenu.js')); ?>"></script>
    <!-- owl carousel js -->
    <script src="<?php echo e(asset('assets_home/js/owl.carousel.min.js')); ?>"></script>
    <!-- wow.js -->
    <script src="<?php echo e(asset('assets_home/js/wow.min.js')); ?>"></script>
    <!-- Custom js -->
    <script src="<?php echo e(asset('assets_home/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/add-form.js')); ?>"></script>

</body><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/home/web_car.blade.php ENDPATH**/ ?>