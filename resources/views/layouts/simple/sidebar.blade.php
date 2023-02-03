<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper">
            <a href="{{ route('admin_index') }}"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" width="150px"
                    alt=""><img class="img-fluid for-dark" src="{{ asset('assets/images/logo/logo_dark.png') }}" width="150px"
                    alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('admin_index') }}"><img class="img-fluid"
                    src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn">
                        <a href="{{ route('admin_index') }}"><img class="img-fluid"
                                src="{{ asset('assets/images/logo/logo-icon.png') }}" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        @auth
                            {{ auth()->user()->member_name }}
                            <div>
                                <h6 class="lan-1">{{ Auth::user()->member_name }}</h6>
                                <p class="lan-2">ผู้ดูแลระบบ</p>
                            </div>
                        @endauth

                    </li>

                    <li class="sidebar-list">
                        <a href="{{ route('admin_index') }}" class="sidebar-link sidebar-title"><i
                                data-feather="home"></i>
                            หน้าหลัก</a>

                        <a class="sidebar-link sidebar-title {{ request()->route()->getPrefix() == '/page-layouts'? 'active': '' }}"
                            href="#"><i data-feather="list"></i>
                            <span class="lan-7">ข้อมูล</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == '/page-layouts'? 'down': 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: {{ request()->route()->getPrefix() == '/page-layouts'? 'block;': 'none;' }}">
                            <li><a href="{{ route('list_package') }}"
                                    class="{{ Route::currentRouteName() == 'box-layout' ? 'active' : '' }}">แพ็คเกจทัวร์</a>
                            </li>            
                            <li>
                                <a href="{{ route('bank') }}">ข้อมูลธนาคาร</a>
                            </li>
                        </ul>
                    </li>


                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title" href="#">
							<i data-feather="users"></i>
                            <span class="lan-7"> สมาชิก</span>
                            <div class="according-menu"><i
                                    class="fa fa-angle-{{ request()->route()->getPrefix() == '/page-layouts'? 'down': 'right' }}"></i>
                            </div>
                        </a>
                        <ul class="sidebar-submenu"
                            style="display: {{ request()->route()->getPrefix() == '/page-layouts'? 'block;': 'none;' }}">
                            <li><a href="{{ route('admin.user_data') }}">ข้อมูลสมาชิก</a></li>
                            <li><a href="{{ route('booking_chk') }}"> ข้อมูลคำสั่งซื้อ</a></li>
                            <li><a href="{{ route('admin.list_invoice') }}">รายการใบสั่งจอง</a></li>
                            <li><a href=""> รายงาน</a></li>
                           
                        </ul>
                    </li>

					<li class="sidebar-list">
					<a href="{{ route('admin_setting') }}" class="sidebar-link sidebar-title">
						<i data-feather="settings"></i>
					ตั้งค่าข้อมูล</a>
					</li>

                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
