

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>รายการสั่งจองแพ็คเกจ</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php ($i = 1); ?>
<?php $__currentLoopData = $user_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container-fluid">
        <div class="card">

            <div class="card-header">
<h4><?php echo e($item->member_name); ?></h4>
            </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            <div class="card-body">
               
                <table class="cell-border hover" id="basic-1">
                    <thead>
                        <tr>
                            <th>ที่</th>
                            <th>รหัสแพ็คเกจ</th>
                            <th>แพ็คเกจ</th>
                            <th>ระหว่างวันที่</th>
                            <th>จำนวนที่นั่ง</th>
                            <th>สถานะ</th>                  
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $user_data_booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($row->code_tour); ?></td>
                                <td><?php echo e($row->package_name); ?></td>
                                <td>
                                    <ul>
                                        <li><i class="fa fa-caret-right txt-primary m-r-10"></i>
                                            วันที่ไป : <?php echo e(Carbon\Carbon::parse($row->date_start)->format('d/m/Y H:i')); ?> 
                                        </li>
                                        <li><i class="fa fa-caret-right txt-secondary m-r-10"></i>
                                            วันที่กลับ : <?php echo e(Carbon\Carbon::parse($row->date_end)->format('d/m/Y H:i')); ?> 
                                        </li>
                                    </ul>
                                    </td>
                                <td><?php echo e($row->number_of_travel); ?></td>
                                <td>
                                    <?php if($row->booking_status == '0'): ?>
                                    <span class="badge bg-secondary">รอตรวจสอบ</span>
                                    <?php elseif($row->booking_status == '1'): ?>
                                    <span class="badge bg-info">
                                        ส่งใบเสนอราคาแล้ว
                                    </span>
                                    <?php elseif($row->booking_status == '2'): ?>
                                    <span class="badge bg-danger">
                                        ยกเลิกการจอง
                                    </span>
                                    <?php elseif($row->booking_status == '4'): ?>
                                    <span class="badge bg-secondary">
                                        แจ้งชำระเงินแล้ว<br> รอตรวจสอบ
                                    </span>
                                    <?php elseif($row->booking_status == '5'): ?>
                                    <span class="badge bg-success">
                                       ดำเนินการเรียบร้อยแล้ว
                                    </span>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/user_detail.blade.php ENDPATH**/ ?>