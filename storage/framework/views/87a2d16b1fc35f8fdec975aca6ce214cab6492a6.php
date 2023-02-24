

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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <b><?php echo e(session('success')); ?></b>
                    </div>
                <?php elseif(session('cancel')): ?>
                <div class="alert alert-danger" role="alert">
                    <b><?php echo e(session('cancel')); ?></b>
                </div>
                <?php endif; ?>


                <table class="cell-border hover" id="basic-1">
                    <thead>
                        <tr>
                            <th>ที่</th>
                            <th>แพ็คเกจ</th>
                            <th>ระหว่างวันที่</th>
                            <th>จำนวนที่นั่ง</th>
                            <th>สถานะ</th>
                            <th>ตั้งค่า</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php ($i = 1); ?>
                        <?php $__currentLoopData = $list_booking; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
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
                                    <span class="txt-secondary">รอตรวจสอบ</span>
                                    <?php elseif($row->booking_status == '1'): ?>
                                    <span class="txt-info">
                                        ส่งใบเสนอราคาแล้ว
                                    </span>
                                    <?php elseif($row->booking_status == '2'): ?>
                                    <span class="txt-danger">
                                        ยกเลิกการจอง
                                    </span>
                                    <?php elseif($row->booking_status == '4'): ?>
                                    <span class="txt-secondary">
                                        แจ้งชำระเงินแล้ว<br> รอตรวจสอบ
                                    </span>
                                    <?php elseif($row->booking_status == '5'): ?>
                                    <span class="txt-success">
                                       ตรวจสอบการชำระเงินเรียบร้อย
                                    </span>
                                    <?php endif; ?>

                                </td>
                                <td>
                          <a href="<?php echo e(url('/user/booking_detail/'.$row->booking_id)); ?>"> <i class="fa fa-edit"></i> รายละเอียด</a>
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
    <script type="text/javascript">
        var session_layout = '<?php echo e(session()->get('layout')); ?>';
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/datatable/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/datatable/datatables/datatable.custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/booking_status.blade.php ENDPATH**/ ?>