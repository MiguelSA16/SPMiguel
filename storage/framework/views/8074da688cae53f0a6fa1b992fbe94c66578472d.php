<?php $__env->startSection('cuerpo'); ?>
    
<div class="container-fluid">                    
    <div class="modal-content">
         <div class="modal-body">       
            <div class="row">
                <div class="col-12 ">
                    <div class=" bg-dark rounded">
                        <h5 class=" text-light text-center py-2 text-uppercase">
                            Descripción  incidencia
                        </h5>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="row px-3 ">
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Proveedor/Cliente</h5>
                                <p  class="text-muted form-control-file"><?php echo e(nombreCliente(Auth::user()->cliente_id)); ?> </p>         
                        </div>     
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Fecha</h5>
                                <p  class="text-muted"> <?php echo e($incidencia->created_at); ?> </p>
                        </div>                 
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Referencia</h5>
                                <p  class="text-muted"> <?php echo e($incidencia->referencia); ?></p>                                  
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Nombre del articulo</h5>
                                <p  class="text-muted"> <?php echo e(nombreArticulo($incidencia->referencia)); ?></p>                                  
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold"> Nº serie</h5>
                                <p class="text-muted">  <?php echo e($incidencia->n_serie); ?></p>    
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Nº Unidades</h5>
                                <P  class="text-muted"> <?php echo e($incidencia->n_unidades); ?></p>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Fallo</h5>
                                <p  class="text-muted"><?php echo e($incidencia->fallo); ?></p>
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Tipo</h5>
                                <p  class="text-muted"><?php echo e($incidencia->tipo); ?></p>     
                        </div>
                        <div class="col-6 mb-3">
                            <h5 class="font-weight-bold">Descripción</h5>
                                <p  class="text-muted"><?php echo e($incidencia->descripcion); ?></p>                                                                                                
                        </div>
                    </div>
                </div>
                        <div class="col-12 ">
                            <div class=" bg-dark rounded">
                                <h5 class=" text-light text-center py-2 text-uppercase" >
                                    Archivos adjuntos
                                </h5>
                            </div>
                        <div class="col-12 py-3">
                            <div class="row px-3 ">   
                                <div class="row px-3 ">
                                    <div class="col-4">       
                                        <div>
                                            <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen1)); ?>" alt="<?php echo e($incidencia->imagen1); ?>" class="img-fluid" />                        
                                        </div>
                                    </div>
                                    <div class="col-4">       
                                        <div>
                                            <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen2)); ?>" alt="<?php echo e($incidencia->imagen2); ?>"  class="img-fluid" />                        
                                        </div>
                                    </div>
                                    <div class="col-4">       
                                        <div>
                                            <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen3)); ?>" alt="<?php echo e($incidencia->imagen3); ?>"  class="img-fluid" />                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($incidencia->prioridad != NUll): ?>
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Soluciones
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <div class="row">  
                                <div class="col-6 mb-3"> 
                                    <div class="row"> 
                                        <div class="col-6 mb-3">
                                            <h5 class="font-weight-bold">Fecha</h5>     
                                                <p class="text-muted"><?php echo e($incidencia->fecha_aceptacion); ?> </p> 
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h5  class="font-weight-bold">Fecha limite</h5>     
                                                <p class="text-muted"><?php echo e($incidencia->fecha_limite); ?></p> 
                                        </div>
                                        <div class="col-12 mb-3 ">
                                            <h5 class="font-weight-bold">Prioridad</h5>
                                                <p class="text-muted"> <?php echo e($incidencia->prioridad); ?></p>            
                                        </div>
                                        <div class="col-6 mb-3">
                                            <h5 class="font-weight-bold">Realizado por:</h5>     
                                                <p class="text-muted"><?php echo e($incidencia->realizado_por); ?></p> 
                                        </div>       
                                        <div class="col-6 mb-3">
                                            <h5 class="font-weight-bold">Enviado a:</h5>     
                                                <p class="text-muted"><?php echo e($incidencia->enviado_a); ?></p> 
                                        </div> 
                                    </div>                  
                                </div>
                                <div class="col-6 mb-3">
                                    <h5 class="font-weight-bold">Observaciones</h5>
                                        <p class="text-muted"><?php echo e($incidencia->observaciones); ?></p>                                                  
                                </div>               
                            </div>
                        <div class="row">
                            <div class="col-12">
                                <div class=" bg-dark rounded">
                                    <h5 class="text-light text-center py-2 text-uppercase" >
                                        Acciones
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">  
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Acciones contenedoras</h5>
                                        <p class=" text-muted"><?php echo e($incidencia->a_con); ?></p>                                                                                           
                                </div>
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Análisis</h5>
                                        <p  class=" text-muted"><?php echo e($incidencia->acon_ana); ?></p>                                                      
                                </div>  
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Comentarios</h5>
                                        <p class=" text-muted"><?php echo e($incidencia->acon_com); ?></p>                                                     
                                </div>
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Acciones correctivas</h5>
                                        <p class=" text-muted"><?php echo e($incidencia->a_corr); ?></p>                                                    
                                </div>
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Análisis</h5>
                                        <p class="text-muted"><?php echo e($incidencia->acorr_ana); ?></p>                                                    
                                </div>
                                <div class="col-4 mb-3">
                                    <h5 class="font-weight-bold">Comentarios</h5>
                                        <p class="text-muted"><?php echo e($incidencia->acorr_com); ?></p>                                                  
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php endif; ?>
                </div> 
            </div>            
        </div>   
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/operario/incidencias/show.blade.php ENDPATH**/ ?>