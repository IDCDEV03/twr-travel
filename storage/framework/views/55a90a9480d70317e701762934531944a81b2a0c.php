
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

             
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">
                            <div class="card-body">
                               <a href="<?php echo e(route('admin.car_rental_detail', ['id' => request()->id])); ?>">รายละเอียดการจอง</a> | <a href="<?php echo e(route('admin.car_rental_invoice', ['id'=>request()->id])); ?>">เอกสารใบจอง</a>
                               <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-success">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">ธนาคารที่โอนเข้า</th>
                                            <th scope="col">จำนวนเงิน</th>                           
                                            <th scope="col">วัน/เวลาที่แจ้งโอน</th>
                                            <th>สลิป</th>
                                            <th scope="col">ยืนยันยอด</th>
                                       
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $i = '1';
                                            ?>
                                            <?php $__currentLoopData = $car_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($i++); ?></th>
                                                <td><?php echo e($item->payment_bank); ?></td>
                                                <td><?php echo e(number_format($item->payment_price)); ?></td>         
                                                <td> <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')); ?></td>
                                                <td> <img src="<?php echo e(asset($item->payment_slip)); ?>" class="img-fluid" width="350px"></td>
                                                <td>
                       <?php if($item->rent_status == '2' AND $item->pay_num == 'pay1'): ?>
                       <a href="<?php echo e(route('admin.car_update_payment', ['id'=>$item->rent_id, 'pay_num'=>'pay1'])); ?>" class="btn btn-lg btn-primary" type="button" onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน</a>
                      <?php elseif($item->rent_status == '5' AND $item->pay_num == 'pay2'): ?>
                    <a href="<?php echo e(route('admin.car_update_payment', ['id'=>$item->rent_id, 'pay_num'=>'pay2'])); ?>" class="btn btn-lg btn-primary" type="button"
                    onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันการชำระเงิน
                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
               

            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/car_rental_payment_chk.blade.php ENDPATH**/ ?>