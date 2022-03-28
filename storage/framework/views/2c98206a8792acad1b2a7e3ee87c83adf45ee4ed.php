

<?php $__env->startSection('cuerpo'); ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--Articulos Nuevos-->
                <?php $__currentLoopData = $new_articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new_articulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                    
                    <span class=" d-block text-success">
                        INSERT INTO articulos (id, codigo, grupo, color, ancho, longitud, nombre, refprov, clapro, pvp1, pvp2, pvp1iva, pvp2iva, prulcom, familia_id,
                        escandallo, exist1, exist2, baja, orden, pvpoferta, oferta,baja_web, imagen, pdf, certificado, slug, descripcion, sunpro_2018, kai_2018 )
                        VALUE (<?php echo e($new_articulo->claart); ?>, '<?php echo e($new_articulo->codigo); ?>', '-', NULL, NULL, NULL, '<?php echo e($new_articulo->nombre); ?>', '<?php echo e($new_articulo->refprov); ?>'
                        , <?php echo e($new_articulo->clapro); ?> ,<?php echo e(str_replace(',','.',$new_articulo->pvp1)); ?> ,<?php echo e(str_replace(',','.',$new_articulo->pvp2)); ?> 
                        , <?php echo e(str_replace(',','.',$new_articulo->pvp1iva)); ?> ,<?php echo e(str_replace(',','.',$new_articulo->pvp2iva)); ?> ,'<?php echo e($new_articulo->prulcom); ?>' 
                        , <?php echo e($new_articulo->clafam); ?> , <?php if($new_articulo->escandallo == 0): ?>
                            'FALSO'
                        <?php else: ?>
                            'VERDADERO'
                        <?php endif; ?> ,
                        0 ,0 ,'<?php echo e($new_articulo->baja); ?>' ,<?php echo e($new_articulo->orden); ?> ,<?php echo e($new_articulo->pvpoferta); ?> 
                        , <?php if($new_articulo->oferta == 0): ?>
                            'NO'
                        <?php else: ?>
                            'SI'
                        <?php endif; ?>,'NO',
                        'PND.jpg' ,'-' ,'-' ,'-' ,'<li>Descripción del articulo actualmente no esta disponible, para mas información póngase en contacto con nosotros.</li>' ,0 ,0);
                    </span>                   
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $borrar_articulo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span class=" d-block text-danger">
                        DELETE FROM articulos WHERE id = <?php echo e($item->id); ?>;     
                    </span>                 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_pvp1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pvp1 = str_replace(',','.',$item->pvp1clasic);
                        $pvp1 = str_replace(',','',$pvp1);
                    ?>
                    
                    <?php if((float)$item->pvp1 !== (float)$pvp1): ?>
                        <!--<span class="d-block">
                            <?php echo e($item->pvp1); ?>

                        </span>
                        <span class="d-block">
                            <?php echo e($item->pvp1clasic); ?>

                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp1 ='<?php echo e($pvp1); ?>' WHERE id = <?php echo e($item->id); ?>; 
                        </span>             
                    <?php endif; ?>        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
 
            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_pvp1iva; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pvp1iva = str_replace(',','.',$item->pvp1ivaclasic);
                        $pvp1iva = str_replace(',','',$pvp1iva);
                    ?>
                    
                    <?php if((float)$item->pvp1iva !== (float)$pvp1iva): ?>
                        <!--<span class="d-block">
                            <?php echo e($item->pvp1iva); ?>

                        </span>
                        <span class="d-block">
                            <?php echo e($item->pvp1ivaclasic); ?>

                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp1iva ='<?php echo e($pvp1iva); ?>' WHERE id = <?php echo e($item->id); ?>; 
                        </span>             
                    <?php endif; ?>        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_pvp2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pvp2 = str_replace(',','.',$item->pvp2clasic);
                        $pvp2 = str_replace(',','',$pvp2);                        
                    ?>
                    <?php if((float)$item->pvp2 !== (float)$pvp2): ?>
                        <span class="d-block text-info ">
                            UPDATE articulos SET pvp2 = '<?php echo e($pvp2); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>            
                    <?php endif; ?>
                       
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_pvp2iva; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $pvp2iva = str_replace(',','.',$item->pvp2ivaclasic);
                        $pvp2iva = str_replace(',','',$pvp2iva);
                    ?>
                    
                    <?php if((float)$item->pvp2iva !== (float)$pvp2iva): ?>
                        <!--<span class="d-block">
                            <?php echo e($item->pvp2iva); ?>

                        </span>
                        <span class="d-block">
                            <?php echo e($item->pvp2ivaclasic); ?>

                        </span>-->
                        <span class="d-block">
                            UPDATE articulos SET pvp2iva ='<?php echo e($pvp2iva); ?>' WHERE id = <?php echo e($item->id); ?>; 
                        </span>             
                    <?php endif; ?>        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_refprov; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if((string)$item->refprov !== (string)$item->refprovclasic): ?>
                        <span class="d-block text-primary">
                            UPDATE articulos SET refprov = '<?php echo e($item->refprovclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_nombre; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->nombre !== $item->nombreclasic): ?>
                        <span class="d-block">
                            UPDATE articulos SET nombre = '<?php echo e($item->nombreclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_codigo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->codigo !== $item->codigoclasic): ?>
                        <span class="d-block text-danger">
                            UPDATE articulos SET codigo = '<?php echo e($item->codigoclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>
                    <?php endif; ?>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_clapro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->clapro !== $item->claproclasic): ?>
                        <span class="d-block text-success">
                            UPDATE articulos SET clapro = '<?php echo e($item->claproclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>        
                    <?php endif; ?>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_familia; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->familia_id != $item->familiaidclasic): ?>
                        <span class="d-block text-primary">
                            UPDATE articulos SET familia_id = '<?php echo e($item->familiaidclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>                                       
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_baja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->baja !== (string)$item->bajaclasic): ?>
                        <span class="d-block">
                            UPDATE articulos SET baja = '<?php echo e($item->bajaclasic); ?>' WHERE id = <?php echo e($item->id); ?>;
                        </span>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="col-lg-12">
                <?php $__currentLoopData = $actualizar_slug; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>        
                    <?php
                        $url = str_slug($item->nombre.'-'.$item->id);
                    ?>                    
                    <span class="d-block text-success">
                        UPDATE articulos SET slug = '<?php echo e($url); ?>' WHERE id = <?php echo e($item->id); ?>;
                    </span>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>


   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin.nav-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/admin/herramientas/actualizar_articulos.blade.php ENDPATH**/ ?>