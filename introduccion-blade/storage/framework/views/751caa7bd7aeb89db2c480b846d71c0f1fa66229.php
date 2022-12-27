<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php if($name === 'Sergio'): ?>
    Tu nombre es: <?php echo e($name); ?>

    <?php else: ?>
    Tu nombre no es Sergio :/
    <?php endif; ?>

    
    <?php $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="box item">
        <p><?php echo e($item); ?></p>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__empty_1 = true; $__currentLoopData = $array; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <p>*<?php echo e($item); ?></p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        Array vacio, no hay datos
    <?php endif; ?>

    <br>
    
    Edad: <?php echo e($age); ?>

    <br>
    
    HTML: <?php echo $html; ?>

</body>

</html><?php /**PATH C:\laragon\www\introduccion-blade\resources\views/test/index.blade.php ENDPATH**/ ?>