@extends('userLayouts.simple.master')

@section('title', 'Default')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>แจ้งการชำระเงิน</h3>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
      
                @foreach ($car_payment as $item)

           
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 "><span>ใบจองบริการที่ 
                                <u><a href="{{ route('user.car_rent_invoice', ['id'=>$item->rent_id]) }}" class="txt-danger"> #{{$item->car_quotation}}</a></u></span></div>
                            <div class="col-md-6 ">
                            </div>
                        </div>
                    </div>
                </div>
     
            
                <div class="card">
                    <div class="card-header">
                       <h5>แจ้งหลักฐานการชำระเงิน</h5> 
                       <span>กรอกข้อมูลการโอนเงินของท่าน พร้อมแนบรูปหลักฐาน</span>
                    </div>
                    <div class="card-body">
                <form class="needs-validation" novalidate="" action="{{ route('user.insert_car_rent_payment', ['id'=>$item->rent_id]) }}"
                 method="POST" enctype="multipart/form-data">
                 @csrf
                    <input type="hidden" value="{{$item->member_id}}" name="member_id">
                        @if ($item->rent_status == '3')
                            <input type="hidden" name="rent_status" value="5">
                        @elseif ($item->rent_status == '1')
                        <input type="hidden" name="rent_status" value="2">
                        @endif
                    <div class="row g-3">                
                      <div class="col-md-12">
                        <label class="form-label">จำนวนเงินที่โอน</label>
                        <input class="form-control" type="text" name="payment_price">
                        @error('payment_price')
                        <span class="text-danger my-2">
                            << {{ $message }} >> </span>
                    @enderror
                      </div>                 
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <h6>ธนาคารที่โอนชำระ</h6>
                    </div>
                    <div class="col">
                        <select class="form-select digits" name="payment_bank">
                            <option selected disabled value="">เลือก..</option>
                            @foreach ($data_bank as $row)        
                            <option value="{{$row->bank_name}}">{{$row->bank_name}} / {{$row->account_number}} / {{$row->bank_account_name}} </option>
                            @endforeach
                          </select>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">สลิปการโอนเงิน</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="file" name="payment_slip" accept="image/*">
                            </div>
                            @error('payment_slip')
                            <span class="text-danger my-2">
                                << {{ $message }} >> </span>
                        @enderror
                          </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                      </div>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
@endforeach
    <script type="text/javascript">
        var session_layout = '{{ session()->get('layout') }}';
    </script>
@endsection

@section('script')
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
@endsection
