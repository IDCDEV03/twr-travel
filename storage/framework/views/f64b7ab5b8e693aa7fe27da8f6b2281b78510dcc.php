<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>หน้าหลักสมาชิก</h3>
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

                <div class="list-group">
                    <a class="list-group-item list-group-item-action flex-column align-items-start "
                        href="<?php echo e(route('user.all_packages')); ?>">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">รายการแพ็คเกจทัวร์</h5>
                        </div>                      
                    </a>

                    <a href="<?php echo e(route('user.car-rental')); ?>" class="list-group-item list-group-item-action flex-column "
                    href="javascript:void(0)">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">บริการเช่ารถ</h5>
                    </div>
                </a>
              
                    <a href="<?php echo e(route('booking_status')); ?>" class="list-group-item list-group-item-action flex-column align-items-start"
                        href="javascript:void(0)">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">ตรวจสอบสถานะการจอง</h5>
                        </div>
                    </a>
                    <a href="<?php echo e(route('user_profile')); ?>" class="list-group-item list-group-item-action flex-column align-items-start"
                    href="javascript:void(0)">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">แก้ไขข้อมูลส่วนตัว</h5>
                    </div>
                </a>
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

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/home.blade.php ENDPATH**/ ?>