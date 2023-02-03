
<?php $__env->startSection('title', 'ข้อมูลแพ็คเกจ'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลแพ็คเกจ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php $__currentLoopData = $package_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      

                <div class="card">                    
                    <div class="card-body">
                        <div class="m-t-15">
                            <a class="btn btn-secondary m-r-10" type="button" 
                            href="<?php echo e(url('/admin/edit_pk/'.$item->id)); ?>"> <i class="fa fa-pencil-square-o"></i> แก้ไขข้อมูล</a>

                            <a href="<?php echo e(url('/admin/edit_pk_img/'.$item->package_id)); ?>" class="btn btn-primary m-r-10" type="button" > <i class="fa fa-picture-o"></i> แก้ไขภาพ</a>
                        </div>
                        <hr>
                   

                        <div class="product-page-details">
                            
                                <h3><strong>ชื่อแพ็คเกจ : <?php echo e($item->package_name); ?></strong></h3>
                                 
                        </div>
                        <div class="product-price">
                            <?php
                            $pk_type1 = 'ทัวร์ในประเทศ';
                            $pk_type2 = 'ทัวร์ต่างประเทศ'; 
                            ?>
                            ประเภท :  <?php if($item->package_type == 1): ?>
                            <?php echo e($pk_type1); ?>     
                            <?php elseif($item->package_type == 2): ?>
                            <?php echo e($pk_type2); ?>

                            <?php endif; ?>
                        </div>
                        <p class="h6 txt-secondary"><strong>รหัสทัวร์ : <?php echo e($item->code_tour); ?></strong></p>
                        <hr>
                        <p class="h6 txt-primary">
                            <strong>สถานะ : </strong>
                            <?php
                            $pk_status1 = 'เปิดรับจอง';
                            $pk_status2 = 'ปิดรับจอง'; 
                            ?>
                            <?php if($item->package_status == 1): ?>
                            <span class="badge bg-success"> <?php echo e($pk_status1); ?> 
                        </span>                       
                            <?php elseif($item->package_status == 2): ?>
                            <span class="badge bg-danger">
                            <?php echo e($pk_status2); ?>

                            </span>                           
                            <?php endif; ?>                        
                        </p>
                        <hr>
                        <p><strong>ภาพปก :</strong> 
                            <img src="<?php echo e(asset( $item->package_cover)); ?>" width="150px">
                        </p>
                        <hr>
                        <div>
                            <table class="product-page-width">
                                <tbody>
                                    <tr>
                                        <td> <b>สถานที่ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->package_place); ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>พาหนะ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->package_veh); ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>จำนวนที่ลูกค้าขั้นต่ำ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->package_min_customer); ?> คน </td>
                                    </tr>
                                    <tr>
                                        <td> <b>ราคา (ต่อคน) &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td>
                                            <?php
                                            $price = number_format($item->package_price);    
                                            ?>    
                                            <?php echo e($price); ?> บาท
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>การวางมัดจำ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td><?php echo e($item->package_deposit); ?> % ของราคารวม</td>
                                    </tr>
                                    <tr>
                                        <td> <b>ระยะเวลา &nbsp;&nbsp;&nbsp;:
                                            </b></td>
                                        <td>
                                            <?php echo e($item->package_total_day); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>วันที่เปิดจอง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-success">
                                            <?php echo e(Carbon\Carbon::parse($item->package_period_start)->format('d/m/Y')); ?>

                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td> <b>วันที่ปิดจอง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-danger">
                                            <?php echo e(Carbon\Carbon::parse($item->package_period_end)->format('d/m/Y')); ?> </td>
                                    </tr>
                                 
                                  
                                </tbody>
                            </table>
                        </div>
                        <hr>
                       <p><i class="fa fa-caret-right"></i> <strong>ไฟล์เอกสารแพ็คเกจทัวร์ :</strong> <a href="<?php echo e(asset( $item->package_file)); ?>">คลิก</a></p>
                        <hr>
                        <p class="alert alert-info txt-light h6"><strong>ไฮไลท์ทัวร์ :  <?php echo e($item->highlight_tour); ?></strong></p>
                        <hr>
                        <p class="h6 txt-info">รายละเอียดและเงื่อนไข : <?php echo $item->package_detail; ?></p>
                     </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/package_detail.blade.php ENDPATH**/ ?>