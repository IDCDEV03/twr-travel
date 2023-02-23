
<?php $__env->startSection('title', 'รายการใบสั่งจอง'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>รายการใบสั่งจอง (ดำเนินการเรียบร้อย)</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             
                    <div class="card-body"> 
                        
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>รหัสทัวร์</th>
                                        <th>ชื่อแพ็คเกจ</th>
                                        <th>ผู้สั่งจอง</th>
                                        <th>วันที่ดำเนินการ</th>
                                        <th>สถานะ</th>
                                       
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                         $i = '1';   
                                        ?>
                                        <?php $__currentLoopData = $list_invoice; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        
                                        <td><?php echo e($i++); ?></td>      
                                        <td><?php echo e($row->code_tour); ?></td>    
                                        <td><?php echo e($row->package_name); ?></td>               
                                        <td><?php echo e($row->member_name); ?></td>
                                        <td><?php echo e(Carbon\Carbon::parse($row->updated_at)->format('d/m/Y')); ?></td>
                                        <td class="txt-success">ดำเนินการเรียบร้อย</td>
                                        <td><a href="<?php echo e(route('admin.invoice', ['id' => $row->booking_id])); ?>" class="btn btn-info">ใบสั่งจอง</a></td>
                                    
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/list_invoice.blade.php ENDPATH**/ ?>