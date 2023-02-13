 <!-- Header Area -->
 <header class="main_header_arae">
        <!-- Top Bar -->
        <div class="topbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-list">
                            <li>
                                <a href="https://www.facebook.com/thanwarattravel/"><i class="fab fa-facebook"></i></a>
                            </li>
                            <li><a href="#!"><span>Tel.081-8718548 , 081-2616178</span></a></li>
                            <li><a href="#!"><span>thanwarattravel@gmail.com</span></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <ul class="topbar-others-options">
                            <li><a href="{{route('login.show')}}">เข้าสู่ระบบ</a></li>
                            <li><a href="{{route('register.show')}}">สมัครสมาชิก</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar Bar -->
        <div class="navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="{{route('/')}}">
                                <img src="{{asset('assets_home/img/logo.png')}}" alt="logo" >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="{{route('/')}}">
                            <img src="{{asset('assets_home/img/logo02.png')}}" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">                              

                                <li class="nav-item">
                                    <a href="{{route('/')}}" class="nav-link active">
                                        หน้าแรก                                      
                                    </a>                                   
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('about_us.show')}}" class="nav-link">
                                       เกี่ยวกับเรา
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        แพ็คเกจทัวร์
                                        <i class="fas fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="tour-search.html" class="nav-link">Tour</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="tour-details.html" class="nav-link">Tour Details</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="tour-booking-submission.html" class="nav-link">Tour Booking</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="top-destinations.html" class="nav-link">Top Destination</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="top-destinations-details.html" class="nav-link">Destination
                                                Details</a>
                                        </li>
                                    </ul>
                                </li>
                              
                          
                                <li class="nav-item">
                                    <a href="{{route('bus_rental.show')}}" class="nav-link">
                                       รถบัสให้เช่า                                       
                                    </a>
                                   
                                </li>

                                <li class="nav-item">
                                    <a href="{{route('contact.show')}}" class="nav-link">ติดต่อเรา</a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box">
                                        <i class="bi bi-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="{{route('register.show')}}" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <a href="#" class="search-box"><i class="fas fa-search"></i></a>
                                </div>
                                <div class="option-item">
                                    <a href="contact.html" class="btn  btn_navber">Get free quote</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>