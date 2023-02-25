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
        <div class="alert alert-danger dark" role="alert"><strong>ไม่มีคำสั่งจองแพ็คเกจใหม่</strong></div>
        @endif

        @if (count($user_payment_tour) >= 1)
        <div class="alert alert-info dark" role="alert"><strong> <i data-feather="bell"></i> มีการแจ้งโอนยอดชำระแพ็คเกจทัวร์ รอการตรวจสอบ</strong>
            <a href="{{ route('booking_chk') }}" class="btn btn-pill btn-outline-light-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบยอดโอนชำระ</a> 
        </div>
        @else
        @endif

        @if (count($user_car_rental) >= 1)
        <div class="alert alert-secondary dark" role="alert"><strong> <i data-feather="bell"></i> คุณมีการสั่งจองบริการเช่ารถที่รอการตรวจสอบ </strong>
           
            <a href="{{ route('admin.car_rental_data') }}" class="btn btn-pill btn-outline-warning-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบ</a> 
         </div>
        @endif

    

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
