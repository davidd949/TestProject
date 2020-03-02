<?php $__env->startSection('content'); ?>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="title">
                    <a href="<?php echo e(route('article.show', $article)); ?>">
                        <h2><?php echo e($article->title); ?></h2>
                    </a>
                </div>
                <p><img src="images/banner.jpg" alt="" class="image image-full" /> </p>
                <p><?php echo e($article->body); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/davidd/venv/testproject/resources/views/articles/showall.blade.php ENDPATH**/ ?>