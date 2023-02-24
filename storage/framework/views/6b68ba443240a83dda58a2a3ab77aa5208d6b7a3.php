
<?php $__env->startSection('title', 'Invoice'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/fonts/Prompt/Prompt-Bold.ttf')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<style>
    @media print
{
#non-printable { display: none; }
#printable { display: block; }
}
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ใบจองแพ็คเกจ</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-items'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                
                <div class="card">
                    <div class="card-body">
                        <?php $__currentLoopData = $user_quotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="invoice">
<div id="printable">
    <div>
        <div class="row">
            <div class="col-sm-6">
                <div class="media">
                    <div class="media-left"><img class="media-object img-80"
                            src="<?php echo e(asset('assets/images/logo.png')); ?>"
                            alt=""></div>
                    <div class="media-body m-l-20 text-right">
                        <h4 class="media-heading">ธัญวรัตม์ ทราเวล</h4>
                        <p>thanwarattravel@gmail.com<br>
                            <span><i class="fa fa-phone-square"></i>
                                0818718548 , 0812616178 , 042-116-338</span>
                            <br>
                            <i class="fa fa-briefcase"></i> ที่อยู่ : 444/11 ม.6 หมู่บ้านการเด้นโฮม2 ถ.รอบเมือง ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000
                        </p>
                    </div>
                </div>
                <!-- End Info-->
            </div>
            <div class="col-sm-6">
                <div class="text-md-end text-xs-center">
                    <h3>ใบจองแพ็คเกจ </h3>
                    <p>เลขที่: <span>
                            <?php echo e($item->quotation_id); ?>

                        </span>
                        <br>
                        วันที่: <span>
                            <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y')); ?>


                        </span><br> ใช้ได้ถึง:
                        <span>
                            <?php
$end = Carbon::parse($item->created_at)->addDays(15)->format('d/m/Y');
echo $end;
?>

                        </span>
                    </p>
                </div>
                <!-- End Title-->
            </div>
        </div>
    </div>
    <hr>
<!-- End InvoiceTop-->
<div class="row">
<div class="col-md-4">
    <div class="media">
        <div class="media-body m-l-20">
            <p>ลูกค้า</p>
            <h4 class="media-heading"><?php echo e(auth()->user()->member_name); ?></h4>
            <p>
                <?php echo e($item->member_email); ?> 
                <br><span><?php echo e($item->user_phone); ?></span></p>
        </div>
    </div>
</div>
</div>
<hr>
<!-- End Invoice Mid-->
<div>
<div class="table-responsive invoice-table" id="table">
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td><h6>รหัส</h6></td>
                <td class="item">
                    <h6 class="p-2 mb-0">คำอธิบาย</h6>
                </td>
                <td class="Rate">
                    <h6 class="p-2 mb-0">ราคา (บาท)</h6>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="m-0"><?php echo e($item->code_tour); ?></p>
                </td>
                <td>
                    <label><?php echo e($item->package_name); ?>

                        <br>
                        จำนวนที่นั่ง : <?php echo e($item->number_of_travel); ?>

                        <br>
                        วันที่เดินทางไป-กลับ :
                        <?php echo e(Carbon\Carbon::parse($item->date_start)->format('d/m/Y')); ?>

                        -
                        <?php echo e(Carbon\Carbon::parse($item->date_end)->format('d/m/Y')); ?>

                    </label>
                </td>

                <td>
                    <p class="itemtext">
                        <?php
                            $total_price = number_format($item->total_price);
                            echo $total_price;
                        ?></p>
                </td>
            </tr>
            <tr >
                <td class="txt-secondary">
                    <p class="m-0">งวดที่ 1</p>
                </td>
                <td class="txt-secondary">
                    <label>มัดจำ50%</label>
                </td>

                <td class="txt-secondary"> 
                    <p class="itemtext">
                        <?php
                            $deposit_price = number_format($item->price_deposit);
                            echo $deposit_price;
                        ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="m-0">งวดที่ 2</p>
                </td>
                <td>
                    <label>ชำระส่วนที่เหลือ (ก่อนวันเดินทาง 3 วัน)</label>
                </td>
                <td>
                    <p class="itemtext">
                        <?php
                            $result = $item->total_price - $item->price_deposit;
                            echo number_format($result);
                        ?></p>
                </td>
            </tr>
            <tr>
                <td></td>

                <td align="right">
                    <h6 class="mb-0 p-2">จำนวนชำระค่ามัดจำงวดที่ 1 รวมทั้งสิ้น </h6>
                </td>
                <td class="payment">
                    <h6 class="mb-0 p-2">
                        <?php
                        $deposit_price = number_format($item->price_deposit);
                            echo
                        $deposit_price;
                        ?>
                        บาท</h6>
                </td>
            </tr>
        </tbody>
    </table>
</div>
                                        <!-- End Table-->
            <div class="row">
                <div class="col-md-8">
                    <div>
                        <p class="legal"><strong>การชำระเงิน</strong>
                        <ul>
                            <li>โอนชำระผ่านบัญชี</li>
                            <li>##
                                <p>
                                ###
                            <br>
                            
                                </p>
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($item->quotation_status == '2'): ?>
                   <span class="txt-success">หมายเหตุ : ชำระมัดจำงวดที่ 1 แล้ว </span>
                    <?php endif; ?>
                </div>
            </div>
                                    </div>
                                    <!-- End InvoiceBot-->
                                </div>
                                <div id="non-printable">
                                    <div class="col-sm-12 text-center mt-3">
                                    <?php if($item->quotation_status == '0'): ?>
                                    <a href="<?php echo e(url('/user/payment/'.$item->quotation_id)); ?>" class="btn btn-secondary">แจ้งชำระเงิน</a>
                                    <?php endif; ?>
                                    <a href="<?php echo e(url('/user/invoice/'.$item->booking_id)); ?>" class="btn btn btn-primary me-2" type="button"
                                    >พิมพ์</a>
                                </div>
                                </div>
                                <!-- End Invoice-->
                                <!-- End Invoice Holder-->
                                <!-- Container-fluid Ends-->
                            </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/counter/jquery.waypoints.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/counter/jquery.counterup.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/counter/counter-custom.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/print.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userpages/booking_quotation.blade.php ENDPATH**/ ?>