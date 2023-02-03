@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>หน้าหลักสมาชิก</h3>
@endsection


@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif

                <div class="list-group">
                    <a class="list-group-item list-group-item-action flex-column align-items-start "
                        href="{{ route('user.all_packages') }}">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">รายการแพ็คเกจทัวร์</h5>
                        </div>                      
                    </a>

                    <a href="{{ route('user.car-rental-list') }}" class="list-group-item list-group-item-action flex-column "
                    href="javascript:void(0)">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">บริการเช่ารถ</h5>
                    </div>
                </a>
              
                    <a href="{{ route('booking_status') }}" class="list-group-item list-group-item-action flex-column align-items-start"
                        href="javascript:void(0)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">ตรวจสอบสถานะการจอง</h5>
                        </div>
                    </a>
                    <a href="{{route('user_profile')}}" class="list-group-item list-group-item-action flex-column align-items-start"
                    href="javascript:void(0)">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">แก้ไขข้อมูลส่วนตัว</h5>
                    </div>
                </a>
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

    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
