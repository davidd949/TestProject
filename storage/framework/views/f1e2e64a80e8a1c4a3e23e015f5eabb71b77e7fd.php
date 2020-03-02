<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel testing!</title>
    </head>
    <body>
        <p>Two ways to insert variables</p>
        <p>Pure PHP style</p>
        <h1><?= htmlspecialchars($name, ENT_QUOTES); ?></h1>
        <p>Laravel style</p>
        <h1><?php echo e($name); ?></h1>
    </body>
</html><?php /**PATH /Users/davidd/venv/testproject/resources/views/test.blade.php ENDPATH**/ ?>