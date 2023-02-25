@extends('layouts.simple.master')
@section('title', 'ตรวจสอบการแจ้งชำระเงิน')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ตรวจสอบการแจ้งชำระเงิน (แพ็คเกจทัวร์)</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

             
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">
                            <div class="card-body">
                               <a href="{{route('booking_cf', ['id' => request()->id])}}">รายละเอียดการจอง</a> | <a href="{{ route('admin.invoice', ['id'=>request()->id]) }}">เอกสารใบจอง</a>
                               <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-info">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ธนาคารที่โอนเข้า</th>
                                            <th scope="col">จำนวนเงิน</th>                           
                                            <th scope="col">วัน/เวลาที่แจ้งโอน</th>
                                            <th>สลิป</th>
                                            <th scope="col">ยืนยันยอด</th>
                                       
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                             $i = '1';
                                            @endphp
                                            @foreach ($user_payment as $item)
                                            <tr>
                                                <th scope="row">{{$i++}}</th>
                                                <td>{{$item->payment_bank}}</td>
                                                <td>{{number_format($item->payment_price)}}</td>         
                                                <td> {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}</td>
                                                <td> <img src="{{ asset($item->payment_slip) }}" class="img-fluid" width="350px"></td>
                                                <td>
                       @if ($item->booking_status == '4' AND $item->pay_num == 'pay1')
                       <a href="{{ route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay1']) }}" class="btn btn-lg btn-primary" type="button" onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน</a>
                      @elseif ($item->booking_status == '5' AND $item->pay_num == 'pay2')
                    <a href="{{ route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay2']) }}" class="btn btn-lg btn-primary" type="button"
                    onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน
                    </a>
                                                    @endif
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
    </div>


@endsection
@section('script')
@endsection
