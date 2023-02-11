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

    @include('home.member_menu')


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
                        <h2>Explore the evergreen forest</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span><i class="fas fa-circle"></i></span><a href="tour-search.html">Tours</a></li>
                            <li><span><i class="fas fa-circle"></i></span> Tours Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @foreach ($package_tours as $item)
    <!-- Tour Search Areas -->
    <section id="tour_details_main" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="tour_details_leftside_wrapper">
                        <div class="tour_details_heading_wrapper">
                            <div class="tour_details_top_heading">
                                <h2>{{$item->package_name}}</h2>
                                <h5><i class="fas fa-map-marker-alt"></i> {{$item->package_place}}</h5>
                            </div>

                        </div>
                        <div class="tour_details_top_bottom">
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>ระยะเวลา</h5>
                                    <p>{{$item->package_total_day}}</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-money-bill"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>ราคา</h5>
                                    <p>{{number_format($item->package_price)}} บาท/ท่าน</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>จำนวนรองรับ</h5>
                                    <p>{{$item->package_min_customer}} คน</p>
                                </div>
                            </div>
                            <div class="toru_details_top_bottom_item">
                                <div class="tour_details_top_bottom_icon">
                                    <i class="fas fa-map-marked"></i>
                                </div>
                                <div class="tour_details_top_bottom_text">
                                    <h5>สถานที่</h5>
                                    <p>{{$item->package_place}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tour_details_img_wrapper">
                            <div class="slider slider-for">
@php
$img_path = 'public/package_file/';    
@endphp
                                
@foreach ($package_img as $row)
                                    <div>
                                        <img src="
                                        {{asset($img_path.$row->package_img)}}
                                        " alt="img">
                                    </div>
@endforeach
                            </div>

                            <div class="slider slider-nav">

                                @foreach ($package_img as $row1)                 
                                    <div>
                                        <img src="{{asset($img_path.$row1->package_img)}}" alt="img">
                                    </div>
                                    @endforeach
                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <a href="{{asset($item->package_file)}}"><h3 class="heading_theme">ดาวน์โหลดโปรแกรมทัวร์</h3></a>
                          
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">ไฮไลท์</h3>
                            <div class="tour_details_boxed_inner">
                                {{$item->highlight_tour}}

                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">รายละเอียด</h3>
                            <div class="tour_details_boxed_inner">
                               {!! $item->package_detail !!}
                            </div>
                        </div>

                        <div class="tour_details_boxed">
                            <h3 class="heading_theme">เงื่อนไข</h3>
                            <div class="tour_details_boxed_inner">
                                <p>
                                    Stet clitaStet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor
                                    sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                    eirmod.
                                </p>
                                <ul>
                                    <li><i class="fas fa-circle"></i>Buffet breakfast as per the Itinerary</li>
                                    <li><i class="fas fa-circle"></i>Visit eight villages showcasing Polynesian culture
                                    </li>
                                    <li><i class="fas fa-circle"></i>Complimentary Camel safari, Bonfire, and Cultural
                                        Dance at Camp</li>
                                    <li><i class="fas fa-circle"></i>All toll tax, parking, fuel, and driver allowances
                                    </li>
                                    <li><i class="fas fa-circle"></i>Comfortable and hygienic vehicle (SUV/Sedan) for
                                        sightseeing on all days as per the itinerary.</li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="tour_details_right_sidebar_wrapper">
                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_guides_boxed">
                                <img src="{{asset($item->package_cover)}}" alt="img">
                                </div>
                            </div>
                        </div>

                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_details_right_box_heading">
                                    <h3>Standard package</h3>
                                </div>
                                <div class="valid_date_area">
                                    <div class="valid_date_area_one">
                                        <h5>Valid from</h5>
                                        <p>01 Feb 2022</p>
                                    </div>
                                    <div class="valid_date_area_one">
                                        <h5>Valid till</h5>
                                        <p>15 Feb 2022</p>
                                    </div>
                                </div>
                                <div class="tour_package_details_bar_list">
                                    <h5>Package details</h5>
                                    <ul>
                                        <li><i class="fas fa-circle"></i>Buffet breakfast as per the Itinerary</li>
                                        <li><i class="fas fa-circle"></i>Visit eight villages showcasing Polynesian
                                            culture
                                        </li>
                                        <li><i class="fas fa-circle"></i>Complimentary Camel safari, Bonfire,</li>
                                        <li><i class="fas fa-circle"></i>All toll tax, parking, fuel, and driver
                                            allowances
                                        </li>
                                        <li><i class="fas fa-circle"></i>Comfortable and hygienic vehicle</li>
                                    </ul>
                                </div>
                                <div class="tour_package_details_bar_price">
                                    <h5>Price</h5>
                                    <div class="tour_package_bar_price">
                                        <h6><del>$ 35,500</del></h6>
                                        <h3>$ 30,500 <sub>/Per serson</sub> </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="tour_select_offer_bar_bottom">
                                <button class="btn btn_theme btn_md w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Select
                                    offer</button>
                            </div>
                        </div>
                        <div class="tour_detail_right_sidebar">
                            <div class="tour_details_right_boxed">
                                <div class="tour_details_right_box_heading">
                                    <h3>Deluxe package</h3>
                                </div>
                                <div class="valid_date_area">
                                    <div class="valid_date_area_one">
                                        <h5>Valid from</h5>
                                        <p>01 Feb 2022</p>
                                    </div>
                                    <div class="valid_date_area_one">
                                        <h5>Valid till</h5>
                                        <p>15 Feb 2022</p>
                                    </div>
                                </div>
                                <div class="tour_package_details_bar_list">
                                    <h5>Package details</h5>
                                    <ul>
                                        <li><i class="fas fa-circle"></i>Buffet breakfast as per the Itinerary</li>
                                        <li><i class="fas fa-circle"></i>Visit eight villages showcasing Polynesian
                                            culture
                                        </li>
                                        <li><i class="fas fa-circle"></i>Complimentary Camel safari, Bonfire,</li>
                                        <li><i class="fas fa-circle"></i>All toll tax, parking, fuel, and driver
                                            allowances
                                        </li>
                                        <li><i class="fas fa-circle"></i>Comfortable and hygienic vehicle</li>
                                    </ul>
                                </div>
                                <div class="tour_package_details_bar_price">
                                    <h5>Price</h5>
                                    <div class="tour_package_bar_price">
                                        <h6><del>$ 35,500</del></h6>
                                        <h3>$ 30,500 <sub>/Per serson</sub> </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="tour_select_offer_bar_bottom">
                                <button class="btn btn_theme btn_md w-100" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Select
                                    offer</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
@endforeach



    <div class="copyright_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_left">
                        <p>Copyright © @php echo date('Y'); @endphp All Rights Reserved</p>
                    </div>
                </div>
                <div class="co-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="copyright_right">
                        <img src="{{asset('assets_home/img/common/cards.png')}}" alt="img">
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
     <!-- Slick js -->
     <script src="{{asset('assets_home/js/slick.min.js')}}"></script>
     <script src="{{asset('assets_home/js/slick-slider.js')}}"></script>
    <!-- Meanu js -->
    <script src="{{asset('assets_home/js/jquery.meanmenu.js')}}"></script>
    <!-- owl carousel js -->
    <script src="{{asset('assets_home/js/owl.carousel.min.js')}}"></script>
    <!-- wow.js -->
    <script src="{{asset('assets_home/js/wow.min.js')}}"></script>
    <!-- Custom js -->
    <script src="{{asset('assets_home/js/custom.js')}}"></script>
    <script src="{{asset('assets_home/js/add-form.js')}}"></script>

</body>

</html>