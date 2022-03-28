<?php $__env->startSection('cuerpo'); ?>   

    <div class="container-fluid">               
        
        <div class="modal-content">
            <div class="modal-body">                            
                <form class="needs-validation " novalidate action="<?php echo e(route('operario.incidencias')); ?>" method="POST" enctype="multipart/form-data"> 
                    <?php echo csrf_field(); ?>         
                    <div class="row">
                        <div class="col-12 ">
                            <div class=" bg-dark rounded">
                                <h5 class=" text-light text-center py-2 text-uppercase" >
                                    Registro incidencia
                                </h5>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <div class="row px-3 ">
                                <div class="col-3 mb-3">
                                    <label for="validationTooltip01">Referencia</label>
                                    <select class="custom-select custom-select " name="referencia" required>
                                        <option value="">Seleccione una referencia</option>
                                        <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->codigo); ?>"><?php echo e($item->codigo); ?> - <?php echo e($item->nombre); ?></option>    
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                    </select>                      
                                    <div class="invalid-feedback">
                                        Porfavor introduce la referencia.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip02">Nº serie</label>
                                    <input type="text" class="form-control" name="n_serie" id="validationTooltip02"  >
                                    <div class="valid-feedback">
                                        Nº Serie no es requerido
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip01">Nº Unidades</label>
                                    <input type="number" class="form-control" id="validationTooltip01" name="n_unidades" >
                                    <div class="invalid-feedback">
                                        Porfavor introduce la Nº Unidas.
                                    </div>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationTooltip02">Fecha</label>
                                    <input type="text" class="form-control" value="<?php echo e(date('Y-m-d')); ?>" id="validationTooltip02" disabled>                                    
                                </div>
                            </div>                        
                        </div>
                    </div>                 
                    <div class="row">
                        <div class=" col-12 ">
                            <div class=" bg-dark rounded">
                                <h5 class=" text-light text-center py-2 text-uppercase" >
                                    Descripción  incidencia
                                </h5>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <div class="row px-3">
                                <div class=" col-12">
                                    <div class="row ">
                                        <div class="col-4 mb-3">
                                            <label for="validationTooltip02">Cliente</label>
                                            <select id="clientes" class="custom-select custom-select" name="cliente_id" required>
                                                <option value="">Cliente</option>
                                                <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($item->clacli); ?>"><?php echo e($item->nombre); ?></option>                                                        
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                            
                                            </select>   
                                            <div class="invalid-feedback">
                                                Porfavor introduce Proveedor/Cliente.
                                            </div>
                                        </div>
                                       

                                        <div class="col-4 mb-3">
                                            <label for="validationTooltip02">Fallo</label>
                                            <input type="text" class="form-control" name="fallo" id="validationTooltip02">
                                            <div class="valid-feedback">
                                                Fallo no es requerido
                                            </div>
                                        </div>
                                        <div class="col-4 mb-3">
                                            <label for="validationTooltip02">Tipo</label>
                                            <input type="text" class="form-control" name="tipo" id="validationTooltip02" >
                                            <div class="valid-feedback">
                                                Tipo no es requerido
                                            </div>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="exampleFormControlTextarea1">Descripción</label>
                                            <textarea class="form-control " name="descripcion" id="exampleFormControlTextarea1" rows="3" name="descripcion" required></textarea>
                                            <div class="invalid-feedback">
                                                Porfavor introduce una Descripción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12 ">
                            <div class=" bg-dark rounded">
                                <h5 class=" text-light text-center py-2 text-uppercase" >
                                    Archivos adjuntos
                                </h5>
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <div class="row px-3">                    
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">Adjunto 1</label>
                                    <div class="custom-file">
                                                         
                                        <input type="file" class="form-control-file"  name="imagen1">
                                        
                                        <div class="valid-feedback">
                                            Adjunto 1 no es requerido
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">Adjunto 2</label>
                                    <div class="custom-file">
                                    <input type="file" class="form-control-file"  name="imagen2">
                                        
                                        <div class="valid-feedback">
                                            Adjunto 2 no es requerido
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationTooltip01">Adjunto 3</label>
                                    <div class="custom-file">
                                    <input type="file" class="form-control-file" name="imagen3">
                                        <div class="valid-feedback">
                                            Adjunto 3 no es requerido
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row px-3 pb-4">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block" type="submit">Guardar incidencia</button>
                        </div>
                    </div>

                    

                    
                </form>
            </div>            
        </div>
   
</div>
    
        

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/operario/incidencias/crear.blade.php ENDPATH**/ ?>