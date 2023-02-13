

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>บริการเช่ารถ</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

             
                <form class="form theme-form" action="<?php echo e(route('user.add_car_rent')); ?>" method="POST" >
                  <?php echo csrf_field(); ?>
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
                          <select class="js-example-basic-single" name="start_province">         
                              <option selected disabled value="" >เลือกจังหวัด..</option>                     
                            <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <option value="<?php echo e($item->name_th); ?>"><?php echo e($item->name_th); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>                      
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
                          <select class="js-example-basic-single" name="end_province">         
                            <option selected disabled value="" >เลือกจังหวัด..</option>                     
                          <?php $__currentLoopData = $province; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <option value="<?php echo e($item->name_th); ?>"><?php echo e($item->name_th); ?>

                          </option>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>  
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
                          <input class="datepicker-here form-control digits" type="text" id="minMaxExample" data-language="en" name="start_travel">                
                        </div>
                        <div class="col-md-4">
                          <label class="form-label" >วันที่เดินทางกลับ</label>
                          <input class="datepicker-here form-control digits" type="text" id="minMaxExample2" data-language="en" name="back_travel">             
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
        <input name="member_id" type="hidden" value="<?php echo e(Auth::user()->id); ?>" >     
                <div class="row g-3">                                  
                  <div class="col-md-6">
                    <label class="form-label">ชื่อ-นามสกุล</label>
                    <input class="form-control" name="member_name" type="text" value="<?php echo e(Auth::user()->member_name); ?>">

                  </div>
                  <div class="col-md-6">
                    <label class="form-label">อีเมล (สำหรับรับใบเสนอราคา)</label>
                    <input class="form-control" name="member_email" type="email" value="<?php echo e(Auth::user()->email); ?>">               
                  </div>                                    
                </div>

            <div class="row g-3">                              
              <div class="col-md-6">
                <label class="form-label">ชื่อหน่วยงาน/บริษัท (ถ้ามี)</label>
                <input class="form-control" name="member_company" type="text">

              </div>
              <div class="col-md-6">
                <label class="form-label">เบอร์โทรศัพท์</label>
                <input class="form-control" name="member_phone" type="text" value="<?php echo e(Auth::user()->user_phone); ?>" >               
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
        var session_layout = '<?php echo e(session()->get('layout')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.en.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datepicker/date-picker/datepicker.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/car_rent.blade.php ENDPATH**/ ?>