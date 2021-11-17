
<?php $__env->startSection('title', 'About us'); ?>
<?php $__env->startPush('styles'); ?>
    <style>
        .about-us {
            display: flex;
            justify-content: center;
            height: 500px;
            align-items: center;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class='about-us'>
        <h1> A restaurant website <br>Code by Nhom 7- L03 </h1>  
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\AI_demo\test\CNPM-Restaurant\source_code\resources\views/about-us.blade.php ENDPATH**/ ?>