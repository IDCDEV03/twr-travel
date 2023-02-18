
<?php $__env->startSection('title', 'ตรวจสอบการแจ้งชำระเงิน'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ตรวจสอบการแจ้งชำระเงิน</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <?php $__currentLoopData = $car_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6"><span class="h5">ใบจองแพ็คเกจ</span>
                                        <a class="btn btn-warning txt-dark" type="button" href="<?php echo e(route('admin.car_rental_invoice', ['id' => request()->id])); ?>" >#<?php echo e($row->car_quotation); ?></a>
                                    </div>
                                    <div class="col-md-6">
                                      
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="h5">สลิปการโอนเงิน</span><br>
                                        <img src="<?php echo e(asset($row->payment_slip)); ?>" class="img-fluid" width="350px">
                                    </div>
                                    <div class="col-md-8">
                                        <ul class="h5 f-w-100">
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>โอนชำระผ่าน :
                                                <?php echo e($row->payment_bank); ?></li>
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>จำนวนเงิน :
                                                <?php echo e(number_format($row->payment_price)); ?> บาท</li>
                                            <li><i class="fa fa-angle-double-right txt-primary m-r-10"></i>แจ้งโอนเมื่อ :
                                                <?php echo e(Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i')); ?></li>
                                        </ul>
                                        <hr>
                                        <span class="txt-secondary">
                                            คงเหลือยอดชำระ :
                                            <?php
                                                $result = $row->total_price - $row->price_deposit;
                                                echo number_format($result);
                                            ?>
                                            บาท </span>
                                        <hr>
                                        <a href="<?php echo e(route('admin.car_update_payment', ['id'=>$row->rent_id])); ?>"
                                            class="btn btn-lg btn-primary" type="button"
                                            onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน</a>
                                        <button class="btn btn-lg btn-danger" type="button">ยอดชำระไม่ถูกต้อง</button>
                                        <hr>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/car_rental_payment_chk.blade.php ENDPATH**/ ?>