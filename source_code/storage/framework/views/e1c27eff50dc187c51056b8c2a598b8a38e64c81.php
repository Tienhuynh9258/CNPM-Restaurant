
<?php $__env->startSection('title', 'Contact us'); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        .contact-us {
            display: flex;
            justify-content: center;
            height: 500px;
            align-items: center;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('nav'); ?>
    <?php echo $__env->make('layouts.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class='contact-us'>
        <h1>Coming soon!</h1>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\New folder\htdocs\new\CNPM-Restaurant\source_code\resources\views/contact-us.blade.php ENDPATH**/ ?>