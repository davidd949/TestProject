<?php $__env->startSection('content'); ?>
<div>
    <p>POSTS</p>
    <h2>Post Title: <?php echo e($post->body); ?></h2>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/davidd/venv/testproject/resources/views/posts.blade.php ENDPATH**/ ?>