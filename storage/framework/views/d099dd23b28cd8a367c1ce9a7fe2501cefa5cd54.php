<?php $__env->startSection('titulo'); ?>
    Nuestros Productos
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <?php echo $__env->make('comun.front.camino-migas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('comun.front.familias', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('comun.front.carusel-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.vertical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\SPMiguel\resources\views/front/familias/index.blade.php ENDPATH**/ ?>