<div class="sidebar-wrapper">
	<div>
		<div class="logo-wrapper">
			<a href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/logo.png')); ?>" width="150px" alt=""><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" width="150px"  alt=""></a>
			<div class="back-btn"><i class="fa fa-angle-left"></i></div>
			<div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
		</div>
		<div class="logo-icon-wrapper"><a href="<?php echo e(route('userPages.home')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a></div>
		<nav class="sidebar-main">
			<div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
			<div id="sidebar-menu">
				<ul class="sidebar-links" id="simple-bar">
					<li class="back-btn">
						<a href="<?php echo e(route('userPages.home')); ?>"><img class="img-fluid" src="<?php echo e(asset('assets/images/logo/logo-icon.png')); ?>" alt=""></a>
						<div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
					</li>
					<li class="sidebar-main-title">
						<?php if(auth()->guard()->check()): ?>
        				<?php echo e(auth()->user()->member_name); ?>

						<div>
							<h6 class="lan-1"><?php echo e(Auth::user()->member_name); ?></h6>
							<p class="lan-2">สมาชิก</p>
						</div>
						<?php endif; ?>

						<?php if(auth()->guard()->guest()): ?>
						<div>
							<h6 class="lan-1">ผู้เยี่ยมชม</h6>
                     		<p class="lan-2">SP International Service</p>
						</div>
						<?php endif; ?>
					</li>
					


					<li class="sidebar-list">
						<a class="sidebar-link sidebar-title <?php echo e(request()->route()->getPrefix() == '/page-layouts' ? 'active' : ''); ?>" href="#"><i data-feather="home"></i>
							<span class="lan-7">มุมสมาชิก</span>
							<div class="according-menu"><i class="fa fa-angle-<?php echo e(request()->route()->getPrefix() == '/page-layouts' ? 'down' : 'right'); ?>"></i></div>
						</a>
	                    <ul class="sidebar-submenu" style="display: <?php echo e(request()->route()->getPrefix() == '/page-layouts' ? 'block;' : 'none;'); ?>">
							<li>
								<a href="<?php echo e(route('user.all_packages')); ?>" >รายการแพ็คเกจทัวร์</a>
							</li>                 
						  
						  <li><a href="<?php echo e(route('booking_status')); ?>" class="<?php echo e(Route::currentRouteName() == 'box-layout' ? 'active' : ''); ?>">ตรวจสอบสถานะการจอง</a></li>   
 
						  <li>
							<a href="<?php echo e(route('user.car-rental-list')); ?>" >บริการเช่ารถ</a>
						</li> 

						<li>
							<a href="<?php echo e(route('user_profile')); ?>" >แก้ไขข้อมูลส่วนตัว</a>
						</li>   
						<li>
							<a href="<?php echo e(route('user_password')); ?>" >เปลี่ยนรหัสผ่าน</a>
						</li>              
                      </ul>				
                  	</li>	


				</ul>
			</div>
			<div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
		</nav>
	</div>
</div><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userLayouts/simple/sidebar.blade.php ENDPATH**/ ?>