<?php $__env->startSection('cuerpo'); ?>

    <div class="container-fluid">               
        <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="needs-validation " novalidate action="<?php echo e(route('cliente.guardar-incidencia-cliente')); ?>"   method="POST"> 
                        <?php echo csrf_field(); ?>         
                        <div class="row">
                            <div class="col-12 ">
                                <div class=" bg-dark rounded">
                                    <h5 class=" text-light text-center py-2 text-uppercase" >
                                        Descripción  incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3 ">
                                    <div class="col-3 mb-3">
                                        <label for="validationTooltip01">Referencia</label>
                                        <select class="custom-select custom-select " name="referencia" required>
                                            <option value="">Open this select menu</option>
                                            <?php $__currentLoopData = $articulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="1"><?php echo e($item->codigo); ?> - <?php echo e($item->nombre); ?></option>    
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
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip01">Nº Unidades</label>
                                        <input type="number" class="form-control" id="validationTooltip01"  required>
                                        <div class="invalid-feedback">
                                            Porfavor introduce la Nº Unidas.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationTooltip02">Fecha</label>
                                        <input type="date" class="form-control" name="fecha" id="validationTooltip02" required>
                                        <div class="invalid-feedback">
                                            Porfavor introduce fecha de creacion.
                                        </div>
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <fieldset disabled>
                                            <label for="validationTooltip02">Nº Incidencia</label>
                                            <input type="text" class="form-control disabled" id="validationTooltip02" >
                                            <div class="valid-feedback">
                                                Nº Incidencia no es requerido
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
                                        Descripción  incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3">
                                    <div class=" col-6 ">
                                        <div class="row ">
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Proveedor/Cliente</label>
                                                <select id="clientes" class="custom-select custom-select" name="nom_cliente" required>
                                                    <option value="">Cliente</option>
                                                    <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->nombre); ?>"><?php echo e($item->clacli); ?>-<?php echo e($item->nombre); ?></option>                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                                                                            
                                                </select>   
                                                <div class="invalid-feedback">
                                                    Porfavor introduce Proveedor/Cliente.
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Nº proveedor/cliente</label>
                                                <input type="text" class="form-control " id="validationTooltip02" value="" >
                                                <div class="valid-feedback">
                                                    Nº proveedor/cliente no es requerido
                                                </div>
                                            </div>

                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Fallo</label>
                                                <input type="text" class="form-control" id="validationTooltip02">
                                                <div class="valid-feedback">
                                                    Fallo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Tipo</label>
                                                <input type="text" class="form-control " id="validationTooltip02" >
                                                <div class="valid-feedback">
                                                    Tipo no es requerido
                                                </div>
                                            </div>
                                            <div class="col-12 mb-3">
                                                <label for="exampleFormControlTextarea1">Descripción</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3" name="descripcion" required></textarea>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Descripción.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" col-6">
                                        <div class="row ">
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Fecha aceptación</label>
                                                <input type="date" class="form-control" id="validationTooltip02" required>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Fecha aceptación.
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Fecha limite</label>
                                                <input type="date" class="form-control" id="validationTooltip02" required>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Fecha limite.
                                                </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Prioridad</label>
                                                <select class="custom-select custom-select " required>
                                                    <option value="">Prioridad</option>
                                                    <option value="baja">Baja</option>
                                                    <option value="media">Media</option>
                                                    <option value="alta">Alta</option>
                                                                                            
                                                </select>                      
                                                <div class="invalid-feedback">
                                                    Porfavor introduce la Prioridad.
                                                </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Realizado por</label>
                                                <input type="text" class="form-control" id="validationTooltip02" required>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce una Operario.
                                                </div>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label for="validationTooltip02">Enviado a</label>
                                                <input type="text" class="form-control" id="validationTooltip02" required>
                                                <div class="invalid-feedback">
                                                    Porfavor introduce a quien se le envia.
                                                </div>
                                            </div>                        
                                            <div class="col-12 mb-3">
                                                <label for="validationTooltip02">Observacion</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <div class="valid-feedback">
                                                    Observacion no es requerido
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
                                            <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" >
                                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
                                            <div class="valid-feedback">
                                                Adjunto 1 no es requerido
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip01">Adjunto 2</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input"  >
                                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
                                            <div class="valid-feedback">
                                                Adjunto 2 no es requerido
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="validationTooltip01">Adjunto 3</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" >
                                            <label class="custom-file-label" for="validatedInputGroupCustomFile">Choose file...</label>
                                            <div class="valid-feedback">
                                                Adjunto 3 no es requerido
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
                                        Acciones incidencia
                                    </h5>
                                </div>
                            </div>
                            <div class="col-12 py-3">
                                <div class="row px-3">
                                    <div class="col-6">
                                        <div class="row ">
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Accciones contenedoras</label>
                                                <input type="text" class="form-control" id="validationTooltip02">
                                                <div class="valid-feedback">
                                                    Accciones contenedora no es requerido
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Fecha implementacion</label>
                                                <input type="text" class="form-control" id="validationTooltip02">
                                                <div class="valid-feedback">
                                                    Fecha implementacion no es requerido
                                                </div>
                                            </div>
                                            <div class=" col-12 mb-3">
                                                <label for="validationTooltip02">Analisis</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <div class="valid-feedback">
                                                    Analisis no es requerido
                                                </div>
                                            </div>
                                            <div class=" col-12">
                                                <label for="validationTooltip02">Comentario</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <div class="valid-feedback">
                                                    Comentario no es requerido
                                                </div>
                                            </div>
                                        </div>    
                                    </div>

                                    <div class="col-6">
                                        <div class="row ">
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Accciones correctoras</label>
                                                <input type="text" class="form-control" id="validationTooltip02">
                                                <div class="valid-feedback">
                                                    Accciones correctoras no es requerido
                                                </div>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label for="validationTooltip02">Fecha implementacion</label>
                                                <input type="text" class="form-control" id="validationTooltip02" >
                                                <div class="valid-feedback">
                                                    Fecha implementacion no es requerido
                                                </div>
                                            </div>
                                            <div class=" col-12 mb-3">
                                                <label for="validationTooltip02">Analisis</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <div class="valid-feedback">
                                                    Analisis no es requerido
                                                </div>
                                            </div>
                                            <div class=" col-12 mb-3">
                                                <label for="validationTooltip02">Comentario</label>
                                                <textarea class="form-control " id="exampleFormControlTextarea1" rows="3"></textarea>
                                                <div class="valid-feedback">
                                                    Comentario no es requerido
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
    </div>
        

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/clientes/incidencias/crear.blade.php ENDPATH**/ ?>