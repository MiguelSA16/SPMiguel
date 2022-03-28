<?php $__env->startSection('cuerpo'); ?>
<div id="textoACopiar">
    <?php $__currentLoopData = $new_movalm_clg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <span class=" d-block text-success">
                INSERT INTO movalm (clamov, tipo, cladoc,cladocl ,fecha ,claart ,clacol, claalm,tc1 ,tc2 ,tc3 ,tc4 ,tc5 ,tc6 ,tc7 ,tc8 ,tc9 , tc10,
                tc11, cantidad, valcom, valven, numserie, vtogarant)
                VALUE (<?php echo e($item->clamov); ?>, <?php echo e($item->tipo); ?>, <?php echo e($item->cladoc); ?>,<?php echo e($item->cladocl); ?> ,'<?php echo e($item->fecha); ?>' ,<?php echo e($item->claart); ?> , <?php echo e($item->clacol); ?>, 
                <?php echo e($item->claalm); ?>, '<?php echo e($item->tc1); ?>', <?php echo e($item->tc2); ?>, <?php echo e($item->tc3); ?>, <?php echo e($item->tc4); ?>, <?php echo e($item->tc5); ?>, <?php echo e($item->tc6); ?>, <?php echo e($item->tc7); ?>, <?php echo e($item->tc8); ?>, <?php echo e($item->tc9); ?>, <?php echo e($item->tc10); ?>,
                <?php echo e($item->tc11); ?>,'<?php echo e($item->cantidad); ?>', '<?php echo e($item->valcom); ?>', '<?php echo e($item->valven); ?>', '<?php echo e($item->numserie); ?>', '<?php echo e($item->vtogarant); ?>');
        </span>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="container">		
    <div class="text-center py-3">  
        <button id="btnCopiar" class="btn btn-primary">
            COPIAR SQL
        </button>  
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin.nav-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/admin/herramientas/actualizar_movalm.blade.php ENDPATH**/ ?>