
<?php $__env->startSection('title', 'ข้อมูลแพ็คเกจ'); ?>

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลการจองแพ็คเกจ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <?php $__currentLoopData = $booking_detail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      

                <div class="card">                    
                    <div class="card-body">
                                           

                        <div class="product-page-details">
                            
                                <h3>ชื่อแพ็คเกจ : <?php echo e($item->package_name); ?></h3>
                                 
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

<hr>
<p class="h6 txt-primary">
สถานะ : 
<?php if($item->booking_status == 0): ?>
<span class="badge bg-secondary f-w-100"> 
รอเจ้าหน้าที่ตรวจสอบรายละเอียด
</span>                       
<?php elseif($item->booking_status == 1): ?>
<span class="badge bg-info">
ส่งใบเสนอราคาแล้ว
</span>       
<span class="txt-secondary">
    <a href="<?php echo e(url('/user/quotation/'.$item->booking_id)); ?>" class="txt-secondary"> คลิกที่นี่ </a>เพื่อตรวจสอบใบเสนอราคา</span>   
    <?php elseif($item->booking_status == '4'): ?>
    <span class="badge bg-secondary">
        แจ้งชำระเงินแล้ว รอตรวจสอบ
    </span> 
    <?php elseif($item->booking_status == '5'): ?>
    <span class="badge bg-success f-w-100">
    ตรวจสอบการชำระเงินเรียบร้อย
    </span>    
    <a href="<?php echo e(url('/user/quotation/'.$item->booking_id)); ?>" class="txt-secondary"> คลิกที่นี่ </a>เพื่อตรวจสอบใบจองแพ็คเกจ</span>
    <?php elseif($item->booking_status == '2'): ?>
    <span class="badge bg-danger f-w-100">
        ยกเลิกการจอง
        </span>     
<?php endif; ?> 
</p>
<hr>
<p class="h6 txt-danger">รหัสการสั่งจอง : <?php echo e($item->booking_id); ?></p>
                        <hr>
                        <div>
                            <table class="product-page-width">
                                <tbody>
                                    <tr>
                                        <td> <b>สถานที่ &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->package_place); ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>จำนวนลูกค้า &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->number_of_travel); ?> คน </td>
                                    </tr>
                              
                                  
                                    <tr>
                                        <td> <b>วันที่เดินทางไป-กลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-success">
                                            <?php echo e(Carbon\Carbon::parse($item->date_start)->format('d/m/Y')); ?> - <?php echo e(Carbon\Carbon::parse($item->date_end)->format('d/m/Y')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>รวมระยะเวลา &nbsp;&nbsp;&nbsp;:
                                            </b></td>
                                        <td>
                                            <?php
                                            $fdate = $item->date_start;
                                            $tdate = $item->date_end;
                                            $datetime1 = new DateTime($fdate);
                                            $datetime2 = new DateTime($tdate);
                                            $interval = $datetime1->diff($datetime2);
                                            $days = $interval->format('%a');
                                            print_r($days);
                                        ?>
                                        วัน
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <?php if($item->booking_status == '0' OR $item->booking_status == '1'): ?>
                        <a href="<?php echo e(route('cancel_booking', ['id' => request()->id])); ?>" class="btn btn-danger btn-sm" type="button" 
                        onclick="return confirm('ต้องการยกเลิกการจองใช่หรือไม่?')">ยกเลิกการสั่งจอง</a>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/booking_detail.blade.php ENDPATH**/ ?>