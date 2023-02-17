

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
                    ประเภทรถ :<?php echo e($item->car_type); ?> 
                  </div>                
                  <hr>                 
                  <p>สถานะ :
                    <?php if($item->rent_status == '0'): ?>
                    <span class="txt-secondary f-w-100"> รอเจ้าหน้าที่ตรวจสอบและส่งใบจอง </span>
                    <?php elseif($item->rent_status == '1'): ?>
                    <span class="txt-info f-w-100"> ส่งใบจองแล้ว รอชำระเงิน</span>
                    <span ><a href="<?php echo e(route('user.car_rent_invoice', ['id'=>$item->rent_id])); ?>" class="txt-danger"> >> รายละเอียดใบจอง #<?php echo e($item->rent_id); ?></a></span>
                    <?php elseif($item->rent_status == '2'): ?>
                    <span class="txt-danger">
                      แจ้งชำระเงินแล้ว รอตรวจสอบ 
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
              
                  <div class="m-t-15">

                    <?php if($item->rent_status == '1'): ?>
                    <a href="<?php echo e(route('user.car_rent_payment', ['id'=>$item->rent_id])); ?>" class="btn btn-primary">แจ้งโอนเงิน</a>
                    <button class="btn btn-danger m-r-10" type="button" title=""> <i class="fa fa-close"></i> ยกเลิกการจอง</button>
                    <?php endif; ?>
                    
                   
                  </div>
                </div>
             

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/car_rent_detail.blade.php ENDPATH**/ ?>