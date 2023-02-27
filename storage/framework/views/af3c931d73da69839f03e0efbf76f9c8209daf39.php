
<?php $__env->startSection('title', 'ตั้งค่าข้อมูล'); ?>

<?php $__env->startSection('css'); ?>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb-title'); ?>
    <h3>แก้ไขข้อมูล</h3>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">


                
                    <div class="col-xl-12 xl-100 col-lg-12 box-col-12">
                        <div class="card">
                            <div class="card-header">
                                เงื่อนไขแพ็คเกจทัวร์
                            </div>
                            <div class="card-body">
                    <form action="<?php echo e(route('admin.insert_condition')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php $__currentLoopData = $condition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                          
                        <div class="row">
                            <div class="col-md-12">
                                <label class="form-label">เงื่อนไข
                                <span class="txt-danger">*</span>
                                </label>
                                <textarea class="form-control" rows="8" name="package_condition" id="summernote">
                                    <?php echo e($item->package_condition); ?>

                                </textarea>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">บันทึกข้อมูล</button>
                        </div>
                    </form>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

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

<?php echo $__env->make('layouts.simple.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/admin/admin_condition_setting.blade.php ENDPATH**/ ?>