
<?php $__env->startSection('title', 'ข้อมูลคำสั่งซื้อ'); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/select2.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ข้อมูลคำสั่งซื้อ</h3>
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
                    <div class="card-body">
                        <div class="product-page-details">
                            <?php $__currentLoopData = $booking_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <h3>ชื่อแพ็คเกจ : <?php echo e($item->package_name); ?></h3>
                        </div>
                        <div class="product-price">
                            ผู้สั่งจอง : <?php echo e($item->member_name); ?>

                           
                        </div>
                        <hr>
                        <div>
                            <table class="product-page-width">
                                <tbody>
                                    <tr>
                                        <td> <b>จำนวนที่นั่ง &nbsp;&nbsp;&nbsp;:</b></td>
                                        <td><?php echo e($item->number_of_travel); ?> </td>
                                    </tr>
                                    <tr>
                                        <td> <b>วันที่เดินทาง &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-success">
                                            <?php echo e(Carbon\Carbon::parse($item->date_start)->format('d/m/Y H:i')); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td> <b>วันที่กลับ &nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;</b></td>
                                        <td class="txt-danger">
                                            <?php echo e(Carbon\Carbon::parse($item->date_end)->format('d/m/Y H:i')); ?> </td>
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
                                    <tr>
                                        <td> <b>อีเมล &nbsp;&nbsp;&nbsp;: &nbsp;</b></td>
                                        <td><?php echo e($item->member_email); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <p>รายละเอียดเพิ่มเติม : <?php echo e($item->member_detail); ?></p>
                        <p>ช่องทางติดต่อกลับ : <?php echo e($item->member_contact); ?></p>
                        <hr>
                        <span class="h5 txt-primary">สถานะ : </span>
                        <?php if($item->booking_status == '0'): ?>
                        <h5>
                        <span class="badge bg-warning txt-dark">รอเสนอราคา</span></h5>
                        <?php elseif($item->booking_status == '1'): ?>
                        <h5><span class="badge bg-info">
                            ส่งใบเสนอราคาแล้ว
                        </span></h5>
                        <?php elseif($item->booking_status == '2'): ?>
                        <h5><span class="badge bg-danger f-w-100">
                            ยกเลิกการสั่งจอง
                        </span></h5>
                        <?php elseif($item->booking_status == '3'): ?>
                        <h5><span class="badge bg-danger">
                            ยกเลิกใบเสนอราคา
                        </span></h5>
                        <?php elseif($item->booking_status == '4'): ?>
                        <h5><span class="f-w-300 badge bg-secondary">
                            แจ้งชำระเงินแล้ว รอตรวจสอบ
                        </span></h5>
                        <?php elseif($item->booking_status == '5'): ?>
                        <h5><span class="badge bg-success f-w-100">
                            ตรวจสอบการชำระเงินเรียบร้อยแล้ว
                        </span></h5>
                        <?php endif; ?>

                    </div>

                </div>
                <?php if($item->booking_status == '0'): ?>
                <?php
                  $price_pack = $item->package_price;
                  $number_people = $item->number_of_travel;
                  $sum_price = $price_pack*$number_people;  
                ?>
                    <div class="card">
                        <div class="card-header b-t-secondary">
                            <h5>ส่งใบเสนอราคา </h5>
                        </div>
                        <div class="card-body">
                            <form class="needs-validation" action="<?php echo e(route('admin.quotation', ['id' => request()->id])); ?>"
                                method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="booking_id" value="<?php echo e(request()->id); ?>">
                                <input type="hidden" name="package_id" value="<?php echo e($item->package_id); ?>">
                                <input type="hidden" name="email" value="<?php echo e($item->member_email); ?>">

                                <div class="mb-3 row">
                                    <label class="col-sm-3 col-form-label pt-0">แพ็คเกจที่สั่งจอง</label>
                                    <div class="col-sm-9">
                                        <div class="form-control-static">
                                            <?php echo e($item->code_tour); ?> |
                                            <?php echo e($item->package_name); ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">ราคารวม
                                        </label>
                                        <input class="form-control" name="total_price" type="number"
                                            placeholder="ใส่เฉพาะตัวเลข ไม่ต้องใส่เครื่องหมายคั่นหลัก" value="<?php echo e($sum_price); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">อัพโหลดเอกสารโปรแกรมทัวร์
                                            <span class="txt-info">(เฉพาะไฟล์ pdf)</span>
                                        </label>
                                        <input class="form-control" name="package_file" type="file"
                                            accept="application/pdf">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-mb-6">
                                        <label class="form-label txt-secondary">ราคามัดจำ
                                        </label>
                                        <input type="number" class="form-control" name="price_deposit"
                                            placeholder="ใส่เฉพาะตัวเลข ไม่ต้องใส่เครื่องหมายคั่นหลัก" required>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-mb-6">
                                        <label class="form-label">รายละเอียดเพิ่มเติม
                                        </label>
                                        <textarea class="form-control" name="quotation_detail" rows="3" required></textarea>
                                    </div>
                                </div>
                                <hr>
                                <div class="m-t-15">
                                    <button class="btn btn-secondary m-r-10" type="submit" title="">
                                        <i class="fa fa-exchange me-1"></i>ส่งใบเสนอราคา
                                    </button>
                            </form>
                        </div>
                    </div>
            </div>
        <?php elseif($item->booking_status == '1'): ?>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <span class="alert alert-secondary">ส่งใบเสนอราคาแล้ว</span>
                    </div>
                </div>
            </div>
        <?php elseif($item->booking_status == '4'): ?>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                    <a href="<?php echo e(route('admin.payment_chk', ['id' => request()->id])); ?>" class="btn btn-primary">ตรวจสอบการชำระเงิน</a>
                    </div>
                </div>
            </div>
        </div>
            <?php endif; ?>
        </div>
    </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/select2/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/select2/select2-custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/booking_cf.blade.php ENDPATH**/ ?>