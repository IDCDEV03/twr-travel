
<?php $__env->startSection('title', 'ตรวจสอบการแจ้งชำระเงิน'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>ตรวจสอบการแจ้งชำระเงิน (แพ็คเกจทัวร์)</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">

             
                    <div class="col-sm-12 col-xl-12">
                        <div class="card shadow-none border">
                            <div class="card-body">
                               <a href="<?php echo e(route('booking_cf', ['id' => request()->id])); ?>">รายละเอียดการจอง</a> | <a href="<?php echo e(route('admin.invoice', ['id'=>request()->id])); ?>">เอกสารใบจอง</a>
                               <hr>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="table-info">
                                        <tr>
                                            <th style="width: 5%">#</th>
                                <th style="width: 15%">ธนาคารที่โอนเข้า</th>
                                            <th style="width: 10%">จำนวนเงิน</th>                           
                                            <th style="width: 15%">วัน/เวลาแจ้งโอน</th>
                                            <th style="width: 15%">งวดที่</th>
                                            <th style="width: 20%">สลิป</th>
                                            <th style="width: 20%">ยืนยันยอด</th>
                                       
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                             $i = '1';
                                            ?>
                                            <?php $__currentLoopData = $user_payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <th scope="row"><?php echo e($i++); ?></th>
                                                <td><?php echo e($item->payment_bank); ?></td>
                                                <td><?php echo e(number_format($item->payment_price)); ?>

                                                </td>
                                                   
                                                <td> <?php echo e(Carbon\Carbon::parse($item->created_at)->format('d/m/Y H:i')); ?></td>

                                                <td>
                                                    <?php if($item->pay_num == 'pay1'): ?>
                                                        มัดจำงวดที่ 1
                                                    <?php elseif($item->pay_num == 'pay2'): ?>
                                                        ยอดชำระงวดที่ 2
                                                    <?php endif; ?>
                                                        </td>   
                                                <td> <a href="#" class="pop"><img src="<?php echo e(asset($item->payment_slip)); ?>" class="img-fluid" width="200px">
                                                    คลิกที่ภาพเพื่อขยาย</a>
                                                </td>
                                                <td>
                       <?php if($item->booking_status == '4' AND $item->pay_num == 'pay1'): ?>
                       <a href="<?php echo e(route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay1'])); ?>" class="btn btn-primary" type="button" onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันยอดชำระ</a>
                    <?php elseif($item->booking_status == '6' AND $item->pay_num == 'pay2'): ?>
                    <a href="<?php echo e(route('admin.update_payment', ['id'=>$item->booking_id, 'pay_num'=>'pay2'])); ?>" class="btn  btn-primary" type="button"
                    onclick="alert('ต้องการยืนยันยอดชำระใช่หรือไม่')">ยืนยันยอดชำระ
                    </a>
                    <?php elseif($item->booking_status == '5'): ?>
                     <span class="txt-success">ชำระแล้ว</span>
                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                               
                            </div>
                        </div>
                    </div>
               

            </div>
        </div>
    </div>
<!-----modal------>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header">
            <h5 class="modal-title">สลิปโอนเงิน</h5>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>             
        <div class="modal-body">            
          <img src="" class="imagepreview" style="width: 100%;" >
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
    $(function() {
		$('.pop').on('click', function() {
			$('.imagepreview').attr('src', $(this).find('img').attr('src'));
			$('#imagemodal').modal('show');   
		});		
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/payment_chk.blade.php ENDPATH**/ ?>