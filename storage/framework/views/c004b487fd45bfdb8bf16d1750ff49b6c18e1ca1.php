<?php $__env->startSection('titulo'); ?>
    <?php echo e($articulo->nombre); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('cuerpo'); ?>
    <?php echo $__env->make('comun.front.camino-migas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="container-fluid py-4 ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                     <!-- Titulo -->
                    <div class="row text-center">
                        <div class="col-md-12 pb-2">                   
                            <h1 class="title">
                                <?php echo e($articulo->nombre); ?>                        
                            </h1>
                            <p class="sub-subtitle  ">
                                Articulos al por mayor en Madrid
                            </p>
                        </div>                
                    </div>
                    <div class=" subrayar"></div>
                    <div class=" line-subrayar"></div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-5">
                            <div class=" bg-white">
                                <img src="<?php echo e(asset('images/articulos/'.$articulo->imagen)); ?>" class=" img-fluid w-100 " />
                            </div>                     
                        </div> 
                        <div class="col-7">                    
                            <p class="subtitle pb-3 font-weight-bold">                
                                Caracteristicas:
                            </p>                     
                            <table class="table table-striped ">
                                <tbody>
                                    <tr>
                                        <th class="text-uppercase border-0">
                                            Nombre:
                                        </th>
                                        <td class="text-muted border-0" colspan="3" >
                                            <?php echo e($articulo->nombre); ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase">
                                            Referencia:
                                        </th>
                                        <td class="text-muted">
                                            <span class="badge badge-ref size-13">
                                                <?php echo e($articulo->codigo); ?>

                                            </span>
                                        </td>    
                                        <th class="text-uppercase">
                                            F. Tecnica:
                                        </th>

                                    <?php if($articulo->pdf == '-'): ?>
                                        <td class="text-muted"> 
                                            <span class=" badge badge-warning size-13">
                                                <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                NO DISPONIBLE 
                                            </span>
                                        </td>
                                    <?php else: ?>
                                        <td class="text-muted" > 
                                            <a href="<?php echo e(asset('pdfs/'.$articulo->pdf)); ?>" class="text-decoration-none" target="_black">                                                   
                                                <span class=" badge badge-dark size-13 ">                             
                                                    <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                    DESCARGAR PDF
                                                </span> 
                                            </a>         
                                        </td>
                                    <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <th class="text-uppercase border-0">
                                            Certificado:
                                        </th>

                                    <?php if($articulo->certificado == '-'): ?>
                                        <td class="text-muted" > 
                                        <td class="text-muted" colspan="3"> 
                                            <span class=" badge badge-warning size-13">
                                                <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                NO DISPONIBLE 
                                            </span>
                                        </td>
                                    <?php else: ?>
                                        <td class="text-muted" colspan="3"> 
                                            <a href="<?php echo e(asset('certificados/'.$articulo->certificado)); ?>" class="text-decoration-none" target="_black">                                                   
                                                <span class=" badge badge-dark size-13 ">                             
                                                    <i class="far fa-file-pdf text-danger" style="font-size:18px;"></i> 
                                                    DESCARGAR CERTIFICADO
                                                </span> 
                                            </a>         
                                        </td>
                                    <?php endif; ?>
                                    </tr>
                                    <tr >
                                        <th class="text-uppercase ">
                                            Color:
                                        </th>
                                        <td class="text-muted"> 
                                            <?php echo e($articulo->color); ?> 
                                        </td>
                                        <th class="text-uppercase ">
                                            Medida:
                                        </th>
                                        <td class="text-muted"> 
                                            <?php echo e($articulo->longitud); ?> 
                                        </td>
                                    </tr>

                                    <!-- Precios Cliente -->
                                    <?php if(Route::has('login')): ?>
                                        <?php if(auth()->guard()->check()): ?>
                                            <?php if(Auth::user()->role_id == 3): ?>
                                                <tr class=" border-bottom">
                                                    <th class="text-uppercase ">
                                                        Precio:
                                                    </th>
                                                    <!--Codigo antiguo-->
                                                    <th class="text-primary"> 
                                                        <?php
                                                            $pvp1 = number_format($articulo->pvp1,2);
                                                        ?>
                                                        <?php if($pvp1 == 0.00): ?>
                                                            <span class=" badge-warning badge-pill">
                                                                Consultar precio
                                                            </span>    
                                                        <?php else: ?>
                                                            <?php echo e($pvp1); ?> € <small>und.</small> 
                                                        <?php endif; ?>
                                                    </th>
                                                     <!--Fin Codigo antiguo-->
                                                        
                                                    <th class="text-uppercase ">
                                                        stock:
                                                    </th>
                                                    <th style="padding-bottom: 5px; padding-top: 5px;"> 
                                                        <?php if($articulo->stock[0]->total == '' || $articulo->stock[0]->total == 0 ): ?>
                                                            <span>
                                                                <i class="fas fa-battery-empty text-danger" style=" font-size:35px; "></i>   
                                                            </span>
                                                        <?php elseif($articulo->stock[0]->total < 0): ?>
                                                            <i class="fas fa-battery-empty text-danger" style=" font-size:35px; "></i>   
                                                        <?php else: ?>
                                                            <?php if(isset($consumo[0])): ?>
                                                                <?php if($articulo->stock[0]->total > $consumo[0]->avisar): ?>
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                <?php elseif($articulo->stock[0]->total < $consumo[0]->avisar): ?>
                                                                    <i class="fas fa-battery-half " style=" color:#f8bf3b; font-size:35px;"></i>
                                                                <?php elseif($articulo->stock[0]->total == $consumo[0]->avisar): ?>
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                <?php endif; ?>
                                                            <?php elseif(!isset($consumo[0])): ?>
                                                                <?php if($articulo->stock[0]->total): ?>    
                                                                    <i class="fas fa-battery-full text-success" style=" font-size:35px;  "></i>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>  
                                                    </th>
                                                </tr>                                                
                                            <?php elseif(Auth::user()->role_id == 4 || Auth::user()->role_id == 1): ?>     
                                                <tr class=" border-bottom">
                                                    <th class="text-uppercase ">
                                                        Precio:
                                                    </th>
                                                    <th class="text-primary"> 
                                                        <?php
                                                            $pvp1 = number_format($articulo->pvp1,2);
                                                        ?>
                                                        <?php if($pvp1 == 0.00): ?>
                                                            <span class=" badge-warning badge-pill">
                                                                Consultar precio
                                                            </span>    
                                                        <?php else: ?>
                                                            <?php echo e($pvp1); ?> € <small>und.</small> 
                                                        <?php endif; ?>
                                                    </th>
                                                    <th class="text-uppercase ">
                                                        stock:
                                                    </th>  
                                                        <th style="font-size: 18px; padding-top: 8px;"> 
                                                        <?php if($articulo->stock[0]->total == '' || $articulo->stock[0]->total == 0 ): ?>
                                                            <span class="text-danger">
                                                                0 <small>und.</small>  
                                                            </span>
                                                        <?php elseif($articulo->stock[0]->total < 0): ?>
                                                            <span class="text-danger">
                                                                <?php echo e($articulo->stock[0]->total); ?> <small>und.</small>  
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="text-success">
                                                                <?php echo e($articulo->stock[0]->total); ?> <small>und.</small>  
                                                            </span>
                                                        <?php endif; ?>       
                                                    </th>    
                                                </tr>  
                                            <?php endif; ?>         
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>   
                    </div>
                </div>

                <?php if($longitudes->count() != 0): ?>
                <div class="col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">
                        Medidas Disponibles:
                    </p> 
                    <?php $__currentLoopData = $longitudes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $longitud): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('articulo/'.$longitud->slug.'/ver')); ?>" class="text-decoration-none">
                            <button class=" btn btn-outline-sunpro py-0 my-1"><?php echo e($longitud->longitud); ?></button>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <?php if($anchos->count() != 0): ?>
                <div class=" col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold"> 
                        Anchos Disponibles:
                    </p> 
                    <?php $__currentLoopData = $anchos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ancho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('articulo/'.$ancho->slug.'/ver')); ?>" class="text-decoration-none">
                            <button class=" btn btn-outline-primary py-0 my-1"><?php echo e($ancho->ancho); ?></button>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php endif; ?>  
                <?php if($colores->count() != 0): ?>
                <div class=" col-6">
                    <p class="subtitle pt-3 pb-2 font-weight-bold"> 
                        Colores Disponibles:
                    </p> 
                    <?php $__currentLoopData = $colores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(url('articulo/'.$color->slug.'/ver')); ?>" class="text-decoration-none">
                            <button class=" btn btn-outline-<?php echo e($color->color); ?> py-0 my-1"><?php echo e($color->color); ?></button>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <?php endif; ?>
                <div class="col-12">
                    <p class="subtitle pt-3 pb-2 font-weight-bold">    
                        Descripcion:
                    </p> 
                    <span>
                        <?php echo $articulo->descripcion; ?>

                    </span>
                </div>
            </div>
        </div>
    </div>



    <?php if($art_relacionados->count() != 0): ?>
    <div class="container-fluid py-4 bg-white">
        <div class="container">
            <div class="row">  
                <div class="col-12">
                    <p class="subtitle pb-2 font-weight-bold"> 
                        Otros Clientes Tambien Compraron:
                    </p> 
                    <div class="row">
                        <?php $__currentLoopData = $art_relacionados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $art_relacionado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           <div class="col-2 py-1 ">
                                <a href="<?php echo e(url('articulo/'.$art_relacionado->slug.'/ver')); ?>" class=" text-decoration-none">  
                                    <div class="card border-success" data-toggle="tooltip" data-placement="top" title="<?php echo e($art_relacionado->nombre); ?>">
                                        <div class="card-imagen border-0">
                                            <img src="<?php echo e(url('/images/articulos/'.$art_relacionado->imagen)); ?>" alt="<?php echo e($art_relacionado->nombre); ?>" class=" img-fluid p-2">
                                        </div>
                                        <div class="card-body p-2 bg-success text-center">
                                            <?php
                                            if (strlen($art_relacionado->nombre) > 30) {
                                                $nombre = substr($art_relacionado->nombre,0,30).'...';
                                            }else{
                                                $nombre = $art_relacionado->nombre;
                                            }                                           

                                            ?>
                                            <span class=" text-white " >
                                                <?php echo e($nombre); ?>

                                            </span>
                                        </div>	
                                    </div>     
                                </a>  
                            </div>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>    
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>   
    <?php echo $__env->make('comun.front.carusel-items', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front.vertical', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SPMiguel\resources\views/front/articulos/ver.blade.php ENDPATH**/ ?>