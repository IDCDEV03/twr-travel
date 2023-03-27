<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="<?php echo e(route('admin_index')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" width="150px"
                    alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" width="150px"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?php echo e(route('admin_index')); ?>"><img class="img-fluid"
                    src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="<?php echo e(route('admin_index')); ?>"><img class="img-fluid"
                                src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <?php if(auth()->guard()->check()): ?>
                            <?php echo e(auth()->user()->member_name); ?>

                            <div>
                                <h6 class="lan-1"><?php echo e(Auth::user()->member_name); ?></h6>
                                <p class="lan-2">ผู้ดูแลระบบ</p>
                            </div>
                        <?php endif; ?>

                    </li>

                    <li class="sidebar-list">
                        <a href="<?php echo e(route('admin_index')); ?>" class="sidebar-link sidebar-title"><i
                                data-feather="home"></i>
                            หน้าหลัก</a>

                        <a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/page-layouts'? 'active': ''); ?>"
                            href="#"><i data-feather="list"></i>
                            <span class="lan-7">ข้อมูล</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/page-layouts'? 'down': 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: <?php echo e(request()->route()->getPrefix() == '/page-layouts'? 'block;': 'none;'); ?>">
                            <li><a href="<?php echo e(route('list_package')); ?>"
                                    class="<?php echo e(Route::currentRouteName() == 'box-layout' ? 'active' : ''); ?>">แพ็คเกจทัวร์</a>
                            </li>            
                            <li>
                                <a href="<?php echo e(route('admin.bank')); ?>">ข้อมูลธนาคาร</a>
                            </li>
                            <li>
                                <a href="<?php echo e(route('admin.report')); ?>">รายงานยอดขาย</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
							<i data-feather="users"></i>
                            <span class="lan-7"> สมาชิก</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/page-layouts'? 'down': 'right'); ?>"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: <?php echo e(request()->route()->getPrefix() == '/page-layouts'? 'block;': 'none;'); ?>">
                            <li><a href="<?php echo e(route('admin.user_data')); ?>">ข้อมูลสมาชิก</a></li>
                            <li><a href="<?php echo e(route('booking_chk')); ?>"> ข้อมูลสั่งจองทัวร์</a></li>
                            <li><a href="<?php echo e(route('admin.car_rental_data')); ?>">ข้อมูลเช่ารถ</a></li>
                            <li><a href="<?php echo e(route('admin.list_invoice')); ?>">รายการใบสั่งจอง</a></li>  
                        </ul>
                    </li>

					<li class="sidebar-list">
					<a href="<?php echo e(route('admin_setting')); ?>" class="sidebar-link sidebar-title">
						<i data-feather="settings"></i>
					ตั้งค่าข้อมูล</a>
					</li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/layouts/simple/sidebar.blade.php ENDPATH**/ ?>