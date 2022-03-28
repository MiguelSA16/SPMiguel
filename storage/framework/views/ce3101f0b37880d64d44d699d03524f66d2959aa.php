<div class="container-fluid bg-migas size-13">
    <div class="container">
        <nav aria-label="breadcrumb bg-migas">
            <ol class="breadcrumb m-0 p-2">        

                <li class="breadcrumb-item">
                    <a href="<?php echo e(url('/')); ?>" class="text-decoration-none link-camino-migas">
                        INICIO
                    </a>
                </li>         
                
                <?php if(isset($articulo->familia)): ?>
                    <?php
                        $familia_actual = $articulo->familia;
                    ?>
                <?php endif; ?>
                

                <?php if(isset($familia_actual)): ?>

                    <li class="breadcrumb-item">
                        <a href="<?php echo e(url('/nuestros-productos')); ?>" class="text-decoration-none link-camino-migas">
                            FAMILIAS 
                        </a>
                    </li> 

                    <?php if(isset($familia_actual->padre->padre)): ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(url('familia/'.$familia_actual->padre->padre->slug.'/categorias')); ?>" class="text-decoration-none link-camino-migas">
                                <?php echo e($familia_actual->padre->padre->nomfam); ?>

                            </a>
                        </li> 
                    <?php endif; ?> 

                    <?php if($familia_actual->padre): ?>
                        <li class="breadcrumb-item">
                            <a href="<?php echo e(url('familia/'.$familia_actual->padre->slug.'/categorias')); ?>" class="text-decoration-none link-camino-migas">
                                <?php echo e($familia_actual->padre->nomfam); ?>

                            </a>
                        </li>          
                    <?php endif; ?>    

                    <?php if(isset($articulo->familia) ): ?>

                        <li class="breadcrumb-item">
                            <a href="<?php echo e(url('familia/'.$articulo->familia->slug.'/articulos')); ?>" class="text-decoration-none link-camino-migas">
                                <?php echo e($articulo->familia->nomfam); ?>

                            </a>
                        </li>    

                        <li class="breadcrumb-item text-uppercase" data-toggle="tooltip" data-placement="bottom" title="<?php echo e($articulo->nombre); ?>">
                            <?php
                                if (strlen($articulo->nombre) > 30) {
                                    $nombre_articulo = substr($articulo->nombre,0,30).'...';
                                }else{
                                    $nombre_articulo = $articulo->nombre;
                                }                                               
                            ?>

                            <?php echo e($nombre_articulo); ?> 
                        </li>   
                        
                    <?php else: ?>
                    
                        <li class="breadcrumb-item">
                            <?php echo e($familia_actual->nomfam); ?>

                        </li> 

                    <?php endif; ?>        
                
                    

                <?php else: ?>

                    <li class="breadcrumb-item">
                        FAMILIAS
                    </li>   

                <?php endif; ?>  

            </ol>
        </nav>

    </div>
</div><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/comun/front/camino-migas.blade.php ENDPATH**/ ?>