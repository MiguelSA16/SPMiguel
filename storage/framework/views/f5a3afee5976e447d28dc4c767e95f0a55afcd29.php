<?php $__env->startSection('titulo'); ?>

    Inicio 

<?php $__env->stopSection(); ?>



<?php $__env->startSection('cuerpo'); ?>

    <?php echo $__env->make('comun.front.carusel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>            

    <?php echo $__env->make('comun.front.carusel-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('comun.front.familias', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('comun.front.newsletter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('comun.front.certificados', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>  
    
<?php $__env->stopSection(); ?>

    
<?php echo $__env->make('layouts.front.vertical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/index.blade.php ENDPATH**/ ?>