@extends('layouts.simple.master')
@section('title', 'ตั้งค่าข้อมูล')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ข้อมูลการสั่งจองรถ</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <b>{{ session('success') }}</b>
                            </div>
                        @endif

                        <table class="cell-border hover" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ที่</th>
                                    <th>ชื่อสมาชิก</th>
                                    <th>ประเภทรถ</th>
                                    <th>วันที่ไป-กลับ</th>
                                    <th>สถานะ</th>
                                    <th>ตั้งค่า</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($car_rent as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->member_name }}</td>
                                        <td>{{ $item->car_type }}</td>
                                        <td>
                                            {{ Carbon\Carbon::parse($item->start_travel)->format('d/m/Y') }}
                                            - {{ Carbon\Carbon::parse($item->back_travel)->format('d/m/Y') }}</td>
                                        <td>
                                            @if ($item->rent_status == '0')
                                                <span class="txt-danger">รอส่งใบเสนอราคา</span>
                                            @elseif ($item->rent_status == '1')
                                                <span class="txt-secondary">ส่งใบเสนอราคาแล้ว รอชำระเงิน</span>
                                            @elseif ($item->rent_status == '2')
                                                <span class="txt-info">แจ้งโอนเงินแล้ว รอตรวจสอบ</span>
                                            @elseif ($item->rent_status == '3')
                                          <span class="txt-success">ชำระมัดจำงวดที่ 1 แล้ว</span>
                                            @elseif ($item->rent_status == '4')
                                                <span class="txt-danger">ยกเลิกการจอง</span>
                                            @elseif ($item->rent_status == '5')
                                                <span class="txt-info">
                                                    แจ้งชำระเงินงวดที่ 2 รอตรวจสอบ
                                                </span>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.car_rental_detail', ['id' => $item->rent_id]) }}">
                                                <i class="fa fa-edit"></i> รายละเอียด</a>


                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
@endsection
