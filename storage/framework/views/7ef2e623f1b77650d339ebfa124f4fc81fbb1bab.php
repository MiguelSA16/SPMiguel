<?php $__env->startSection('cuerpo'); ?>
        <div class="container-fluid">                    
            <div class="modal-content">
                <div class="modal-body">
                    <form class="needs-validation " novalidate action="<?php echo e(url('operario/incidencia/update/'.$incidencia->id)); ?>" method="POST" enctype="multipart/form-data"> 
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>         
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase">
                                        Registro incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3 ">
                                    <div class="col-4 mb-3">
                                        <label for="validationTooltip01">Referencia</label>
                                        <select class="custom-select custom-select " value="<?php echo e($incidencia->referencia); ?>" name="referencia" required>
                                        <option value="<?php echo e($incidencia->referencia); ?>"> <?php echo e($incidencia->referencia); ?> - <?php echo e(nombreArticulo($incidencia->referencia)); ?></option>  
                                           <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($item->codigo); ?>"><?php echo e($item->codigo); ?> - <?php echo e($item->nombre); ?></option>    
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                
                                        </select>                      
                                        <div class="invalid-feedback">
                                            Porfavor introduce la referencia.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">N?? serie</label>
                                        <input type="text" class="form-control"  value="<?php echo e($incidencia->n_serie); ?>" name="n_serie" id="validationTooltip02"  >
                                        <div class="valid-feedback">
                                            N?? Serie no es requerido
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip01">N?? Unidades</label>
                                        <input type="number" class="form-control" id="validationTooltip01" name="n_unidades" value="<?php echo e($incidencia->n_unidades); ?>">
                                        <div class="invalid-feedback">
                                            Porfavor introduce la N?? Unidas.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">Fecha</label>
                                        <input type="text" class="form-control" value="<?php echo e($incidencia->fecha); ?>" name="fecha" id="validationTooltip02" >
                                        <div class="invalid-feedback">
                                            Porfavor introduce fecha de creacion.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <fieldset >
                                            <label for="validationTooltip02">N?? Incidencia </label>
                                            <input type="text" class="form-control " value="<?php echo e($incidencia->id); ?>" id="validationTooltip02" disabled >
                                            <div class="valid-feedback">
                                                N?? Incidencia no es requerido
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>                        
                            </div>
                        </div> 
                        <div class="row">
                            <div class=" col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Descripci??n  incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3">
                                    <div class=" col-12">
                                        <div class="row ">
                                            <div class="col-4 mb-3">
                                            <label for="validationTooltip02">Cliente</label>
                                            <input type="text" class=" form-control" name="cliente_id" value="<?php echo e(nombreCliente($incidencia->cliente_id)); ?>"  disabled>
                                             
                                            <div class="invalid-feedback">
                                                Porfavor introduce Proveedor/Cliente.
                                            </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Fallo</label>
                                                <input type="text" class="form-control" name="fallo" id="validationTooltip02" value="<?php echo e($incidencia->fallo); ?>">
                                                <div class="valid-feedback">
                                                    Fallo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Tipo</label>
                                                <input type="text" class="form-control" name="tipo" id="validationTooltip02" value="<?php echo e($incidencia->tipo); ?>">
                                                <div class="valid-feedback">
                                                    Tipo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="exampleFormControlTextarea1">Descripci??n</label>
                                                <textarea class="form-control " name="descripcion" id="exampleFormControlTextarea1" rows="3"  ><?php echo e($incidencia->descripcion); ?></textarea>                                                
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Descripci??n.
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
                                    <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen1)); ?>" alt="<?php echo e($incidencia->imagen1); ?>"  style="width: 100px;height:100px;" />  <br>            
                                    <div>        
                                        <label for="validationTooltip01">Adjunto 1</label>
                                            <div class="custom-file">
                                            <input type="file" class="form-control-file"  value="<?php echo e($incidencia->imagen1); ?>" name="imagen1">
                                                <div class="valid-feedback">
                                                    Adjunto 1 no es requerido
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen2)); ?>" alt="<?php echo e($incidencia->imagen2); ?>"  style="width: 100px;height:100px;" />            
                                        <div>    
                                            <label for="validationTooltip01">Adjunto 2</label>
                                            <div class="custom-file">
                                            <input type="file" class="form-control-file"  value="<?php echo e($incidencia->imagen2); ?>" name="imagen2">
                                                
                                                <div class="valid-feedback">
                                                    Adjunto 2 no es requerido
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                    <div class="col-md-4 mb-3">
                                    <img src="<?php echo e(asset('images/incidencias/'.$incidencia->imagen3)); ?>" alt="<?php echo e($incidencia->imagen3); ?>"  style="width: 100px;height:100px;" />  <br>            
                                        <div>    
                                            <label for="validationTooltip01">Adjunto 3</label>
                                            <div class="custom-file">
                                            
                                            <input type="file" class="form-control-file" value="<?php echo e($incidencia->imagen3); ?>" name="imagen3">
                                                <div class="valid-feedback">
                                                    Adjunto 3 no es requerido
                                                </div>
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





<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/operario/incidencias/editar.blade.php ENDPATH**/ ?>