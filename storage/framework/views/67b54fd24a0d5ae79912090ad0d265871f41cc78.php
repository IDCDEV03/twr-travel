
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลสมาชิก</h3>
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
                                    <th>Username</th>
                                    <th>อีเมล</th>
                                    <th>วันที่สมัคร</th>
                                    <th>ตั้งค่า</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php ($i = 1); ?>
                                <?php $__currentLoopData = $user_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($row->member_name); ?></td>
                                        <td><?php echo e($row->username); ?></td>
                                        <td><?php echo e($row->email); ?></td>
                                        <td><?php echo e(Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i:s')); ?></td>
                                        <td>
                                        
                                                <a href="<?php echo e(route('admin.user_data_booking', ['id' => $row->id])); ?>" class="btn btn-primary" >
                                                    <i class="fa fa-edit"></i></a>
                         <a href="<?php echo e(route('admin.delete_user', 
                         ['id' => $row->id])); ?>" 
                         class="btn btn-danger" 
                         onclick="return confirm('ต้องการลบ ใช่หรือไม่?');">
                            <i class="fa fa-trash-o"></i></a>
                                            
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/user_data.blade.php ENDPATH**/ ?>