@extends('Layouts.simple.master')

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
                    ประเภทรถ : {{$item->car_type}} 
                  </div>   
                  <hr>
                    <ul>
                        <li><span>ชื่อผู้จอง : {{$item->member_name}}</span></li>
                        <li><span>เบอร์โทรศัพท์ : {{$item->member_phone}}</span></li>
                        <li><span>หน่วยงาน/บริษัท : {{$item->member_company}}</span></li>
                        <li><span>อีเมล : {{$item->member_email}}</span></li>
                    </ul>         
                  <hr>                 
                  <p>สถานะ :
                    @if ($item->rent_status == '0')
                    <span class="txt-secondary f-w-100"> รอเจ้าหน้าที่ตรวจสอบและส่งใบจอง </span>
                    @elseif ($item->rent_status == '1')
                    <span class="txt-info f-w-100"> ส่งใบจองแล้ว </span>
                    @elseif ($item->rent_status == '2')
                    <span class="txt-info f-w-100"> แจ้งโอนเงินแล้ว รอตรวจสอบ 
                         <a href="{{ route('admin.car_rent_payment', ['id'=>$item->rent_id]) }}"> >> คลิก ตรวจสอบยอดแจ้งโอน</a>
                    </span>
                    @elseif ($item->rent_status == '3')
                    <span class="txt-secondary"> ชำระเงินมัดจำงวดที่ 1 แล้ว 
                        <a href="{{ route('admin.car_rental_invoice', ['id'=>$item->rent_id]) }}"> >> ใบจอง #{{$item->rent_id}}</a>
                    </span>
                    @elseif ($item->rent_status == '5')
                    <span class="txt-info">
                        แจ้งชำระเงินงวดที่ 2 รอตรวจสอบ  
                        <a href="{{ route('admin.car_rent_payment', ['id'=>$item->rent_id]) }}"> >> คลิก ตรวจสอบยอดแจ้งโอน</a>
                    </span>
                    @elseif ($item->rent_status == '6')
                    <span class="txt-success">
                        ชำระเงินครบเรียบร้อยแล้ว   <a href="{{ route('admin.car_rental_invoice', ['id'=>$item->rent_id]) }}"> >> ใบจอง #{{$item->rent_id}}</a>
                    </span>
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
                </div>
         
            </div>
       
            @if ($item->rent_status == '0')
            <div class="card">
                <div class="card-header b-t-secondary">
                    <h5>ส่งใบเสนอราคา </h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="{{ route('admin.car_rental_quotation', ['id' => request()->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label pt-0">บริการที่สั่งจอง</label>
                            <div class="col-sm-9">
                                <div class="form-control-static">
                                    {{$item->car_type}} | จำนวนรถ {{$item->number_of_car}} คัน | วันที่ {{ Carbon\Carbon::parse($item->start_travel)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($item->back_travel)->format('d/m/Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">ราคารวม
                                </label>
                                <input class="form-control" name="total_price" type="number"
                                    placeholder="ใส่เฉพาะตัวเลข ไม่ต้องใส่เครื่องหมายคั่นหลัก" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">อัพโหลดเอกสาร (ถ้ามี)
                                    <span class="txt-info">(เฉพาะไฟล์ pdf)</span>
                                </label>
                                <input class="form-control" name="car_rental_file" type="file"
                                    accept="application/pdf">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-mb-6">
                                <label class="form-label txt-secondary">ราคามัดจำ
                                </label>
                                <input type="number" class="form-control" name="price_deposit"
                                    placeholder="ใส่เฉพาะตัวเลข ไม่ต้องใส่เครื่องหมายคั่นหลัก" required>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-mb-6">
                                <label class="form-label">รายละเอียดเพิ่มเติม
                                </label>
                                <textarea class="form-control" name="car_quotation_detail" rows="3" required></textarea>
                            </div>
                        </div>
                        <hr>
                        <div class="m-t-15">
                            <button class="btn btn-secondary m-r-10" type="submit" title="">
                                <i class="fa fa-exchange me-1"></i>ส่งใบเสนอราคา
                            </button>
                    </form>
                </div>
            </div>
            @elseif($item->rent_status == '1')
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <span class="alert alert-secondary">ส่งใบจองแล้ว รอชำระเงิน</span>
                        <hr>
                        <a href="{{ route('admin.car_rental_invoice', ['id'=>$item->rent_id]) }}">ใบจอง #{{$item->rent_id}}</a>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
    </div>
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')

    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
