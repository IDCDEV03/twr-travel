<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>ธัญวรัตม์ ทราเวล</title>
    <link rel="stylesheet" href="
    <?php echo e(asset('assets_home/css/bootstrap.min.css')); ?>"/>
    <!-- animate css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/animate.min.css')); ?>" />
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/fontawesome.all.min.css')); ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- popup css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/popup.css')); ?>" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.carousel.min.css')); ?>" />
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/owl.theme.default.min.css')); ?>" />
    <!-- navber css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/navber.css')); ?>" />
    <!-- meanmenu css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/meanmenu.css')); ?>" />
    <!-- Style css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/style.css')); ?>" />
    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/responsive.css')); ?>" />
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets_home/img/favicon.png')); ?>">
</head>

<body>
   
    <?php echo $__env->make('home.member_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
   
        <!-- Common Banner Area -->
        <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>ติดต่อเรา</h2>
                        <ul>
                            <li>Contact with us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Contact Area -->
     <section id="contact_main_arae" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="section_heading_center">
                        <h2>ติดต่อเรา</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="phone_tuch_area">
                        <h3>ธัญวรัตม์ ทราเวล</h3>
                        <h3><a href="tel:0818718548">081-871-8548</a></h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="contact_boxed">
                        <h6>สำนักงานใหญ่</h6>
                        <h3>จังหวัดอุดรธานี</h3>
                        <p>444/11 หมู่ 6 ซอยบ้านเดื่อ ตำบลหมากแข้ง อำเภอเมือง จังหวัดอุดรธานี 41000</p>
                        <a href="!#" data-bs-toggle="modal" data-bs-target="#staticBackdrop">ดูแผนที่</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="contact_boxed">                 
                        <img src="<?php echo e(asset('assets_home/img/name_card.jpg')); ?>" width="350px" alt="img">
                    </div>
                </div>               
            </div>
<br>
            <div class="row">    
                  
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="contact_boxed">
                        <h3>เพิ่มเพื่อนกับเราใน LINE</h3>
                        <img src="<?php echo e(asset('assets_home/img/line.jpg')); ?>" width="350px" alt="img">
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
                        <p>Copyright © 
                        <?php echo date("Y"); ?> All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="<?php echo e(asset('assets_home/img/common/cards.png')); ?>" width="100px" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>

        <!-- Map Modal -->
        <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered  modal-lg">
            <div class="modal-content">
                <div class="modal-body map_modal_content">
                    <div class="btn_modal_closed">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                    <div class="map_area">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30452.515085291507!2d102.76982630335051!3d17.432680793196848!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31239d57b38f0a93%3A0xf4a874f702d2a218!2z4LiB4Liy4Lij4LmM4LmA4LiU4LmJ4LiZ4LmC4Liu4LihIOC5gOC4oeC4t-C4reC4h-C4reC4uOC4lOC4o-C4mOC4suC4meC4tSDguK3guLPguYDguKDguK3guYDguKHguLfguK3guIfguK3guLjguJTguKPguJjguLLguJnguLUg4Lit4Li44LiU4Lij4LiY4Liy4LiZ4Li1IDQxMDAw!5e0!3m2!1sth!2sth!4v1676258398527!5m2!1sth!2sth" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
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

</html><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/home/contact.blade.php ENDPATH**/ ?>