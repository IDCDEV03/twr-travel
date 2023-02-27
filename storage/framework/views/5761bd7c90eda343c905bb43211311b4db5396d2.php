
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แก้ไขข้อมูล</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                <?php $__currentLoopData = $admin_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
                        <div class="card">
                            <div class="card-header">

                            </div>
<div class="card-body">
<div class="tabbed-card">
    <ul class="pull-right nav nav-pills nav-secondary" id="pills-clrtabsuccess"
        role="tablist">
        <li class="nav-item"><a class="nav-link active" id="pills-clrhome-tabsuccess"
                data-bs-toggle="pill" href="#pills-clrhomesuccess" role="tab"
                aria-controls="pills-clrhome" aria-selected="true"><i
                    class="icofont icofont-ui-settings"></i>ข้อมูลทั่วไป</a></li>
        <li class="nav-item"><a class="nav-link" id="pills-clrprofile-tabsuccess"
                data-bs-toggle="pill" href="#pills-clrprofilesuccess" role="tab"
                aria-controls="pills-clrprofile" aria-selected="false"><i
                    class="icofont icofont-ui-password"></i>เปลี่ยนรหัสผ่าน</a></li>

    </ul>
    <div class="tab-content" id="pills-clrtabContentsuccess">
        <div class="tab-pane fade show active" id="pills-clrhomesuccess" role="tabpanel"
            aria-labelledby="pills-clrhome-tabsuccess">
      
            <p>
            <form class="form theme-form" method="POST" action="<?php echo e(route('admin.data_update', ['id' => request()->id])); ?>">
                <?php echo csrf_field(); ?>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input class="form-control" type="text" name="username"
                                value="<?php echo e($item->username); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">ชื่อ-นามสกุล</label>
                            <input class="form-control" type="text" name="member_name"
                                value="<?php echo e($item->member_name); ?>">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">อีเมล</label>
                            <input class="form-control" type="text" name="email"
                                value="<?php echo e($item->email); ?>">
                        </div>
                    </div>
                </div>


                <div class="card-footer text-end">
                    <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>

                </p>
            </div>
            <div class="tab-pane fade" id="pills-clrprofilesuccess" role="tabpanel"
                aria-labelledby="pills-clrprofile-tabsuccess">
                <p>
                    <form class="form theme-form" method="POST" action="<?php echo e(route('admin.update_password')); ?>">
                        <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" >รหัสผ่านเก่า</label>
                                <input class="form-control" type="password" name="old_password" >
                                <?php $__errorArgs = ['old_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">รหัสผ่านใหม่</label>
                                <input class="form-control" type="password" name="new_password" >
                                <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="exampleFormControlInput1">ยืนยันรหัสผ่านใหม่</label>
                                <input class="form-control" type="password" name="new_password_confirmation" >
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-end">
                        <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        <input class="btn btn-light" type="reset" value="ยกเลิก">
                    </div>
                    </form>

                </p>
            </div>

        </div>
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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/setting_update.blade.php ENDPATH**/ ?>