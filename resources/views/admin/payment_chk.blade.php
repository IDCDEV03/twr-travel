@extends('layouts.simple.master')
@section('title', 'ตรวจสอบการแจ้งชำระเงิน')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>ตรวจสอบการแจ้งชำระเงิน</h3>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                @foreach ($user_payment as $row)
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><span class="h5">ใบจองแพ็คเกจ</span>
                                        <a class="btn btn-warning txt-dark" type="button" href="{{ route('admin.invoice', ['id' => request()->id]) }}" >#{{ $row->quotation_id }}</a>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="h5">ยอดชำระมัดจำงวดที่ 1 :
                                            {{ number_format($row->price_deposit) }} บาท</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="h5">สลิปการโอนเงิน</span><br>
                                        <img src="{{ asset($row->payment_slip) }}" class="img-fluid" width="350px">
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="h5 f-w-100">
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>โอนชำระผ่าน :
                                                {{ $row->payment_bank }}</li>
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>จำนวนเงิน :
                                                {{ number_format($row->payment_price) }} บาท</li>
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>แจ้งโอนเมื่อ :
                                                {{ Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i') }}</li>
                                        </ul>
                                        <hr>
                                        <span class="txt-secondary">
                                            คงเหลือยอดชำระ :
                                            @php
                                                $result = $row->total_price - $row->price_deposit;
                                                echo number_format($result);
                                            @endphp
                                            บาท </span>
                                        <hr>
                                        <a href="{{ url('/admin/update_payment/' . $row->quotation_id . '/' . request()->id) }}"
                                            class="btn btn-lg btn-primary" type="button"
                                            onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน</a>
                                        <button class="btn btn-lg btn-danger" type="button">ยอดชำระไม่ถูกต้อง</button>
                                        <hr>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection
@section('script')
@endsection
