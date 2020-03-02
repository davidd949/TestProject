<?php $__env->startSection('head'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div id="wrapper">
    <div id="page" class="container">
        <h1 style="text-align: center; font-size: 30px;">Edit Article</h1>
        <form method="POST" action="/articles/<?php echo e($article->id); ?>">
            <?php echo csrf_field(); ?>

            <!-- Modern browsers seems to handle GET and POST requests only.. others get converted to get
            Thus, we have to manually include special directions to laravel that this POST request with PUT intentions -->
            <?php echo method_field('PUT'); ?>

            <div class="field">
                <label class="label">Title</label>
                <div class="control">
                    <input class="input" type="text" name="title" id="title" value="<?php echo e($article->title); ?>" required min="3" maxlength="255"/>
                </div>
            </div>

            <div class="field">
                <label class="label" for="excerpt">Excerpt</label>
                <div class="control">
                    <textarea class="textarea" type="text" name="excerpt" id="excerpt"><?php echo e($article->excerpt); ?></textarea>
                </div>
            </div>

            <div class="field">
                <label class="label" for="body">Body</label>
                <div class="control">
                    <textarea class="textarea" type="text" name="body" id="body"><?php echo e($article->body); ?></textarea>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <button class="button is-link" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/davidd/venv/testproject/resources/views/articles/edit.blade.php ENDPATH**/ ?>