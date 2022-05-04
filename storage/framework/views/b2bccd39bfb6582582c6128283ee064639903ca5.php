
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">       
    
    <?php if(isset($familia_actual->padre->categorias)): ?>
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class="menu-titulo">                   
                <?php echo e($familia_actual->padre->nomfam); ?>
            </span>
        </li>    
        <?php $__currentLoopData = $familia_actual->padre->categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                       
            <li class=" nav-item ml-4 p-0 pr-2">
            <?php if($familia->grupo == '1'): ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/categorias')); ?>" class="text-decoration-none ml-0 menu-sub-categoria p-0" style="display: -webkit-flex; align-items: center;">     
            <?php else: ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/articulos')); ?>" class="text-decoration-none ml-0 menu-sub-categoria p-0" style="display: -webkit-flex; align-items: center;">     
            <?php endif; ?>                                       
    
                <?php if($familia_actual->nomfam ==$familia->nomfam): ?>
                    <button class=" btn btn-warning py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            <?php echo e($familia->nomfam); ?>            
                        </small>                     
                    </button>   
                <?php else: ?>
                    <button class=" btn btn-secondary py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            <?php echo e($familia->nomfam); ?>            
                        </small>                     
                    </button>                        
                <?php endif; ?>
                                           
                </a> 
            </li>                           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
        <li class="border-bottom pt-1 mr-2 ml-2"></li>
    <?php endif; ?>

    <?php if(isset($colores)): ?>
        <?php if($colores->count() != 0): ?>
            <li class=" nav-item pb-1 pt-3 text-uppercase">
                <span class=" menu-titulo">                
                    <?php echo e('Colores disponibles'); ?>
                </span>
            </li> 
            <li class=" nav-item ml-4 p-0 pr-2">
                <?php $__currentLoopData = $colores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="?c=<?php echo e($color->color); ?>" class=" text-decoration-none">
                        <button class="btn btn-outline-<?php echo e($color->color); ?> py-0 my-1">                    
                            <?php echo e($color->color); ?>
                        </button>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </li>
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
        <?php endif; ?>
    <?php endif; ?>
    

    <?php if(isset($longitudes)): ?>
        <?php if($longitudes->count() != 0): ?>
            <li class=" nav-item pb-1 pt-3 text-uppercase">
                <span class=" menu-titulo">                
                    <?php echo e('Medidas disponibles'); ?>
                </span>
            </li> 
            <li class=" nav-item ml-4 p-0 pr-2">
                <?php $__currentLoopData = $longitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $longitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="?l=<?php echo e($longitud->longitud); ?> " class="text-decoration-none">
                    <button class="btn btn-outline-sunpro py-0 my-1">                    
                        <?php echo e($longitud->longitud); ?>
                    </button>
                </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                
            </li>
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
        <?php endif; ?>
    <?php endif; ?>


    <?php if(isset($familia_actual->padre->padre->categorias)): ?>
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class=" menu-titulo">                
                <?php echo e('Categorías relacionadas'); ?>
            </span>
        </li>         
        <?php $__currentLoopData = $familia_actual->padre->padre->categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                     
            <li class=" nav-item pl-3">                    
            <?php if($familia_actual->padre->nomfam != $familia->nomfam): ?>       
                <?php if($familia->grupo == '1'): ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/categorias')); ?>" class="text-decoration-none ml-0 menu-categoria pl-2" style="display: -webkit-flex; align-items: center;">     
                <?php else: ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/articulos')); ?>" class="text-decoration-none ml-0 menu-categoria  pl-2" style="display: -webkit-flex; align-items: center;">     
                <?php endif; ?>                              
                    <button class=" btn btn-warning py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            <?php echo e($familia->nomfam); ?>        
                        </small>                     
                    </button>                                        
                </a> 
            <?php endif; ?>
            </li>                           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
            <li class="border-bottom pt-1 mr-2 ml-2"></li>
    <?php endif; ?>

    <?php if(isset($familias)): ?>
        <li class=" nav-item pb-1 pt-3 text-uppercase">
            <span class=" menu-titulo">                
                Nuestros Productos
            </span>
        </li> 
        <?php $__currentLoopData = $familias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $familia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                     
            <li class=" nav-item pl-3">       
                <?php if($familia->grupo == '1'): ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/categorias')); ?>" class="text-decoration-none ml-0 menu-categoria pl-2" style="display: -webkit-flex; align-items: center;">     
                <?php else: ?>
                <a href="<?php echo e(url('familia/'.$familia->slug.'/articulos')); ?>" class="text-decoration-none ml-0 menu-categoria  pl-2" style="display: -webkit-flex; align-items: center;">     
                <?php endif; ?>                              
                    <button class=" btn btn-primary py-0 my-1 size-13">    
                        <small>
                            <i class="fab fa-slack-hash"></i> 
                            <?php echo e($familia->nomfam); ?>        
                        </small>                     
                    </button>                                        
                </a> 
            </li>                           
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
    <?php endif; ?>
    
    </ul>
</nav>
    
    
    
    <?php /**PATH C:\laragon\www\SPMiguel\resources\views/comun/front/menu-lateral.blade.php ENDPATH**/ ?>