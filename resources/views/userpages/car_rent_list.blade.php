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
                    <table class="table table-bordered">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รถที่เช่า</th>
                            <th scope="col">สถานที่</th>                           
                            <th scope="col">วันที่เช่า</th>
                            <th scope="col">สถานะ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                       @foreach ($car_rent as $item)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$item->car_type}}</td>
                            <td>{{$item->start_place}}-{{$item->end_place}}</td>         
                            <td>
                                {{ formatDateThai($item->start_travel)}}
                        
                            </td>
                            <td>

                                @if ($item->rent_status == '0')
                                <span class="txt-secondary">รอตรวจสอบ</span>
                                @elseif ($item->rent_status == '1')
                                <span class="txt-info">
                                    ส่งใบเสนอราคาแล้ว
                                </span>
                                @elseif ($item->rent_status == '2')
                                <span class="txt-danger">
                                    แจ้งชำระเงินแล้ว<br> รอตรวจสอบ 
                                </span>
                                @elseif ($item->rent_status == '3')
                                <span class="txt-secondary">
                                    ชำระเงินมัดจำงวดที่ 1 แล้ว
                                </span>
                                @elseif ($item->rent_status == '4')
                                <span class="txt-danger">
                                    ยกเลิกการจอง
                                </span>
                                @elseif ($item->rent_status == '5')
                                <span class="txt-secondary">
                                    แจ้งชำระเงินแล้ว<br> รอตรวจสอบ 
                                </span>
                                @elseif ($item->rent_status == '6')
                                <span class="txt-success">
                                    ดำเนินการเรียบร้อยแล้ว
                                </span>
                                @endif

                            </td>
                            <td><a href="{{route('user.rent_detail', ['id' => $item->rent_id])}}" >รายละเอียด</a> </td>
                        </tr>      
                        @endforeach                  
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
