

<?php $__env->startSection('cuerpo'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <?php $__currentLoopData = $new_familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class=" d-block">
                        INSERT INTO familias( id ,nomfam ,escandallo ,imagen ,orden ,claparent ,grupo ,descripcion ,slug ,baja_web) 
                        VALUES ( <?php echo e($new_familia->clafam); ?> ,'<?php echo e($new_familia->nomfam); ?>' ,'<?php echo e($new_familia->escandallo); ?>' ,'PND.jpg' ,<?php echo e($new_familia->orden); ?> 
                        ,<?php echo e($new_familia->claparent); ?> ,'<?php echo e($new_familia->grupo); ?>' ,'-' ,'-' ,'FALSO' );
        
                    </span> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $nombre_familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $nombre_familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class=" d-block">
                        UPDATE familias SET nomfam = '<?php echo e($nombre_familia->nomfam); ?>' WHERE id = <?php echo e($nombre_familia->clafam); ?>;
                    </span>      
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $claparent_group_familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claparent_group_familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($claparent_group_familia->claparent != $claparent_group_familia->claparent_clg): ?>
                        <span class="d-block">
                            UPDATE familias SET claparent = <?php echo e($claparent_group_familia->claparent_clg); ?> WHERE id = <?php echo e($claparent_group_familia->id); ?>;
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $claparent_group_familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claparent_group_familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($claparent_group_familia->grupo != $claparent_group_familia->grupo_clg): ?>
                        <span class="d-block">
                            UPDATE familias SET grupo = <?php echo e($claparent_group_familia->grupo_clg); ?> WHERE id = <?php echo e($claparent_group_familia->id); ?>;
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="col-lg-12">
                <?php $__currentLoopData = $url_familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $url_familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $slug = str_slug($url_familia->nomfam);
                        $slug = $slug.'-'.$url_familia->id;
                    ?>
                    <span class="d-block">
                        UPDATE familias SET slug = '<?php echo e($slug); ?>' WHERE id = <?php echo e($url_familia->id); ?>;
                    </span>
                   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $borrar_familia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class=" d-block text-danger">
                        DELETE FROM familias WHERE id = <?php echo e($item->id); ?>      
                    </span>                 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        
        </div>
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.nav-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/admin/herramientas/actualizar_familias.blade.php ENDPATH**/ ?>