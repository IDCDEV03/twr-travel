

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/date-picker.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/owlcarousel.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/prism.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/whether-icon.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>หน้าหลักผู้ดูแลระบบ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <?php if(count($userbooking) >= 1): ?>
        <div class="alert alert-danger dark" role="alert"><strong> <i data-feather="bell"></i> คุณมีคำสั่งซื้อแพ็คเกจที่รอการตรวจสอบ </strong>
           
           <a href="<?php echo e(route('booking_chk')); ?>" class="btn btn-pill btn-outline-warning-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบคำสั่งซื้อ</a> 
        </div>
        <?php else: ?>
        <div class="alert alert-danger dark" role="alert"><strong>ไม่มีคำสั่งจองแพ็คเกจใหม่</strong></div>
        <?php endif; ?>

        <?php if(count($user_payment_tour) >= 1): ?>
        <div class="alert alert-info dark" role="alert"><strong> <i data-feather="bell"></i> มีการแจ้งโอนยอดชำระแพ็คเกจทัวร์ รอการตรวจสอบ</strong>
            <a href="<?php echo e(route('booking_chk')); ?>" class="btn btn-pill btn-outline-light-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบยอดโอนชำระ</a> 
        </div>
        <?php else: ?>
        <?php endif; ?>

        <?php if(count($user_car_rental) >= 1): ?>
        <div class="alert alert-secondary dark" role="alert"><strong> <i data-feather="bell"></i> คุณมีการสั่งจองบริการเช่ารถที่รอการตรวจสอบ </strong>
           
            <a href="<?php echo e(route('admin.car_rental_data')); ?>" class="btn btn-pill btn-outline-warning-2x"><i data-feather="chevrons-right"></i> คลิกเพื่อตรวจสอบ</a> 
         </div>
        <?php endif; ?>

    

    </div>
        <script type="text/javascript">
            var session_layout = '<?php echo e(session()->get('layout')); ?>';
        </script>
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('script'); ?>

        <script src="<?php echo e(asset('assets/js/dashboard/default.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/notify/index.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/prism/prism.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/clipboard/clipboard.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/custom-card/custom-card.js')); ?>"></script>

        <script src="<?php echo e(asset('assets/js/owlcarousel/owl.carousel.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/general-widget.js')); ?>"></script>
        <script src="<?php echo e(asset('assets/js/height-equal.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/index.blade.php ENDPATH**/ ?>