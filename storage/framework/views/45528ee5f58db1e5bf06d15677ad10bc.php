<?php $__env->startSection('subtitle', 'Welcome'); ?>
<?php $__env->startSection('content_header_title', 'Home'); ?>
<?php $__env->startSection('content_header_subtitle', 'Welcome'); ?>



<?php $__env->startSection('content_body'); ?>
    <p>Welcome to this beautiful admin panel.</p>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('css'); ?>
    
    
<?php $__env->stopPush(); ?>



<?php $__env->startPush('js'); ?>
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/welcome.blade.php ENDPATH**/ ?>