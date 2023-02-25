
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลการสั่งจองรถ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">
                    <div class="card-body">

                        <?php if(session('success')): ?>
                            <div class="alert alert-success" role="alert">
                                <b><?php echo e(session('success')); ?></b>
                            </div>
                        <?php endif; ?>

                        <table class="cell-border hover" id="basic-1">
                            <thead>
                                <tr>
                                    <th>ที่</th>
                                    <th>ชื่อสมาชิก</th>
                                    <th>ประเภทรถ</th>
                                    <th>วันที่ไป-กลับ</th>
                                    <th>สถานะ</th>
                                    <th>ตั้งค่า</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                ?>
                                <?php $__currentLoopData = $car_rent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($item->member_name); ?></td>
                                        <td><?php echo e($item->car_type); ?></td>
                                        <td>
                                            <?php echo e(Carbon\Carbon::parse($item->start_travel)->format('d/m/Y')); ?>

                                            - <?php echo e(Carbon\Carbon::parse($item->back_travel)->format('d/m/Y')); ?></td>
                                        <td>
                                            <?php if($item->rent_status == '0'): ?>
                                                <span class="txt-danger">รอส่งใบเสนอราคา</span>
                                            <?php elseif($item->rent_status == '1'): ?>
                                                <span class="txt-secondary">ส่งใบเสนอราคาแล้ว รอชำระเงิน</span>
                                            <?php elseif($item->rent_status == '2'): ?>
                                                <span class="txt-info">แจ้งโอนเงินแล้ว รอตรวจสอบ</span>
                                            <?php elseif($item->rent_status == '3'): ?>
                                          <span class="txt-success">ชำระมัดจำงวดที่ 1 แล้ว</span>
                                            <?php elseif($item->rent_status == '4'): ?>
                                                <span class="txt-danger">ยกเลิกการจอง</span>
                                            <?php elseif($item->rent_status == '5'): ?>
                                                <span class="txt-info">
                                                    แจ้งชำระเงินงวดที่ 2 รอตรวจสอบ
                                                </span>
                                                <?php elseif($item->rent_status == '6'): ?>
                                                <span class="txt-success">
                                                    ชำระเงินครบเรียบร้อยแล้ว
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td>

                                            <a href="<?php echo e(route('admin.car_rental_detail', ['id' => $item->rent_id])); ?>">
                                                <i class="fa fa-edit"></i> รายละเอียด</a>


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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/car_rental_data.blade.php ENDPATH**/ ?>