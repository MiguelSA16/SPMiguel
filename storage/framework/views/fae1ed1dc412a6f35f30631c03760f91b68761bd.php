<?php $__env->startSection('cuerpo'); ?>

    <div class="container-fluid">
        
        <form action="<?php echo e(url('operario/incidencias')); ?>" method="GET">
            <div class="row pb-4">
                <div class="col-3 pb-3">
                    <label class="col-form-label col-form-label-sm">Prioridad</label>
                    <select name="prioridad" class=" form-control form-control-sm text-uppercase" >
                        <?php if(Request::get('prioridad') == ''): ?>
                            <option value="" >Seleccionar prioridad</option>
                        <?php else: ?>
                            <option value="<?php echo e(Request::get('prioridad')); ?>" ><?php echo e(Request::get('prioridad')); ?></option>
                            <option class=" form-control" value="">Mostrar todas</option>
                        <?php endif; ?>
                            <option value="Baja">Baja</option>
                            <option value="Media">Media</option>
                            <option value="Alta">Alta</option>
                    </select>
                </div>
                <div class="col-3 pb-3">
                    <label class="col-form-label col-form-label-sm">Cliente </label>
                    <select name="cliente" class=" form-control form-control-sm text-uppercase" >
                            <?php if(Request::get('cliente') == ''): ?>
                                <option class=" form-control" value="">Selecciona un cliente</option>
                            <?php else: ?>
                                <option value="<?php echo e(Request::get('cliente')); ?>"><?php echo e(nombreCliente(Request::get('cliente'))); ?></option> 
                                <option class=" form-control" value="">Mostrar todos</option>
                            <?php endif; ?>
                                
                            <?php $__currentLoopData = $clientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cliente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cliente->cliente_id); ?>"><?php echo e(nombreCliente($cliente->cliente_id)); ?></option>    
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>                    
                </div>
                
                <div class="col-3 pb-3">
                    <label class="col-form-label col-form-label-sm">Estado </label>
                    <select name="solucionado" class=" form-control form-control-sm text-uppercase">
                        <?php if(Request::get('solucionado') == ''): ?>
                            <option value="" >Seleccionar estado</option>
                        <?php else: ?>
                            <option value="<?php echo e(Request::get('solucionado')); ?>" ><?php echo e(Request::get('solucionado')); ?></option>
                            <option class=" form-control" value="">Mostrar todas</option>
                        <?php endif; ?>
                        <option class=" form-control" value="solucionado">solucionado</option>
                        <option class=" form-control" value="pendiente">pendiente</option>      
                        
                              
                    </select>                    
                </div>
                <div class="col-12">
                    <button  class=" btn btn-primary btn-sm " type="submit">Buscar</button>
                </div>
                
           
                
                
                
            </div>
        </form>    

        <h2 class=" pb-2">
            Lista de incidencias
        </h2>
        

        <table class="table table-striped table-sm border-bottom ">
            <thead class="">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Creacion</th>
                    <th scope="col">Creado por</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Solucionado por</th>
                    <th scope="col">Fallo</th>
                    <th scope="col">Prioridad</th>
                    <th scope="col">Fecha entrega</th>
                    <th scope="col">Incidencia</th>
                    <th scope="col">Resolver</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><?php echo e($incidencia->id); ?></th>
                    <td>
                        <span class=" text-capitalize"><?php echo e(\Carbon\Carbon::parse($incidencia->created_at)->diffForHumans()); ?></span>
                    </td>
                    <td>

                    </td>
                    <td>
                        <button type="button" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="top"  title="<?php echo e(nombreCliente($incidencia->cliente_id)); ?>">
                            <?php echo e(nombreClientex($incidencia->cliente_id)); ?>...
                        </button> 
                    </td>
                    <td>
                    <?php if($incidencia->prioridad == null): ?>
                        Pendiente</button>                            
                    <?php else: ?>
                        <button type="button" class="btn btn-success btn-sm btn-block w-50 text-capitalize"><?php echo e($incidencia->realizado_por); ?></button>                      
                    <?php endif; ?>                        
                    </td>
                    <td><?php echo e($incidencia->fallo); ?></td>
                   
                    
                    <td>
                    <?php if($incidencia->prioridad == 'Baja'): ?>
                        <button type="button" class="btn btn-info btn-sm btn-block w-75 text-capitalize"><?php echo e($incidencia->prioridad); ?></button>
                    <?php elseif($incidencia->prioridad == 'Media'): ?>
                        <button type="button" class="btn btn-warning btn-sm btn-block w-75 text-capitalize"><?php echo e($incidencia->prioridad); ?></button> 
                    <?php elseif($incidencia->prioridad == 'Alta'): ?>
                        <button type="button" class="btn btn-danger btn-sm btn-block w-75 text-capitalize"><?php echo e($incidencia->prioridad); ?></button> 
                    <?php elseif($incidencia->prioridad == NUll): ?>
                        <button type="button" class="btn btn-secondary btn-sm btn-block w-75 text-capitalize">pendiente</button> 
                    <?php endif; ?>
                    </td>
                    <td>
                        <?php if($incidencia->prioridad == 'pendiente'): ?>
                            Pendiente
                        <?php else: ?>
                            <span class=" text-capitalize"><?php echo e(\Carbon\Carbon::parse($incidencia->fecha_limite)->diffForHumans()); ?></span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(url('operario/incidencias/'.$incidencia->id)); ?>">
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">
                                <i class="far fa-eye mr-1"></i> Ver
                            </button>
                        </a>
                        
                        <a href="<?php echo e(url('operario/incidencias/descargarPDF/'.$incidencia->id)); ?>">
                            <button type="button" class="btn btn-dark btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                                <i class="fas fa-file-pdf mr-1"></i> Descargar
                            </button>
                        </a>                        
                        <?php if($incidencia->prioridad == null): ?>
                            <a href="<?php echo e(url('operario/incidencias/'.$incidencia->id.'/edit')); ?>">
                                <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                                    <i class="far fa-edit mr-1"></i> Editar
                                </button>
                            </a>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?php echo e(url('operario/incidencias/solucionar/'.$incidencia->id)); ?>">
                            <button type="button" class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                                <i class="far fa-edit mr-1"></i> Solucionar 
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </tbody>
           
        </table>

        <?php echo e($incidencias->links()); ?>   
    </div>

           
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/operario/incidencias/index.blade.php ENDPATH**/ ?>