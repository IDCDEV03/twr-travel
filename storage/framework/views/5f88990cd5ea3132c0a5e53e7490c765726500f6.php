

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แก้ไขข้อมูลส่วนตัว</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <b><?php echo e(session('success')); ?></b>
                    </div>
                <?php endif; ?>

<?php $__currentLoopData = $user_profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                <form class="form theme-form" method="POST" action="<?php echo e(route('user_profile_update', ['id' => Auth::user()->id])); ?>">
                   <?php echo csrf_field(); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                              <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">ชื่อ-นามสกุล</label>
                                <input class="form-control" type="text" name="member_name" value="<?php echo e($item->member_name); ?>">
                              </div>
                            </div>
                          </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlInput1">Username</label>
                            <input class="form-control" type="text" name="username" value="<?php echo e($item->username); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleInputPassword2">Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo e($item->email); ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="exampleFormControlSelect9">เบอร์โทรศัพท์</label>
                            <input class="form-control" type="text" name="user_phone" value="<?php echo e($item->user_phone); ?>">
                          </div>
                        </div>
                      </div>

                      
                    </div>
                    <div class="card-footer text-end">
                      <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                      <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                  </form>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
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
    <script src="<?php echo e(asset('assets/js/notify/bootstrap-notify.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/user_profile_update.blade.php ENDPATH**/ ?>