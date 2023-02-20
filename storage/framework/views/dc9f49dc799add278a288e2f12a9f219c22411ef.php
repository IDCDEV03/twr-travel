

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
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

                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <b><?php echo e(session('success')); ?></b>
                    </div>
                <?php endif; ?>

                <?php $__currentLoopData = $car_rent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                   
              

                <div class="product-page-details">
                    <h3>รายละเอียดการเช่ารถ</h3>
                  </div>
                  <div class="product-price">
                    ประเภทรถ : <?php echo e($item->car_type); ?> 
                  </div>   
                  <hr>
                    <ul>
                        <li><span>ชื่อผู้จอง : <?php echo e($item->member_name); ?></span></li>
                        <li><span>เบอร์โทรศัพท์ : <?php echo e($item->member_phone); ?></span></li>
                        <li><span>หน่วยงาน/บริษัท : <?php echo e($item->member_company); ?></span></li>
                        <li><span>อีเมล : <?php echo e($item->member_email); ?></span></li>
                    </ul>         
                  <hr>                 
                  <p>สถานะ :
                    <?php if($item->rent_status == '0'): ?>
                    <span class="txt-secondary f-w-100"> รอเจ้าหน้าที่ตรวจสอบและส่งใบจอง </span>
                    <?php elseif($item->rent_status == '1'): ?>
                    <span class="txt-info f-w-100"> ส่งใบจองแล้ว </span>
                    <?php elseif($item->rent_status == '2'): ?>
                    <span class="txt-info f-w-100"> แจ้งโอนเงินแล้ว รอตรวจสอบ 
                         <a href="<?php echo e(route('admin.car_rent_payment', ['id'=>$item->rent_id])); ?>"> >> คลิก ตรวจสอบยอดแจ้งโอน</a>
                    </span>
                    <?php elseif($item->rent_status == '3'): ?>
                    <span class="txt-secondary"> ชำระเงินมัดจำงวดที่ 1 แล้ว 
                        <a href="<?php echo e(route('admin.car_rental_invoice', ['id'=>$item->rent_id])); ?>"> >> ใบจอง #<?php echo e($item->rent_id); ?></a>
                    </span>
                    <?php elseif($item->rent_status == '5'): ?>
                    <span class="txt-info">
                        แจ้งชำระเงินงวดที่ 2 รอตรวจสอบ  
                        <a href="<?php echo e(route('admin.car_rent_payment', ['id'=>$item->rent_id])); ?>"> >> คลิก ตรวจสอบยอดแจ้งโอน</a>
                    </span>
                    <?php elseif($item->rent_status == '6'): ?>
                    <span class="txt-success">
                        ชำระเงินครบเรียบร้อยแล้ว   <a href="<?php echo e(route('admin.car_rental_invoice', ['id'=>$item->rent_id])); ?>"> >> ใบจอง #<?php echo e($item->rent_id); ?></a>
                    </span>
                    <?php endif; ?>
                  </p>
                  <hr>
                  <div>
                    <table class="product-page-width">
                      <tbody>
                        <tr>
                          <td> <b>ที่อยู่ต้นทาง &nbsp;&nbsp;&nbsp;:</b></td>
                          <td class="txt-success"> <?php echo e($item->start_place); ?> / 
                            <?php echo e($item->start_district); ?> / <?php echo e($item->start_province); ?> </td>
                        </tr>
                        <tr>
                          <td> <b>ที่อยู่ปลายทาง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td class="txt-primary"><?php echo e($item->end_place); ?>

                            / <?php echo e($item->end_district); ?> / <?php echo e($item->end_province); ?></td>
                        </tr>
                        <tr>
                          <td> <b>ประเภทการใช้รถ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td><?php echo e($item->car_for); ?></td>
                        </tr>
                        <tr>
                          <td> <b>จำนวนผู้โดยสาร &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td><?php echo e($item->number_people); ?></td>
                        </tr>
                        <tr>
                            <td> <b>จำนวนรถที่ต้องการ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td><?php echo e($item->number_of_car); ?></td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางไป &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td> <?php echo e(Carbon\Carbon::parse($item->start_travel)->format('d/m/Y')); ?></td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางกลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td><?php echo e(Carbon\Carbon::parse($item->back_travel)->format('d/m/Y')); ?></td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <p>รายละเอียดการเดินทาง : <?php echo e($item->travel_detail); ?></p>
                  <hr>
                  <p>รายละเอียดอื่นๆเพิ่มเติม : <?php echo e($item->other_req); ?></p>
                  <hr>
                </div>
         
            </div>
       
            <?php if($item->rent_status == '0'): ?>
            <div class="card">
                <div class="card-header b-t-secondary">
                    <h5>ส่งใบเสนอราคา </h5>
                </div>
                <div class="card-body">
                    <form class="needs-validation" action="<?php echo e(route('admin.car_rental_quotation', ['id' => request()->id])); ?>"
                        method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label pt-0">บริการที่สั่งจอง</label>
                            <div class="col-sm-9">
                                <div class="form-control-static">
                                    <?php echo e($item->car_type); ?> | จำนวนรถ <?php echo e($item->number_of_car); ?> คัน | วันที่ <?php echo e(Carbon\Carbon::parse($item->start_travel)->format('d/m/Y')); ?> - <?php echo e(Carbon\Carbon::parse($item->back_travel)->format('d/m/Y')); ?>

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
            <?php elseif($item->rent_status == '1'): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <span class="alert alert-secondary">ส่งใบจองแล้ว รอชำระเงิน</span>
                        <hr>
                        <a href="<?php echo e(route('admin.car_rental_invoice', ['id'=>$item->rent_id])); ?>">ใบจอง #<?php echo e($item->rent_id); ?></a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <script type="text/javascript">
        var session_layout = '<?php echo e(session()->get('layout')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/car_rental_detail.blade.php ENDPATH**/ ?>