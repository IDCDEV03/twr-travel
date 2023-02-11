

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
                    ประเภทรถ                   
                  </div>
                
                  <hr>
                  <p>สถานะ :</p>
                  <hr>
                  <div>
                    <table class="product-page-width">
                      <tbody>
                        <tr>
                          <td> <b>ที่อยู่ต้นทาง &nbsp;&nbsp;&nbsp;:</b></td>
                          <td class="txt-success"> <?php echo e($item->start_place); ?> </td>
                        </tr>
                        <tr>
                          <td> <b>ที่อยู่ปลายทาง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td class="txt-primary"><?php echo e($item->end_place); ?></td>
                        </tr>
                        <tr>
                          <td> <b>ประเภทการใช้รถ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td>ABC</td>
                        </tr>
                        <tr>
                          <td> <b>จำนวนผู้โดยสาร &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                          <td>Cotton</td>
                        </tr>
                        <tr>
                            <td> <b>จำนวนรถที่ต้องการ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>Cotton</td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางไป &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>Cotton</td>
                          </tr>
                          <tr>
                            <td> <b>วันที่เดินทางกลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                            <td>Cotton</td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                  <hr>
                  <p>รายละเอียดการเดินทาง :</p>
                  <hr>
                  <p>รายละเอียดอื่นๆเพิ่มเติม</p>
                  <hr>
               
                  <div class="m-t-15">
                    <button class="btn btn-danger m-r-10" type="button" title=""> <i class="fa fa-close"></i> ยกเลิกการจอง</button>
                   
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