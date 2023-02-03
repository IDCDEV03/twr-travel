

<?php $__env->startSection('title', 'Default'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>บริการเช่ารถ</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">

        <div class="card">
            <div class="card-header"><a href="<?php echo e(route('user.car-rental')); ?>" class="btn btn-lg btn-primary">เช่ารถ</a></div>
            <div class="card-body">

                <?php if(session('success')): ?>
                    <div class="alert alert-success" role="alert">
                        <b><?php echo e(session('success')); ?></b>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รถที่เช่า</th>
                            <th scope="col">จำนวนผู้โดยสาร</th>
                            <th scope="col">วันที่เช่า</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>รายละเอียด</td>
                        </tr>                        
                        </tbody>
                    </table>
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

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/car_rent_list.blade.php ENDPATH**/ ?>