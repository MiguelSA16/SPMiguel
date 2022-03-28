<?php $__env->startSection('titulo'); ?>
    <?php echo e($familia_actual->nomfam); ?> 
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <?php echo $__env->make('comun.front.camino-migas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid py-4">
        <div class="container">
            <!-- Titulo -->
            <div class="row subrayar">
                <div class="col-md-8">
                    <p class="sub-subtitle">
                        Nuestras categorías mas destacadas
                    </p>
                    <h1 class="title">
                        <?php echo e($familia_actual->nomfam); ?>
                        <small>
                            <i class="fas fa-stream text-sunpro"></i>
                        </small> 
                    </h1>
                </div>   
                <div class="col-md-4 d-lg-flex align-items-end justify-content-end pb-2">
                    <a href="category.html" class="text-muted text-sm link text-decoration-none">               
                        Volver a las familias <i class="fas fa-angle-double-right ml-2"></i>
                    </a>
                </div> 
            </div>
            <div class=" line-subrayar ml-m-15"></div>
            
            <!-- Familias -->
            <div class="row  justify-content-md-center"> 
                <?php $__currentLoopData = $familia_actual->categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-2 pb-3"  id="familia">
                        <?php if($categoria->grupo == '0'): ?>
                            <a href="<?php echo e(url('familia/'.$categoria->slug.'/articulos')); ?>" class="text-decoration-none item">					
                        <?php else: ?>
                            <a href="<?php echo e(url('familia/'.$categoria->slug.'/categorias')); ?>" class="text-decoration-none item">		                                
                        <?php endif; ?>
                        
                            <div class="img-familia">
                            <img src="<?php echo e(asset('images/familias/'.$categoria->imagen)); ?>" class="img-fluid rounded-circle img-thumbnail" alt="">
                            </div>
                            <div class="text-familia text-center my-3">
                                <h6 class="subtitle">
                                    <?php echo e($categoria->nomfam); ?>

                                </h6>
                            </div>	
                        </a>								
                    </div>                    
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>		
        </div>	
    </div>

    <?php echo $__env->make('comun.front.carusel-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.vertical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/familias/categorias.blade.php ENDPATH**/ ?>