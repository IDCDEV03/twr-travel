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
                                            <th style="width: 5%">#</th>
                                <th style="width: 15%">ธนาคารที่โอนเข้า</th>
                                            <th style="width: 10%">จำนวนเงิน</th>                           
                                            <th style="width: 15%">วัน/เวลาแจ้งโอน</th>
                                            <th style="width: 15%">งวดที่</th>
                                            <th style="width: 20%">สลิป</th>
                                            <th style="width: 20%">ยืนยันยอด</th>
                                       
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
                                                <td>{{number_format($item->payment_price)}}
                                                </td>
                                                   
                                                <td> {{ Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i') }}</td>

                                                <td>
                                                    @if ($item->pay_num == 'pay1')
                                                        มัดจำงวดที่ 1
                                                    @elseif ($item->pay_num == 'pay2')
                                                        ยอดชำระงวดที่ 2
                                                    @endif
                                                        </td>   
                                                <td> <a href="#" class="pop"><img src="{{ asset($item->payment_slip) }}" class="img-fluid" width="200px">
                                                    คลิกที่ภาพเพื่อขยาย</a>
                                                </td>
                                                <td>
                       @if ($item->booking_status == '4' AND $item->pay_num == 'pay1')
                       <a href="{{ route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay1']) }}" class="btn btn-primary" type="button" onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันยอดชำระ</a>
                    @elseif ($item->booking_status == '6' AND $item->pay_num == 'pay2')
                    <a href="{{ route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay2']) }}" class="btn  btn-primary" type="button"
                    onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันยอดชำระ
                    </a>
                    @elseif($item->booking_status == '5')
                     <span class="txt-success">ชำระแล้ว</span>
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
<!-----modal------>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header">
            <h5 class="modal-title">สลิปโอนเงิน</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>             
        <div class="modal-body">            
          <img src="" class="imagepreview" style="width: 100%;" >
        </div>
      </div>
    </div>
  </div>

@endsection
@section('script')
<script>
    $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
@endsection
