@extends('layouts.simple.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/date-picker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/whether-icon.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>หน้าหลักผู้ดูแลระบบ</h3>
@endsection

@section('breadcrumb-items')
@endsection

@section('content')
    <div class="container-fluid">

        @if (count($userbooking) >= 1)
        <div class="alert alert-danger dark" role="alert"><strong> <i data-feather="bell"></i> คุณมีคำสั่งซื้อแพ็คเกจที่รอการตรวจสอบ </strong>
           
           <a href="{{ route('booking_chk') }}" class="btn btn-pill btn-outline-warning-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบคำสั่งซื้อ</a> 
        </div>
        @else
        <div class="alert alert-danger dark" role="alert"><strong>ไม่มีคำสั่งซื้อใหม่</strong></div>
        @endif

        <div class="row project-cards">
           
            <div class="row">
                <div class="col-sm-12 col-xl-6">
                    <div class="card shadow-0 border">
                        <div class="card-header">
                            <h5>ยอดสั่งจองแพ็คเกจ วันนี้</h5>
                        </div>
                        <div class="ecommerce-widget card-body">

                            <div class="row">
                                <div class="col-6">
                                    <span>New Order</span>
                                    <h3 class="total-num counter">25639</h3>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <ul>
                                            <li>Profit<span class="product-stts font-primary ms-2">8989<i
                                                        class="icon-angle-up f-12 ms-1"></i></span></li>
                                            <li>Loss<span class="product-stts font-primary ms-2">2560<i
                                                        class="icon-angle-down f-12 ms-1"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-showcase">
                                <div class="progress lg-progress-bar">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-sm-12 col-xl-6">
                    <div class="card shadow-0 border">
                        <div class="card-header">
                            <h5><i class="icofont icofont-truck me-2"></i> ยอดสั่งจองแพ็คเกจรายเดือน</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <span>New Order</span>
                                    <h3 class="total-num counter">25639</h3>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <ul>
                                            <li>Profit<span class="product-stts font-primary ms-2">8989<i
                                                        class="icon-angle-up f-12 ms-1"></i></span></li>
                                            <li>Loss<span class="product-stts font-primary ms-2">2560<i
                                                        class="icon-angle-down f-12 ms-1"></i></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="progress-showcase">
                                <div class="progress lg-progress-bar">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 70%"
                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>
        </div>
        <script type="text/javascript">
            var session_layout = '{{ session()->get('layout') }}';
        </script>
    @endsection

    @section('script')

        <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
        <script src="{{ asset('assets/js/notify/index.js') }}"></script>
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>

        <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
        <script src="{{ asset('assets/js/general-widget.js') }}"></script>
        <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    @endsection
