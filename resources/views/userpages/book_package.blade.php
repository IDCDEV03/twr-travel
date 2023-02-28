@extends('userLayouts.simple.master')

@section('title', 'สั่งจองแพ็คเกจทัวร์')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('assets/css/vendors/select2.css')}}">
@endsection

@section('style')
@endsection

@section('content')
<div class="container-fluid">
  @foreach ($package_all as $item)
  <div class="card">
    <div class="card-body">
      <h4>{{ $item->package_name }}</h4>
   {!! $item->package_detail !!}
    </div>
  </div>
@endforeach
@foreach ($package_all as $item)
<div class="card">
  <div class="card-body">
    <a href="{{ asset($item->package_file) }}" class="txt-secondary h3"><u>ดาวน์โหลดโปรแกรมทัวร์</u></a>
  </div>
</div>
@endforeach
	
	<div class="card">
        <div class="card-header">
          <h5>สั่งจองแพ็คเกจทัวร์</h5>
        </div>

        <form class="form needs-validation" method="POST" action="{{ route('insert_booking') }}">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label class="form-label">ชื่อผู้สั่งจอง
                    <span class="text-danger">*</span>                    
                  </label>
                  <input class="form-control" type="text" placeholder="ระบุชื่อ-นามสกุล" name="member_name" value="{{ Auth::user()->member_name }}" required>
                  <input type="hidden" name="member_id" value="{{ Auth::user()->id }}">
                </div>
              </div>
            </div>
@foreach ($users as $row)
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">อีเมล (สำหรับรับข้อมูลแจ้งการสั่งจอง)
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control" type="email" 
                    placeholder="กรุณาระบุอีเมลสำหรับการติดต่อรับใบเสนอราคา"
                    name="member_email" value="{{ $row->email }}">
                  </div>
                </div>
              </div>
@endforeach
<div class="row">
  <div class="col">
    <div class="mb-3">
      <label class="form-label">เบอร์โทรศัพท์ 
        <span class="text-danger">*</span> 
      </label>
      <input class="form-control" type="number" name="member_phone" placeholder="ระบุเป็นตัวเลขเท่านั้น" required>
    </div>
  </div>
</div>
@foreach ($package_all as $item)
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">แพ็คเกจที่ต้องการจอง
                      <span class="text-danger">*</span> 
                    </label>
                    <input type="hidden" value="{{request()->pkid}}" name="package_id">
                    <input class="form-control" value="{{ $item->package_name }}" readonly>
                  </div>
                </div>
              </div>
@endforeach

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">จำนวนที่นั่ง
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control" type="number" name="number_of_travel" placeholder="ระบุเป็นตัวเลขเท่านั้น" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">วัน/เวลาที่ออกเดินทาง
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control digits"  name="date_start" type="datetime-local" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">วัน/เวลาที่เดินทางกลับ
                      <span class="text-danger">*</span> 
                    </label>
                    <input class="form-control digits"  name="date_end" type="datetime-local" required>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">รายละเอียด/ความต้องการอื่นๆเพิ่มเติม</label>
                    <textarea class="form-control" name="member_detail" row="4"></textarea>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">ระบุช่องทางสำหรับให้เจ้าหน้าที่ติดต่อกลับ
                      <span class="text-danger">*</span> 
                    </label>
                    <textarea class="form-control" row="3" name="member_contact" placeholder="เช่น Line ID หรือ เบอร์โทรศัพท์" required></textarea>
                  </div>
                </div>
              </div>



          </div>
          <div class="card-footer">
            <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
            <input class="btn btn-light" type="reset" value="ยกเลิก">
          </div>
        </form>
    
		
	
	</div>
</div>
<script type="text/javascript">
	var session_layout = '{{ session()->get('layout') }}';
</script>
@endsection

@section('script')
<script src="{{asset('assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('assets/js/dashboard/default.js')}}"></script>
<script src="{{asset('assets/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/js/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/js/select2/select2-custom.js')}}"></script>
@endsection
