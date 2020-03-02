<?php $__env->startSection('content'); ?>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2><?php echo e($article->title); ?></h2>
            </div>
			<p><img src="/images/banner.jpg" alt="" class="image image-full" /> </p>
			<?php echo e($article->body); ?>

        </div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/davidd/venv/testproject/resources/views/articles/show.blade.php ENDPATH**/ ?>