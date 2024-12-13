<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>



<?php $__env->startSection('title'); ?>
    <?php echo e(config('adminlte.title')); ?>

    <?php if (! empty(trim($__env->yieldContent('subtitle')))): ?> | <?php echo $__env->yieldContent('subtitle'); ?> <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content_header'); ?>
    <?php if (! empty(trim($__env->yieldContent('content_header_title')))): ?>
        <h1 class="text-muted">
            <?php echo $__env->yieldContent('content_header_title'); ?>

            <?php if (! empty(trim($__env->yieldContent('content_header_subtitle')))): ?>
                <small class="text-dark">
                    <i class="fas fa-xs fa-angle-right text-muted"></i>
                    <?php echo $__env->yieldContent('content_header_subtitle'); ?>
                </small>
            <?php endif; ?>
        </h1>
    <?php endif; ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
    <?php echo $__env->yieldContent('content_body'); ?>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer'); ?>
    <div class="float-right">
        Version: <?php echo e(config('app.version', '1.0.0')); ?>

    </div>

    <strong>
        <a href="<?php echo e(config('app.company_url', '#')); ?>">
            <?php echo e(config('app.company_name', 'My company')); ?>

        </a>
    </strong>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('js'); ?>
<script>

    $(document).ready(function() {
        // Add your common script logic here...
    });

</script>
<?php $__env->stopPush(); ?>



<?php $__env->startPush('css'); ?>
<style type="text/css">

    
    /*
    .card-header {
        border-bottom: none;
    }
    .card-title {
        font-weight: 600;
    }
    */

</style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\franm\Herd\prub\resources\views/layouts/app.blade.php ENDPATH**/ ?>