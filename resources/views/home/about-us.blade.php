<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title>ธัญวรัตม์ ทราเวล</title>
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/bootstrap.min.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/animate.min.css')}}">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/fontawesome.all.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <!-- Slick css -->
        <link rel="stylesheet" type="text/css" href="{{asset('assets_home/css/slick.min.css')}}" />
        <!--slick-theme.css-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets_home/css/slick-theme.min.css')}}" />
        <!-- Rangeslider css -->
        <link rel="stylesheet" href="{{asset('assets_home/css/nouislider.css')}}" />
    <!-- popup css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/popup.css')}}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/owl.carousel.min.css')}}">
    <!-- owl.theme.default css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/owl.theme.default.min.css')}}">
    <!-- navber css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/navber.css')}}">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/meanmenu.css')}}">
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/style.css')}}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{asset('assets_home/css/responsive.css')}}">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{asset('assets_home/img/favicon.png')}}">
</head>

<body>
   
    @include('home.member_menu')
   
        <!-- Common Banner Area -->
        <section id="common_banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="common_bannner_text">
                        <h2>เกี่ยวกับเรา</h2>
                        <ul>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Room Details Areas -->
   <section id="tour_details_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="terms_service_content">
                        <div class="terms_item">
                            <h3>ธัญวรัตม์ ทราเวล</h3>
                            <p class="h5">
                                ห้างหุ้นส่วนจำกัด ธัญวรัตม์ ทราเวล</p>
                                <p class="h5">
                                ที่อยู่ : 444/11 หมู่ 6 ซอยบ้านเดื่อ ตำบลหมากแข้ง อำเภอเมือง จังหวัดอุดรธานี 41000</p>
                                <p class="h5">
                                ประกอบกิจการธุรกิจการขนส่งด้วยรถยนต์โดยสารขนาดใหญ่       และธุรกิจนำเที่ยว ใบอนุญาตเลขที่ 51/00657</p>

                        </div>

                        <div class="terms_item">
                            <h3>เราให้บริการ</h3>
                            <p class="h5"><i class="fas fa-star"></i> บริการรถบัสให้เช่า </p>
                            <p class="h5"><i class="fas fa-star"></i> รับจัดทัวร์ ทั้งในประเทศ และ ต่างประเทศ</p>  
                        </div>
                        <br>
<!-- Tour Guides Area -->
<section id="tour_guides_area" >
        <div class="container">          
            <div class="row">      
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="{{asset('assets_home/img/cer1.jpg')}}" alt="img">
                     
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="{{asset('assets_home/img/a1.jpg')}}" alt="img">
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="{{asset('assets_home/img/a2.jpg')}}" alt="img">
                      
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="tour_guides_boxed">
                        <img src="{{asset('assets_home/img/a3.jpg')}}" alt="img">
                      
                    </div>
                </div>
            </div>          
        </div>
    </section>                       
                       
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
                        <img src="{{asset('assets_home/img/common/cards.png')}}" width="100px" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class="fas fa-chevron-up"></i>
        <i class="fas fa-chevron-up"></i>
    </div>

    <script src="{{asset('assets_home/js/jquery-3.6.0.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('assets_home/js/bootstrap.bundle.js')}}"></script>
    <!-- Meanu js -->
    <script src="{{asset('assets_home/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Meanu js -->
    <script src="{{asset('assets_home/js/jquery.meanmenu.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('assets_home/js/owl.carousel.min.js')}}"></script>
    <!-- wow.js -->
    <script src="{{asset('assets_home/js/wow.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('assets_home/js/custom.js')}}"></script>
    <script src="{{asset('assets_home/js/add-form.js')}}"></script>
    <script src="{{asset('assets_home/js/video.js')}}"></script>
</body>

</html>