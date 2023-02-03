@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>บริการเช่ารถ</h3>
@endsection


@section('content')
    <div class="container-fluid">

        <div class="card">
            <div class="card-header"><a href="{{ route('user.car-rental') }}" class="btn btn-lg btn-primary">เช่ารถ</a></div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รถที่เช่า</th>
                            <th scope="col">จำนวนผู้โดยสาร</th>
                            <th scope="col">วันที่เช่า</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>รายละเอียด</td>
                        </tr>                        
                        </tbody>
                    </table>
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
