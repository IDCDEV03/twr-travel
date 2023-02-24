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
                            <?php if(auth()->guard()->check()): ?>
                            <li><a href="<?php echo e(route('userPages.home')); ?>"><?php echo e(auth()->user()->username); ?></a></li> 
                            <li><a href="<?php echo e(route('logout.perform')); ?>">ออกจากระบบ</a></li>                           
                            <?php endif; ?>
                            
                            <?php if(auth()->guard()->guest()): ?>                       
                            <li><a href="<?php echo e(route('login.show')); ?>">เข้าสู่ระบบ</a></li>
                            <li><a href="<?php echo e(route('register.show')); ?>">สมัครสมาชิก</a></li>
                            <?php endif; ?>
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
                            <a href="<?php echo e(route('/')); ?>">
                                <img src="<?php echo e(asset('assets_home/img/logo.png')); ?>" alt="logo" >
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?php echo e(route('/')); ?>">
                            <img src="<?php echo e(asset('assets_home/img/logo02.png')); ?>" alt="logo">
                        </a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">                              

                                <li class="nav-item">
                                    <a href="<?php echo e(route('/')); ?>" class="nav-link active">
                                        หน้าแรก                                      
                                    </a>                                   
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('about_us.show')); ?>" class="nav-link">
                                       เกี่ยวกับเรา
                                    </a>
                                </li>
                                 <li class="nav-item">
                                    <a href="<?php echo e(route('bus_rental.show')); ?>" class="nav-link">
                                       รถบัสให้เช่า       
                                    </a>  
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo e(route('contact.show')); ?>" class="nav-link">ติดต่อเรา</a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                   
                                </div>
                                <?php if(auth()->guard()->guest()): ?>
                                <div class="option-item">
                                    <a href="<?php echo e(route('register.show')); ?>" class="btn  btn_navber">สมัครสมาชิก</a>
                                </div>
                                <?php endif; ?>
                             
                            </div>
                        </div>
                    </nav>
                </div>
            </div>           
        </div>
    </header><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/home/member_menu.blade.php ENDPATH**/ ?>