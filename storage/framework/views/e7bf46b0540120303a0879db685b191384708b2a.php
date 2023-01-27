<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SP INTER TOUR จองแพ็คเกจทัวร์ จัดสมมนา ศึกษาดูงาน ปรึกษาวีซ่า ตั๋วเครื่องบิน">
    <meta name="keywords" content="จองแพ็คเกจทัวร์ จัดสมมนา ศึกษาดูงาน ปรึกษาวีซ่า ตั๋วเครื่องบิน แปลเอกสาร">
    <meta name="author" content="SP Inter Tour">
    <link rel="icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/favicon.png')); ?>" type="image/x-icon">
     <title>SP Inter Tour - <?php echo $__env->yieldContent('title'); ?></title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap" rel="stylesheet">
    
    <?php echo $__env->make('layouts.authentication.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('style'); ?> 
  </head>
  <body>
    <!-- login page start-->
    <?php echo $__env->yieldContent('content'); ?>  
    <!-- latest jquery-->
    <?php echo $__env->make('layouts.authentication.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
  </body>
</html><?php /**PATH C:\xampp\htdocs\twr_travel\resources\views/userLayouts/authentication/master.blade.php ENDPATH**/ ?>