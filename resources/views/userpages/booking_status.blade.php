@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">

@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>รายการสั่งจองแพ็คเกจ</h3>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @elseif(session('cancel'))
                <div class="alert alert-danger" role="alert">
                    <b>{{ session('cancel') }}</b>
                </div>
                @endif


                <table class="cell-border hover" id="basic-1">
                    <thead>
                        <tr>
                            <th>ที่</th>
                            <th>แพ็คเกจ</th>
                            <th>ระหว่างวันที่</th>
                            <th>จำนวนที่นั่ง</th>
                            <th>สถานะ</th>
                            <th>ตั้งค่า</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($list_booking as $row)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $row->package_name }}</td>
                                <td>
                                    <ul>
                                        <li><i class="fa fa-caret-right txt-primary m-r-10"></i>
                                            วันที่ไป : {{ Carbon\Carbon::parse($row->date_start)->format('d/m/Y H:i') }} 
                                        </li>
                                        <li><i class="fa fa-caret-right txt-secondary m-r-10"></i>
                                            วันที่กลับ : {{ Carbon\Carbon::parse($row->date_end)->format('d/m/Y H:i') }} 
                                        </li>
                                    </ul>
                                    </td>
                                <td>{{ $row->number_of_travel }}</td>
                                <td>

                                    @if ($row->booking_status == '0')
                                    <span class="badge bg-secondary">รอตรวจสอบ</span>
                                    @elseif ($row->booking_status == '1')
                                    <span class="badge bg-info">
                                        ส่งใบเสนอราคาแล้ว
                                    </span>
                                    @elseif ($row->booking_status == '2')
                                    <span class="badge bg-danger">
                                        ยกเลิกการจอง
                                    </span>
                                    @elseif ($row->booking_status == '4')
                                    <span class="badge bg-secondary">
                                        แจ้งชำระเงินแล้ว<br> รอตรวจสอบ
                                    </span>
                                    @elseif ($row->booking_status == '5')
                                    <span class="badge bg-success">
                                       ตรวจสอบการชำระเงินเรียบร้อย
                                    </span>
                                    @endif

                                </td>
                                <td>
                          <a href="{{url('/user/booking_detail/'.$row->booking_id)}}"> <i class="fa fa-edit"></i> รายละเอียด</a>
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
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
