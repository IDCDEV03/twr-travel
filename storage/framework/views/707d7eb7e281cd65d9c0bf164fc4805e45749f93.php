
<?php $__env->startSection('title', 'แก้ไขแพ็คเกจทัวร์'); ?>

<?php $__env->startSection('css'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/css/vendors/summernote.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แก้ไขแพ็คเกจทัวร์</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php $__currentLoopData = $pk_tour; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">                      
                        <form class="needs-validation" action="<?php echo e(url('/admin/update_package/'.$item->id)); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>      
                            

                            <div class="row">
                                <div class="col">
                                    <div class="col-md-12 mb-2">
                                        <img id="preview-image-before-upload" src="<?php echo e(asset($item->package_cover)); ?>"
                                            alt="preview image" style="max-height: 150px;">
                                            <input type="hidden" name="old_cover" value="<?php echo e($item->package_cover); ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="package_cover"><strong>รูปภาพปก</strong>
                                        </label>
                                        <input type="file" class="form-control"  name="package_cover" id="img_cover"  accept="image/*" >
                                    </div>
                                   
                                </div>
                            </div>
<hr>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="package_name">ชื่อแพ็คเกจ</label>
                                        <input class="form-control" id="package_name" type="text" name="package_name" value="<?php echo e($item->package_name); ?>" required>
                                    </div>
                                 
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="package_location">สถานที่</label>
                                        <input class="form-control" type="text" name="package_location" value="<?php echo e($item->package_place); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="package_type">ประเภทแพ็คเกจ</label>
                                        <select class="form-select" name="package_type" required="">
                                            <option value="1">ทัวร์ในประเทศ</option>
                                            <option value="2">ทัวร์ต่างประเทศ</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                   

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">รหัสทัวร์</label>
                                    <input class="form-control" name="code_tour" type="text" value="<?php echo e($item->code_tour); ?>">
                                </div>

                                 <div class="col-md-6">
                                    <label class="form-label">ระยะเวลา</label>
                                    <input class="form-control" type="text" name="package_total_day" placeholder="เช่น 3 วัน 2 คืน" value="<?php echo e($item->package_total_day); ?>"
                                    >
                                </div>
                            </div>
<br>
<div class="row g-3"">
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label txt-primary" for="package_type">วันที่เปิดรับจอง</label>
           <input class="form-control digits" type="date"  name="package_period_start" value="<?php echo e($item->package_period_start); ?>">
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label txt-danger" for="package_type">วันที่ปิดรับจอง</label>
           <input class="form-control digits" type="date"  name="package_period_end" value="<?php echo e($item->package_period_end); ?>">
        </div>
    </div>
</div>
<br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label">ประเภทพาหนะ
                                            <span class="txt-info">หาก*ไม่แก้ไข*ไม่ต้องเลือก</span>
                                        </label>
                                        <input class="form-control" type="text" value="<?php echo e($item->package_veh); ?>" name="old_veh" readonly>
                                        <div class="m-t-15 m-checkbox-inline">
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                              <input class="form-check-input" id="inline-1" name="package_veh[]" type="checkbox" value="รถตู้"
                                             >
                                              <label class="form-check-label" for="inline-1">รถตู้</label>
                                            </div>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                              <input class="form-check-input" id="inline-2" name="package_veh[]" type="checkbox" value="รถบัส"
                                              >
                                              <label class="form-check-label" for="inline-2">รถบัส</label>
                                            </div>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                              <input class="form-check-input" id="inline-3" name="package_veh[]" type="checkbox" value="รถไฟ"
                                              >
                                              <label class="form-check-label" for="inline-3">รถไฟ</label>
                                            </div>
                                            <div class="form-check form-check-inline checkbox checkbox-dark mb-0">
                                                <input class="form-check-input" id="inline-4" name="package_veh[]" type="checkbox" value="เครื่องบิน" >
                                                <label class="form-check-label" for="inline-4">เครื่องบิน</label>
                                              </div>
                                          </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label">จำนวนลูกค้าขั้นต่ำ</label>
                                    <input class="form-control" name="package_min_cus" type="text" value="<?php echo e($item->package_min_customer); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">ราคา (ต่อคน)</label>
                                    <input class="form-control" name="package_price" type="text" value="<?php echo e($item->package_price); ?>">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label">อัพโหลดเอกสารโปรแกรมทัวร์
                                      <span class="txt-info">(เฉพาะไฟล์ pdf)</span>
                                    </label>
                                    <input class="form-control" name="package_file" type="file" accept="application/pdf">
                                    <input type="hidden" name="old_file" value="<?php echo e($item->package_file); ?>">
                                </div>
                            </div>
<br>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label" for="package_deposit">การวางมัดจำ <span class="txt-info">(ระบุ % ที่ต้องการให้ลูกค้าชำระเป็นค่ามัดจำ)</span></label>
                                        <input class="form-control" id="package_deposit" type="number" name="package_deposit" placeholder="ระบุเฉพาะตัวเลข ไม่ต้องใส่เครื่องหมาย %" maxlength="2" value="<?php echo e($item->package_deposit); ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <label class="form-label"> ไฮไลท์ทัวร์ 
                                  <span class="txt-danger">*</span>
                                </label>
                                <input class="form-control" type="text" name="highlight_tour" value="<?php echo e($item->highlight_tour); ?>">
                              </div>
                              </div>
                              <br>
                            <div class="row">
                              <div class="col-md-12">
                              <label class="form-label">รายละเอียดและเงื่อนไข
                                <span class="txt-danger">*</span>
                              </label>
                              <textarea class="form-control" rows="8" name="package_detail" id="summernote"><?php echo e($item->package_detail); ?></textarea>
                            </div>
                            </div>

<hr>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label class="form-label"><strong>สถานะแพ็คเกจ</strong>
                                        </label>
                                        <div class="form-check radio radio-primary">
                                            <input class="form-check-input" id="radio1" type="radio" name="package_status" value="1" 
                                            <?php if($item->package_status == 1): ?>
                                                checked
                                            <?php endif; ?>
                                            >
                                            <label class="form-check-label txt-primary" for="radio1"><i class="fa fa-unlock-alt"></i> เปิดจอง</label>
                                          </div>

                                          <div class="form-check radio radio-secondary">
                                            <input class="form-check-input" id="radio2" type="radio" name="package_status" value="2"  
                                            <?php if($item->package_status == 2): ?>
                                            checked
                                            <?php endif; ?>>
                                            <label class="form-check-label txt-secondary" for="radio2"><i class="fa fa-lock"></i> ปิดจอง</label>
                                          </div>
                                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
<hr>

                            <div class="card-footer">
                                <button class="btn btn-primary" type="submit">บันทึกการแก้ไขข้อมูล</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (e) {
            $('#img_cover').change(function(){
                        let reader = new FileReader();
             reader.onload = (e) => { 
               $('#preview-image-before-upload').attr('src', e.target.result); 
        }
             reader.readAsDataURL(this.files[0]); 
              });
    });

    </script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      tabsize: 2,
        height: 120,
        fontNames: ['Tahoma', 'Arial Black', 'Comic Sans MS', 'Courier New'],
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['table', ['table']],
        ['para', ['ul', 'ol', 'paragraph']],
     ]   
});
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/edit_package.blade.php ENDPATH**/ ?>