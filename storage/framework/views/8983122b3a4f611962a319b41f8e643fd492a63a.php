<?php $__env->startSection('title', 'รายการทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>รายการทัวร์</h3>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="product-wrapper-grid">
            <div class="row">

                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4 text-center">
                                <a href="<?php echo e(route('private_package', ['id' => Auth::user()->id])); ?>"
                                    class="btn btn-lg btn-secondary" type="button">จัดกรุ๊ปทัวร์ส่วนตัว</a>
                            </div>
                            <div class="col-md-8">
                 <form action="" >
                        <div class="row">
            <div class="col-md-6 text-center">
                <input class="form-control" placeholder="ค้นหาทัวร์ (ชื่อเมือง หรือ ประเทศ)" name="search" type="search" value="<?php echo e($search); ?>">
            </div>
            <div class="col-md-6 text-center">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="<?php echo e(route('user.all_packages')); ?>" class="btn btn-info"
                type="button">Reset</a>
            </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

        <?php $__currentLoopData = $all_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--------------tab1---------------->
        
            <div class="col-xl-3 col-sm-6 xl-4">
                <div class="card">

                    <div class="product-box">
                        <div class="product-img">
                            <img class="img-fluid" src="<?php echo e(asset($row->package_cover)); ?>" alt="">
                            <div class="product-hover">
                                <ul>                                   
                                    <li>
                                        <button class="btn" type="button" data-bs-toggle="modal"
                                      data-bs-target="#Modal_<?php echo e($row->package_id); ?>"><i class="icon-eye"></i></button>
                                    </li>                                 
                                </ul>
                            </div>
                        </div>
                        <div class="modal fade" id="Modal_<?php echo e($row->package_id); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="Modal_<?php echo e($row->package_id); ?>" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="product-box row">
                                            <div class="product-img col-lg-6"><img class="img-fluid"
                                                    src="<?php echo e(asset($row->package_cover)); ?>" alt=""></div>
                                            <div class="product-details col-lg-6 text-start">
                                                <h4><?php echo e($row->package_name); ?></h4>
                                                <div class="product-price"><?php echo e(number_format($row->package_price)); ?>.-
                                                </div>
                                                <div class="product-view">
                                                    <h6 class="f-w-600">รายละเอียด</h6>
                                                
                                                     <p class="mb-0">
                                                        ไฮไลท์ทัวร์ : <?php echo e($row->highlight_tour); ?>    
                                                     </p>
                                                     <p class="mb-0">
                                                     ระยะเวลา :  <?php echo e($row->package_total_day); ?>    
                                                     </p>
                                            
                                                   <p class="mb-0">
                                                    ดาวน์โหลดรายละเอียดโปรแกรม : 
                                                    <a href="<?php echo e(asset($row->package_file)); ?>">คลิก</a>
                                                    </p>
                                                </div>
                                             <br>
                                                <div class="product-qnty">
                                                    <div class="addcart-btn">
                                                <a
                                                href="<?php echo e(route('book_package',['id'=>Auth::user()->id,'pkid'=>$row->package_id])); ?>" class="btn btn-primary" type="button">สั่งจองแพ็คเกจนี้</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="product-details">                         
                            <a href="#" data-bs-toggle="modal"
                            data-bs-target="#Modal_<?php echo e($row->package_id); ?>">
                            <h4>
                                <?php echo e($row->package_name); ?></h4>
                            </a>
                            <p><?php echo e($row->package_total_day); ?> / <?php echo e($row->package_place); ?></p>
                            <div class="product-price"><?php echo e(number_format($row->package_price)); ?>.-
                                
                            </div>
                        </div>

                    </div>
                </div>
            </div>        
        <!--------------tab1---------------->
  
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/all_packages.blade.php ENDPATH**/ ?>