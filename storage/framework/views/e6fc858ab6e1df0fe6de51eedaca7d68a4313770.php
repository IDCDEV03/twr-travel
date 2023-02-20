

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แจ้งการชำระเงิน</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
      
                <?php $__currentLoopData = $car_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

           
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 "><span>ใบจองบริการที่ 
                                <u><a href="<?php echo e(route('user.car_rent_invoice', ['id'=>$item->rent_id])); ?>" class="txt-danger"> #<?php echo e($item->car_quotation); ?></a></u></span></div>
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
                <form class="needs-validation" novalidate="" action="<?php echo e(route('user.insert_car_rent_payment', ['id'=>$item->rent_id])); ?>"
                 method="POST" enctype="multipart/form-data">
                 <?php echo csrf_field(); ?>
                    <input type="hidden" value="<?php echo e($item->member_id); ?>" name="member_id">
                    <?php if($item->rent_status == '3'): ?>
                        <input type="hidden" name="rent_status" value="5">
                    <?php elseif($item->rent_status == '1'): ?>
                       <input type="hidden" name="rent_status" value="2">
                    <?php endif; ?>
                    <div class="row g-3">                
                      <div class="col-md-12">
                        <label class="form-label">จำนวนเงินที่โอน</label>
                        <input class="form-control" type="text" name="payment_price">
                        <?php $__errorArgs = ['payment_price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger my-2">
                            << <?php echo e($message); ?> >> </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>                 
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <h6>ธนาคารที่โอนชำระ</h6>
                    </div>
                    <div class="col">
                        <select class="form-select digits" name="payment_bank">
                            <option selected disabled value="">เลือก..</option>
                            <?php $__currentLoopData = $data_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                            <option value="<?php echo e($row->bank_name); ?>"><?php echo e($row->bank_name); ?> / <?php echo e($row->account_number); ?> / <?php echo e($row->bank_account_name); ?> </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__errorArgs = ['payment_slip'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger my-2">
                                << <?php echo e($message); ?> >> </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <script type="text/javascript">
        var session_layout = '<?php echo e(session()->get('layout')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/car_rent_payment.blade.php ENDPATH**/ ?>