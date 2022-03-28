<?php $__env->startSection('cuerpo'); ?>

    <div class="container-fluid">
        <h2 class=" pb-2">
            Lista de incidencias
        </h2>

        <table class="table table-striped table-sm border-bottom ">
            <thead class="">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Creacion</th>
                    <th scope="col">Fallo</th>
                    <th scope="col">Solución</th>
                    <th scope="col">Fecha entrega</th>
                    <th scope="col" >Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th><?php echo e($incidencia->id); ?></th>
                    <td><?php echo e(\Carbon\Carbon::parse($incidencia->created_at)->diffForHumans()); ?></td>
                    <td><?php echo e($incidencia->fallo); ?></td>
                    <td >
                        <?php if($incidencia->prioridad == null): ?>
                        <button type="button" class="btn btn-secondary btn-sm btn-block w-50">Pendiente</button>

                            
                        <?php else: ?>
                        <button type="button" class="btn btn-success btn-sm btn-block w-50">Solucionando</button>
                        
                            
                        <?php endif; ?>
                    </td>
                    <td >
                        <?php if($incidencia->prioridad == null): ?>
                            Pendiente
                        <?php else: ?>
                            <?php echo e(\Carbon\Carbon::parse($incidencia->fecha_limite)->diffForHumans()); ?> 
                        <?php endif; ?>
                    </td>
                    <td class="">
                        
                    <a href="<?php echo e(url('cliente/incidencias/'.$incidencia->id)); ?>">
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">
                            <i class="far fa-eye mr-1"></i> ver
                        </button>
                    </a>              
                    
                
                    <a href="<?php echo e(url('cliente/incidencias/descargarPDF/'.$incidencia->id)); ?>">
                        <button type="button" class="btn btn-dark btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                            <i class="fas fa-file-pdf mr-1"></i> Descargar
                        </button>
                    </a>
                    <?php if($incidencia->prioridad == null): ?>
                    <a href="<?php echo e(url('cliente/incidencias/'.$incidencia->id.'/edit')); ?>">
                        <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal" data-target="#myModal">
                            <i class="far fa-edit mr-1"></i> editar
                        </button>
                    </a>                     
                   <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </tbody>
           
        </table>

        <?php echo e($incidencias->links()); ?>   
    </div>

           
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/cliente/incidencias/index.blade.php ENDPATH**/ ?>