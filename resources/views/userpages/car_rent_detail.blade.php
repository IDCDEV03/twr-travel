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
        
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif

                @foreach ($car_rent as $item)                   
              

                <div class="product-page-details">
                    <h3>รายละเอียดการเช่ารถ</h3>
                  </div>
                  <div class="product-price">
                    ประเภทรถ :{{$item->car_type}} 
                  </div>                
                  <hr>                 
                  <p>สถานะ :
                    @if ($item->rent_status == '0')
                    <span class="txt-secondary f-w-100"> รอเจ้าหน้าที่ตรวจสอบและส่งใบจอง </span>
                    @elseif ($item->rent_status == '1')
                    <span class="txt-info f-w-100"> ส่งใบจองแล้ว รอชำระเงิน</span>
                    <span ><a href="{{ route('user.car_rent_invoice', ['id'=>$item->rent_id]) }}" class="txt-danger"> >> รายละเอียดใบจอง #{{$item->rent_id}}</a></span>
                    @elseif ($item->rent_status == '2')
                    <span class="txt-danger">
                      แจ้งชำระเงินแล้ว รอตรวจสอบ 
                  </span>
                  @elseif ($item->rent_status == '3')
                                <span class="txt-secondary">
                                    ชำระเงินมัดจำงวดที่ 1 แล้ว
                                </span>
                                <span ><a href="{{ route('user.car_rent_invoice', ['id'=>$item->rent_id]) }}" class="txt-danger"> >> รายละเอียดใบจอง #{{$item->rent_id}}</a></span>
                    @endif
                  </p>
                  <hr>
                  <div>
                    <table class="product-page-width">
                      <tbody>
                        <tr>
                          <td> <b>ที่อยู่ต้นทาง &nbsp;&nbsp;&nbsp;:</b></td>
                          <td class="txt-success"> {{$item->start_place}} / 
                            {{$item->start_district}} / {{$item->start_province}} </td>
                        </tr>
                        <tr>
                          <td> <b>ที่อยู่ปลายทาง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td class="txt-primary">{{$item->end_place}}
                            / {{$item->end_district}} / {{$item->end_province}}</td>
                        </tr>
                        <tr>
                          <td> <b>ประเภทการใช้รถ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td>{{$item->car_for}}</td>
                        </tr>
                        <tr>
                          <td> <b>จำนวนผู้โดยสาร &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td>{{$item->number_people}}</td>
                        </tr>
                        <tr>
                            <td> <b>จำนวนรถที่ต้องการ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>{{$item->number_of_car}}</td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางไป &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td> {{ Carbon\Carbon::parse($item->start_travel)->format('d/m/Y') }}</td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางกลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>{{ Carbon\Carbon::parse($item->back_travel)->format('d/m/Y') }}</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <p>รายละเอียดการเดินทาง : {{$item->travel_detail}}</p>
                  <hr>
                  <p>รายละเอียดอื่นๆเพิ่มเติม : {{$item->other_req}}</p>
                  <hr>
              
                  <div class="m-t-15">
                    @php
                    $date_before_pay = Carbon::parse($item->start_travel)->addDays(-15)->format('Y-m-d');
                    $today = date('Y-m-d');
                    @endphp

                    
                    @if ($item->rent_status == '1')
                    <a href="{{ route('user.car_rent_payment', ['id'=>$item->rent_id]) }}" class="btn btn-primary">แจ้งโอนเงิน</a>
                    <button class="btn btn-danger m-r-10" type="button" title=""> <i class="fa fa-close"></i> ยกเลิกการจอง</button>
                    @elseif ($item->rent_status == '3')
                      @if ($today >= $date_before_pay)
                        เกินกำหนดชำระ
                      @else
                      <a href="{{ route('user.car_rent_payment', ['id'=>$item->rent_id]) }}" class="btn btn-primary">แจ้งโอนเงินมัดจำ งวดที่ 2</a>
                      @endif                                    
                    @endif
                    
                   
                  </div>
                </div>
             

                @endforeach
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
