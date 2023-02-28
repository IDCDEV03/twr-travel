<?php $__env->startSection('title', 'Sample Page'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/datatables.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลแพ็คเกจทัวร์</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <a href="<?php echo e(route('add_package')); ?>" class="btn btn-primary" type="button">
                            <i class="fa fa-plus-square"></i> เพิ่มแพ็คเกจใหม่</a>
                    </div>

                    <?php if(session('success')): ?>
                        <div class="alert alert-info" role="alert">
                            <b><?php echo e(session('success')); ?></b>
                        </div>
                        <?php elseif(session('update')): ?>
                        <div class="alert alert-secondary" role="alert">
                            <b><?php echo e(session('update')); ?></b>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="display" id="basic-1">
                                <thead>
                                    <tr>
                                        <th>ที่</th>
                                        <th>รหัสทัวร์</th>
                                        <th>ชื่อแพ็คเกจ</th>
                                        <th>ประเภท</th>
                                        <th>ราคา</th>
                                        <th>วันที่สร้าง</th>
                                        <th>สถานะ</th>
                                        <th>ตั้งค่า</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    $pk_type1 = 'ทัวร์ในประเทศ';
                                    $pk_type2 = 'ทัวร์ต่างประเทศ'; 
                                    ?>
                                    <?php $__currentLoopData = $package_tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($row->code_tour); ?></td>
                                            <td><?php echo e($row->package_name); ?></td>
                                            <td>
                                                <?php if($row->package_type == 1): ?>
                                                <?php echo e($pk_type1); ?>     
                                                <?php elseif($row->package_type == 2): ?>
                                                <?php echo e($pk_type2); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td>
                                            <?php
                                            $price = number_format($row->package_price);    
                                            ?>
                                             <?php echo e($price); ?>

                                            </td>
                                            <td><?php echo e(Carbon\Carbon::parse($row->created_at)->format('d/m/Y H:i')); ?></td>
                                            <td>
                                                <?php if($row->package_status == 1): ?>
                                                <span class="badge bg-success">เปิด</span>
                                                <?php elseif($row->package_status == 2): ?>
                                                <span class="badge bg-danger">ปิด</span>
                                                <?php endif; ?>
                                               </td>
                                            <td>
                                                <div class="btn-group" role="group">
                                                    <a href="<?php echo e(url('/admin/package_detail/'.$row->package_id)); ?>" class="btn btn-primary">
                                                        <i class="fa fa-edit"></i></a>
                           <a href="<?php echo e(route('admin.delete_package', 
                           ['id' => $row->package_id])); ?>" class="btn btn-danger" 
                           onclick="return confirm('ต้องการลบ ใช่หรือไม่?');">
                            <i class="fa fa-trash-o">
                                </i></a>
                                                </div>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/list_package.blade.php ENDPATH**/ ?>