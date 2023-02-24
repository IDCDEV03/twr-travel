
<?php $__env->startSection('title', 'เข้าสู่ระบบ'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid p-0">
   <div class="row m-0">
      <div class="col-12 p-0">
         <div class="login-card">
            <div>
               <div><a class="logo" href="<?php echo e(route('/')); ?>"><img class="img-fluid for-light" src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>" alt="looginpage"></a></div>
               <div class="login-main">

                  <?php if(session('error')): ?>
                  <div class="alert alert-error" role="alert">
                      <b><?php echo e(session('error')); ?></b>
                  </div>
                   <?php endif; ?>

                  <!--form_begin--->
                  <form class="theme-form" method="POST" action="<?php echo e(route('login.perform')); ?>">
                     <?php echo e(csrf_field()); ?>


                     <h4>เข้าสู่ระบบ</h4>
                     <p>ระบุอีเมลและรหัสผ่านของท่านเพื่อเข้าสู่ระบบ</p>

                     <?php echo $__env->make('userLayouts.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                     <div class="form-group">
                        <label class="col-form-label">Email หรือ Username </label>
                        <input class="form-control" type="text" name="username"  required="required" placeholder="สามารถเข้าสู่ระบบผ่าน Username หรือ E-mail" autofocus >
                        <?php if($errors->has('username')): ?>
                        <span class="text-danger text-left"><?php echo e($errors->first('username')); ?></span>
                    <?php endif; ?>
                     </div>
                     <div class="form-group">
                        <label class="col-form-label">Password</label>
                        <input class="form-control" type="password" name="password" value="<?php echo e(old('password')); ?>"  required="required" >
                        <?php if($errors->has('password')): ?>
                        <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                     </div>
                     <div class="form-group mb-0">
                        <div class="checkbox p-0">
                           <input id="checkbox1" type="checkbox" name="remember">
                           <label class="text-muted" for="checkbox1">Remember password</label>
                        </div>                       
                        <button class="btn btn-primary btn-block" type="submit">เข้าสู่ระบบ</button>
                     </div>
                     <p class="mt-4 mb-0">ยังไม่ได้เป็นสมาชิก?<a class="ms-2" href="<?php echo e(route('register.show')); ?>">สมัครสมาชิกใหม่</a></p>
                  </form>
                  <!-----------form_end------------>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('userLayouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/auth/login.blade.php ENDPATH**/ ?>