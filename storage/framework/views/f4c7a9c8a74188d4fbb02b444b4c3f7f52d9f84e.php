
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>
 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แก้ไขข้อมูลธนาคาร</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

                <div class="card">                       
             <?php $__currentLoopData = $data_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card-body"> 
                        <form action="<?php echo e(route('admin.update_bank', ['id' => request()->id])); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label" >ชื่อธนาคาร</label>
                                    <input class="form-control" type="text" name="bank_name" value="<?php echo e($row->bank_name); ?>">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">ชื่อบัญชี</label>
                                    <input class="form-control" type="text" name="bank_account_name" value="<?php echo e($row->bank_account_name); ?>">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">เลขที่บัญชี</label>
                                    <input class="form-control" type="text" name="account_nummber" value="<?php echo e($row->account_number); ?>">
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                  <div class="mb-3">
                                    <label class="form-label">สาขา</label>
                                    <input class="form-control" type="text" name="bank_branch" value="<?php echo e($row->bank_branch); ?>">
                                  </div>
                                </div>
                            </div>            
                         </div>
                    <div class="modal-footer">
                      <button class="btn btn-secondary" type="submit">บันทึกข้อมูล</button>                  
                    </div>
                    </form>
  
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/bank_edit.blade.php ENDPATH**/ ?>