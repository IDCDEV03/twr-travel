
<?php $__env->startSection('title', 'สมัครสมาชิกใหม่'); ?>

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
                        <div><a class="logo" href="<?php echo e(route('index')); ?>"><img class="img-fluid for-light"
                                    src="<?php echo e(asset('assets/images/logo/login.png')); ?>" alt="looginpage"><img
                                    class="img-fluid for-dark" src="<?php echo e(asset('assets/images/logo/logo_dark.png')); ?>"
                                    alt="looginpage"></a></div>
                        <div class="login-main">

                            <form class="theme-form" action="<?php echo e(route('register.perform')); ?>" method="POST">
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                                <?php echo e(csrf_field()); ?>

                                
                                <h4>สมัครสมาชิกใหม่</h4>
                                <p>กรุณากรอกข้อมูลเพื่อสมัครสมาชิกเว็บไซต์ของเรา</p>                         

                                <div class="form-group">
                                    <label class="col-form-label pt-0">Username</label>
                                    <input class="form-control" name="username" type="text" required
                                        placeholder="ระบุ username" value="<?php echo e(old('username')); ?>" autofocus>
                                    <?php if($errors->has('username')): ?>
                                        <span class="text-danger text-left"><?php echo e($errors->first('username')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">ชื่อ-นามสกุล</label>
                                    <input class="form-control" name="member_name" type="text" required
                                        placeholder="ระบุชื่อและนามสกุล">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Email </label>
                                    <input class="form-control" type="email" required
                                        placeholder="อีเมลสำหรับการเข้าสู่ระบบ" name="email" value="<?php echo e(old('email')); ?>">
                                    <?php if($errors->has('email')): ?>
                                        <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label pt-0">เบอร์โทรศัพท์</label>
                                    <input class="form-control" name="user_phone" type="text" required
                                        placeholder="ระบุเฉพาะตัวเลขเท่านั้น">
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <input class="form-control" type="password" name="password" required=""
                                        placeholder="รหัสผ่าน 6 ตัวอีกษรขึ้นไป" value="<?php echo e(old('password')); ?>">

                                    <?php if($errors->has('password')): ?>
                                        <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group">
                                    <label class="col-form-label">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation"
                                        value="<?php echo e(old('password_confirmation')); ?>" required>

                                    <?php if($errors->has('password_confirmation')): ?>
                                        <span
                                            class="text-danger text-left"><?php echo e($errors->first('password_confirmation')); ?></span>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Agree with<a class="ms-2"
                                                href="#">Privacy Policy</a></label>
                                    </div>
                                    <button class="btn btn-primary btn-block" type="submit">สมัครสมาชิก</button>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('userLayouts.authentication.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/auth/register.blade.php ENDPATH**/ ?>