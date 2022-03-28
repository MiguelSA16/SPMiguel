<?php $__env->startSection('titulo'); ?>
    Buscador
<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
<div class="row">
    <div class="col-12 col-md-12 mb-2 text-center mt-3">            
        <h2 class="bd-title">           
            Se busco: "<?php echo e($cad_buscada); ?>"
            <small>
                <i class="fas fa-search text-sunpro"></i>
            </small> 
        </h2> 
        <p class="subtitle">
        <?php if(isset($error)): ?>
            0 artículos encontrados
        <?php else: ?>
            <?php echo e($articulos->total()); ?> artículos encontrados
        <?php endif; ?>    
        </p>   
        <hr>        
    </div>
    <?php if(isset($error)): ?>
        <div class="col-12 col-md-12  mb-3 ">
            <h4 class="text-center alert alert-warning">
                <?php echo e($error); ?>

            </h4>     
        </div>
    <?php else: ?>
        <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!-- Muestra los articulos -->
            <div class="col-12 col-md-4 mb-3 ">
                <a href="<?php echo e(url('articulo/'.$item->slug.'/ver')); ?>" class="text-decoration-none">                    
                    <div class="card">                        
                        <div class="card-imagen">
                            <img src="<?php echo e(asset('images/articulos/'.$item->imagen)); ?>"  alt="...">                            
                        </div>	
                        <!-- en oferta -->
                        <?php if($item->oferta=='SI'): ?>               
                        <div class="card-img-overlay">
                            <span href="#" class="badge badge-pill badge-danger text-uppercase " style=" margin-left: 175px; font-size: 10px;">
                                en oferta
                            </span>
                        </div>	
                        <?php endif; ?>
                        <!-- fin en oferta -->
                        <div class="card-body text-center">
                            <h5 class="card-title min-height-card titulo-articulo">
                                <?php echo e($item->nombre); ?>       
                            </h5>
                            <?php if($item->art <= 1): ?>
                            <button class="btn btn-gris btn-sm text-uppercase">
                                Visita este articulo 
                            </button>
                        <?php else: ?>
                        <button class="btn btn-warning btn-sm text-uppercase">
                            <?php echo e($item->art); ?>                            
                            Longitudes disponibles
                        </button>
                        <?php endif; ?>

                            <hr class="my-3">
                            <h6>
                                Referencia: <span class="badge badge-ref size-13"><?php echo e($item->codigo); ?></span>
                            </h6>
                            <!-- Precios Oferta -->
                            <?php if($item->oferta=='SI'): ?>
                            <div class="price text-success">
                                <h5 class=" font-weight-bold m-0">
                                    <small>desde</small> <?php echo e($item->pvpoferta); ?> € <small>und.</small> 
                                </h5> 
                            </div>
                            <?php endif; ?>	
                            <!-- Fin Precios Oferta -->

                            <!-- Precios Cliente -->
                            <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>
                                    <?php if(Auth::user()->role_id == 3 && $item->oferta=='NO' || Auth::user()->role_id == 1 && $item->oferta=='NO'): ?>
                                    <div class="price text-success">
                                        <h5 class=" font-weight-bold m-0">
                                            <?php
                                                $pvp1 = number_format($item->pvp1,2); 
                                            ?>
                                            <?php if($pvp1 == 0.00): ?>
                                                <span class=" badge badge-warning badge-pill">
                                                    Consultar precio
                                                </span>    
                                            <?php else: ?>
                                                <?php echo e($pvp1); ?> € <small>und.</small> 
                                            <?php endif; ?>                                            
                                        </h5> 
                                    </div>
                                    <?php endif; ?>	
                                <?php endif; ?>
                            <?php endif; ?>
                            <!-- Fin Precios Cliente -->

                        </div>
                        
                        <div class="card-footer text-center">
                            <div class="row">
                                <div class="col-12">         
                                    <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i>
                                    <small class="py-1">
                                        Ficha Tecnica
                                    </small>              
                                    
                                    <?php if($item->pdf=='-'): ?>
                                    <i class="fas fa-times text-danger pl-1" style="font-size:18px;"></i>
                                    <?php else: ?>
                                    <i class="fas fa-check text-success pl-1" style="font-size:18px;"></i>
                                    <?php endif; ?>

                                    
                                </div>
                            </div>                        
                        </div>
                    </div>
                    
                    
                </a>								
            </div>
            <!-- Fin Muestra los articulos -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="col-12">
        <?php if(isset($articulos)): ?>
            <?php echo $articulos->appends("q",$cad_buscada)->links(); ?>

        <?php endif; ?>        
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front.nav-left', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/front/search/index.blade.php ENDPATH**/ ?>