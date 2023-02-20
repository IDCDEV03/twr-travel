

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
                    <table class="table table-bordered">
                        <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">รถที่เช่า</th>
                            <th scope="col">สถานที่</th>                           
                            <th scope="col">วันที่เช่า</th>
                            <th scope="col">สถานะ</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php $__currentLoopData = $car_rent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th scope="row">1</th>
                            <td><?php echo e($item->car_type); ?></td>
                            <td><?php echo e($item->start_place); ?>-<?php echo e($item->end_place); ?></td>         
                            <td>
                            <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?>

                            </td>
                            <td>

                                <?php if($item->rent_status == '0'): ?>
                                <span class="txt-secondary">รอตรวจสอบ</span>
                                <?php elseif($item->rent_status == '1'): ?>
                                <span class="txt-info">
                                    ส่งใบเสนอราคาแล้ว
                                </span>
                                <?php elseif($item->rent_status == '2'): ?>
                                <span class="txt-danger">
                                    แจ้งชำระเงินแล้ว<br> รอตรวจสอบ 
                                </span>
                                <?php elseif($item->rent_status == '3'): ?>
                                <span class="txt-secondary">
                                    ชำระเงินมัดจำงวดที่ 1 แล้ว
                                </span>
                                <?php elseif($item->rent_status == '4'): ?>
                                <span class="txt-danger">
                                    ยกเลิกการจอง
                                </span>
                                <?php elseif($item->rent_status == '5'): ?>
                                <span class="txt-secondary">
                                    แจ้งชำระเงินแล้ว<br> รอตรวจสอบ 
                                </span>
                                <?php endif; ?>

                            </td>
                            <td><a href="<?php echo e(route('user.rent_detail', ['id' => $item->rent_id])); ?>" >รายละเอียด</a> </td>
                        </tr>      
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
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