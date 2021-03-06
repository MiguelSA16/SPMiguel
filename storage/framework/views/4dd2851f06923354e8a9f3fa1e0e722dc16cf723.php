<div class="container-fluid bg-gris py-5">
    <div class="container">
        <!--Titulo carusel-->
        <div class="row subrayar">
            <div class="col-md-8">
                <p class=" sub-subtitle">
                    ¡Date prisa, que la oferta se termina!
                </p>
                <h2 class="title">
                    Productos en oferta 
                    <small>
                        <i class="fas fa-gift text-sunpro"></i>
                    </small> 
                </h2>
            </div>
            <div class="col-md-4 d-lg-flex align-items-end justify-content-end pb-2">
                <a href="<?php echo e(url('/ofertas')); ?>" class="text-muted text-sm link text-decoration-none">               
                    Ver todas las ofertas <i class="fas fa-angle-double-right ml-2"></i>
                </a>
            </div>
        </div>
        <div class="line-subrayar ml-m-15"></div>
        <!--FIN Titulo carusel-->		

        <!--Todos los Item-->
        <div class="row my-auto">
            <div id="recipeCarousel" class="carousel slide w-100" data-ride="carousel">
                <div class="carousel-inner w-100" role="listbox">	                
                <!--Pinta Todos los Item-->						
                <?php $active = 'active'; ?>
                <?php $__currentLoopData = $ofertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="carousel-item <?php echo e($active); ?>">
                        <div class="col-12 col-md-3">
                            <a href="<?php echo e(url('articulo/'.$item->slug.'/ver')); ?>" class="text-decoration-none">
                                <div class="card">
                                    <div class="card-imagen">
                                    <img src="<?php echo e(asset('images/articulos/'.$item->imagen)); ?>"  alt="...">
                                    </div>							 	
                                    <div class="card-body text-center">
                                        <h5 class="card-title min-height-card">
                                            <?php echo e($item->nombre); ?>

                                        </h5>                                       
                                        <?php if($item->art <= 1): ?>
                                            <button class="btn btn-gris btn-sm text-uppercase">
                                                Visita este articulo 
                                            </button>
                                        <?php else: ?>
                                        <button class="btn btn-warning btn-sm text-uppercase">                                           
                                            <?php echo e($item->art); ?>                                            
                                            Medidas en OFERTA 
                                        </button>
                                        <?php endif; ?>
                                            
                                        <hr class="my-3">
                                        <h6>
                                            Referencia: <span class="badge badge-pill badge-ref px-2 py-1"><?php echo e($item->codigo); ?></span>
                                        </h6>	
                                        <div class="pro-price">
                                            <span class="current-price">
                                                <small>desde</small> <?php echo e($item->pvpoferta); ?> € <small>und.</small> 
                                            </span> 
                                        </div>					    	
                                    </div>							  	
                                </div>
                            </a>								
                        </div>
                    </div>		
                    <?php $active = ''; 	?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	<!-- Fin Pinta Todos los Item-->
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-12 text-right my-2">
                            <a class="btn btn-outline-sunpro mx-1 prev" href="#recipeCarousel" role="button" data-slide="prev">
                                    <i class="fa fa-lg fa-chevron-left"></i>
                            </a>

                            <a class="btn btn-outline-sunpro mx-1 next" href="#recipeCarousel" role="button" data-slide="next">
                                    <i class="fa fa-lg fa-chevron-right"></i>
                            </a>                                
                        </div>
                    </div>
                </div>
            </div>
        </div><!--FIN Todos los Item-->
    </div>
</div><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/comun/front/carusel-items.blade.php ENDPATH**/ ?>