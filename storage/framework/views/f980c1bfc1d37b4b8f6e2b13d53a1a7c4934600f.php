<?php $__env->startSection('title', 'ข้อมูลธนาคาร'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/banks.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลธนาคาร</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php if(session('success')): ?>
                <div class="alert alert-success" role="alert">
                    <b><?php echo e(session('success')); ?></b>
                </div>
                <?php endif; ?>

                <div class="card">                              

                        <div class="card-header">  
                            <button class="btn btn-secondary" type="button" data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal">เพิ่มบัญชีธนาคาร</button>
                        </div> 

                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table align-middle table-bordered display" >
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>Logo</th>
                                            <th>ชื่อธนาคาร</th>
                                            <th>ชื่อบัญชี</th>
                                            <th>เลขที่บัญชี</th>
                                            <th>สาขา</th>
                                            <th>ตั้งค่า</th>
                                        </tr>
                                    </thead>
                                    <tbody>   
                                    <?php $__currentLoopData = $data_bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>   
                                    <?php
                                        $bank_name = $row->bank_name;
                                    ?>                          
                                            <tr>
                                            <td>
                                            <?php if($bank_name == 'ธนาคารกรุงไทย'): ?>
                                            <i class="bank bank-ktb huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารกสิกรไทย'): ?>
                                            <i class="bank bank-kbank huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารกรุงเทพ'): ?>
                                            <i class="bank bank-bbl huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารทีเอ็มบีธนชาต'): ?>
                                            <i class="bank bank-ttb huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารไทยพาณิชย์'): ?>
                                            <i class="bank bank-scb huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารกรุงศรีอยุธยา'): ?>
                                            <i class="bank bank-bay huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารยูโอบี'): ?>
                                            <i class="bank bank-uob huge"></i>
                                            <?php elseif($bank_name == 'ธนาคารออมสิน'): ?>
                                            <i class="bank bank-gsb huge"></i>
                                            <?php endif; ?>
                                              
                                            </td>
                                                <td><?php echo e($row->bank_name); ?></td>
                                                <td><?php echo e($row->bank_account_name); ?></td>
                                                <td><?php echo e($row->account_number); ?></td>
                                                <td><?php echo e($row->bank_branch); ?></td>
                                                <td>
                                                
                                                    <a class="btn btn-info" href="<?php echo e(route('admin.data_update_bank', ['id' => $row->id])); ?>"><i class="fa fa-edit"></i> แก้ไข</a>
      
                                                        <a href="<?php echo e(route('admin.delete_bank', ['id' => $row->id])); ?>" class="btn btn-danger" onclick="return confirm('ต้องการลบ ใช่หรือไม่?');"><i class="fa fa-trash-o"></i> ลบ</a>
                                                    
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

<!---modal----->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มบัญชีธนาคาร</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">.
            <form action="<?php echo e(route('admin.insert_bank')); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label" >ชื่อธนาคาร</label>
                        <select name="bank_name" class="form-control" >
                          <option selected disabled value="">เลือก..</option>
                          <option value="ธนาคารกรุงเทพ">
                          ธนาคารกรุงเทพ</option>
                          <option value="ธนาคารกสิกรไทย">ธนาคารกสิกรไทย</option>
                          <option value="ธนาคารกรุงไทย">ธนาคารกรุงไทย</option>
                          <option value="ธนาคารไทยพาณิชย์">ธนาคารไทยพาณิชย์</option>
                          <option value="ธนาคารออมสิน">ธนาคารออมสิน</option>
                          <option value="ธนาคารทีเอ็มบีธนชาต">ธนาคารทีเอ็มบีธนชาต</option>   
                          <option value="ธนาคารกรุงศรีอยุธยา">ธนาคารกรุงศรีอยุธยา</option>   
                          <option value="ธนาคารยูโอบี">ธนาคารยูโอบี</option>     
                          
                        </select>                         
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">ชื่อบัญชี</label>
                        <input class="form-control" type="text" name="bank_account_name">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">เลขที่บัญชี</label>
                        <input class="form-control" type="text" name="account_number">
                      </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                      <div class="mb-3">
                        <label class="form-label">สาขา</label>
                        <input class="form-control" type="text" name="bank_branch">
                      </div>
                    </div>
                </div>            
             </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit">บันทึกข้อมูล</button>
          <button class="btn btn-primary" type="button" data-bs-dismiss="modal">ปิด</button>
        </div>
        </form>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?> 
<script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/bank.blade.php ENDPATH**/ ?>