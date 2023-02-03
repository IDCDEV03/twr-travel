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

             
                <form class="form theme-form" action="{{ route('user.add_car_rent') }}" method="POST" >
                  @csrf
                    <div class="card-body">
                      <div class="row">                   
                        <div class="col">
                            <label class="h6 txt-primary">เลือกประเภทรถ</label>
                            <div class="m-t-15 m-checkbox-inline custom-radio-ml">
                              <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="radioinline1" type="radio" name="car_type" value="รถบัส">
                                <label class="form-check-label mb-0" for="radioinline1">รถบัส</label>
                              </div>
                              <div class="form-check form-check-inline radio radio-primary">
                                <input class="form-check-input" id="radioinline2" type="radio" name="car_type" value="รถตู้">
                                <label class="form-check-label mb-0" for="radioinline2">รถตู้</label>
                              </div>                             
                            </div>
                        </div>         
                    </div>
                    <hr>

                    <div class="row g-3">
                        <p class="h6 txt-secondary">ที่อยู่ (ต้นทาง)</p>
                        <div class="col-md-6">
                          <label class="form-label">จังหวัด</label>
                          <input class="form-control" name="start_province" type="text">
                
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" >อำเภอ/เขต</label>
                          <input class="form-control" name="start_district" type="text" >               
                        </div>                    
                    </div>
                
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label">สถานที่รับผู้โดยสาร</label>
                            <input class="form-control" name="start_place" type="text" placeholder="ระบุรายละเอียดสถานที่รับ เช่น โรงแรม โรงเรียน บริษัท">
                          </div>
                        </div>
                      </div>

                      <div class="row g-3">
                        <p class="h6 txt-info">ที่อยู่ (ปลายทาง)</p>
                        <div class="col-md-6">
                          <label class="form-label">จังหวัด</label>
                          <input class="form-control" name="end_province" type="text">
                
                        </div>
                        <div class="col-md-6">
                          <label class="form-label" >อำเภอ/เขต</label>
                          <input class="form-control" name="end_district" type="text" >               
                        </div>                    
                    </div>

                    <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label">สถานที่ปลายทาง</label>
                            <input class="form-control" name="end_place" type="text" placeholder="ระบุสถานที่ปลายทาง">
                          </div>
                        </div>
                    </div>
                    
                    <div class="row g-3">
                   
                        <div class="col-md-4">
                          <label class="form-label">วันที่เดินทางไป</label>
                          <input class="form-control" name="start_travel" type="text">
                
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" >วันที่เดินทางกลับ</label>
                          <input class="form-control" name="back_travel" type="text" >               
                        </div>    
                        <div class="col-md-4">
                            <label class="form-label"> ประเภทการใช้รถ </label>
                            <select class="form-select" name="car_for" >
                              <option selected="" disabled="" >เลือก...</option>
                                <option value="ส่ง-รับ">ส่ง-รับ</option>
                                <option value="ส่ง-รับ_กลางวันไม่ใช้รถ">ส่ง-รับ กลางวันไม่ใช้รถ</option>
                                <option value="ใช้ทุกวัน">ใช้ทุกวัน</option>  
                                <option value="ส่งเท่านั้น">ส่งเท่านั้น</option>  
                                <option value="รับกลับเท่านั้น">รับกลับเท่านั้น</option>    
                            </select>           
                          </div>                 
                    </div>


                    <div class="row">
                      <div class="col">
                        <div>
                          <label class="form-label" >รายละเอียดการเดินทาง/แผนการเดินทาง</label>
                          <textarea class="form-control" name="travel_detail" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                                      
                    <div class="row g-3">
                   
                      <div class="col-md-6">
                        <label class="form-label">จำนวนผู้โดยสาร</label>
                        <input class="form-control" name="number_people" type="number">
              
                      </div>
                      <div class="col-md-6">
                        <label class="form-label">จำนวนรถที่ต้องการใช้</label>
                        <input class="form-control" type="number" name="number_of_car" >               
                      </div>    
                                     
                  </div>

<hr>
        <label class="h4 txt-primary">ข้อมูลลูกค้า</label>
        <input name="member_id" type="hidden" value="{{Auth::user()->id}}" >     
                <div class="row g-3">                                  
                  <div class="col-md-6">
                    <label class="form-label">ชื่อ-นามสกุล</label>
                    <input class="form-control" name="member_name" type="text" value="{{Auth::user()->member_name}}">

                  </div>
                  <div class="col-md-6">
                    <label class="form-label">อีเมล (สำหรับรับใบเสนอราคา)</label>
                    <input class="form-control" name="member_email" type="email" value="{{Auth::user()->email}}">               
                  </div>                                    
                </div>

            <div class="row g-3">                              
              <div class="col-md-6">
                <label class="form-label">ชื่อหน่วยงาน/บริษัท (ถ้ามี)</label>
                <input class="form-control" name="member_company" type="text">

              </div>
              <div class="col-md-6">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input class="form-control" name="member_phone" type="text" value="{{Auth::user()->user_phone}}" >               
              </div>   
                            
            </div>

                        <div class="row">
                          <div class="col">
                            <div>
                              <label class="form-label" >รายละเอียดอื่นๆ เพิ่มเติม</label>
                              <textarea class="form-control" name="other_req" rows="3"></textarea>
                            </div>
                          </div>
                        </div>
                                       
                    <div class="card-footer text-end">
                      <button class="btn btn-primary btn-lg" type="submit">บันทึกข้อมูล</button>
                 
                    </div>
                  </form>
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
