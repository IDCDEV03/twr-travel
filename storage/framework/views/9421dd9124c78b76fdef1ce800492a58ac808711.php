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
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/fontawesome.all.min.css')); ?> >
<link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
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

    <?php echo $__env->make('home.member_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  

    <!-- Banner Area -->
    <section id="home_one_banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner_one_text">
                        
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
                            <a href="<?php echo e(route('userPages.home')); ?>" class="btn btn-lg btn-primary me-md-2" type="button">หน้าสมาชิก</a>
                            <?php endif; ?>
                            <?php if(auth()->guard()->guest()): ?>
                            <a href="<?php echo e(route('register.show')); ?>" class="btn btn-lg btn-primary me-md-2" type="button">สมัครสมาชิก</a>
                            <a href="<?php echo e(route('login.show')); ?>" class="btn btn-lg btn-success" type="button">เข้าสู่ระบบ</a>
                            <?php endif; ?>                              
                              </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Choose your destinations Area-->
    <section id="choose_destinations_area" class="section_padding">
        <div class="container">
            <!-- Section Heading -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>เลือกแพ็คเกจที่คุณสนใจ</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!----------------------------------------------->
                <?php $__currentLoopData = $package_home; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="choose_desti_wrapper">
                            <div class="choose_des_inner_wrap">
                                <div class="choose_boxed_inner">
                                    <img src="<?php echo e(asset($row->package_cover)); ?>" alt="img">

                                </div>
                                <a href="<?php echo e(route('package.show', ['id' => $row->package_id])); ?>">
                                    <div class="flep_choose_box">
                                        <div class="flep_choose_box_inner">
                                            <h3><?php echo e($row->package_name); ?></h3>
                                            <h3><?php echo e($row->package_place); ?>

                                            </h3>
                                </a>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!------------------------------>
        </div>
        </div>
    </section>


   <!-- Top destinations -->
   <section id="top_destinations" class="section_padding_top">
    <div class="container">
        <!-- Section Heading -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="section_heading_center">
                    <h2>ผลงานของเรา</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="destinations_content_box img_animation">
                    <img src="<?php echo e(asset('assets_home/img/tour_pic/001.jpg')); ?>" alt="img">
                 
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/009.jpg')); ?>" alt="img">
                         
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/002.jpg')); ?>" alt="img">
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/003.jpg')); ?>" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/004-1.jpg')); ?>" alt="img">
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/005.jpg')); ?>" alt="img">
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/006.jpg')); ?>" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/007.jpg')); ?>" alt="img">
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/008.jpg')); ?>" alt="img">
                        </div>
                        <div class="destinations_content_box img_animation">
                            <img src="<?php echo e(asset('assets_home/img/tour_pic/010.jpg')); ?>" alt="img">
                        </div>
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <img src="<?php echo e(asset('assets_home/img/common/cards.png')); ?>" alt="img" width="100">
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

    <!-- Meanu js -->
    <script src="<?php echo e(asset('assets_home/js/jquery.meanmenu.js')); ?>"></script>
    <!-- owl carousel js -->
    <script src="<?php echo e(asset('assets_home/js/owl.carousel.min.js')); ?>"></script>
    <!-- wow.js -->
    <script src="<?php echo e(asset('assets_home/js/wow.min.js')); ?>"></script>
    <!-- Custom js -->
    <script src="<?php echo e(asset('assets_home/js/custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/add-form.js')); ?>"></script>
    <script src="<?php echo e(asset('assets_home/js/video.js')); ?>"></script>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/home/index.blade.php ENDPATH**/ ?>