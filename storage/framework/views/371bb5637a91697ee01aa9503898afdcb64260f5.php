<div class="page-header">
    <div class="header-wrapper row m-0">        
        <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?php echo e(route('userPages.home')); ?>"><img class="img-fluid"
                        src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
            </div>
        </div>
        <div class="left-header col horizontal-wrapper ps-0">
            <ul class="horizontal-menu">
                <li class="mega-menu outside">
                    <a class="nav-link" href="<?php echo e(route('userPages.home')); ?>"><i data-feather="layers"></i><span>หน้าหลักสมาชิก</span></a>
                
                </li>
            </ul>
        </div>
        <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
                <li>
                    <div class="mode"><i class="fa fa-moon-o"></i></div>
                </li>
                <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i
                            data-feather="maximize"></i></a></li>
                <li class="profile-nav onhover-dropdown p-0 me-0">
                    <div class="media profile-media">
                      
                        <div class="media-body">
                            <?php if(auth()->guard()->check()): ?>
                            <span><?php echo e(auth()->user()->member_name); ?></span>
                            <?php endif; ?>
                            <p class="mb-0 font-roboto">สมาชิก <i class="middle fa fa-angle-down"></i></p>
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                            
                        <li><a href="<?php echo e(route('user_profile')); ?>"><i data-feather="settings"></i><span>ตั้งค่า</span></a></li>
                        <li><a href="<?php echo e(route('logout.perform')); ?>"><i data-feather="log-out"> </i><span>ออกจากระบบ</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userLayouts/simple/header.blade.php ENDPATH**/ ?>