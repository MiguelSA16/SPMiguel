<?php $__env->startSection('cuerpo'); ?>



    <table class="table table-striped table-sm ">
        <thead class="">
            <tr>
                <th scope="col">#ID</th>
                <th scope="col">Creacion</th>
                <th scope="col">Fallo</th>
                <th scope="col">Solución</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Fecha entrega</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th><?php echo e($incidencia->id); ?></th>
                <td><?php echo e($incidencia->fecha); ?></td>
                <td><?php echo e($incidencia->fallo); ?></td>
                <td>
                    <?php if($incidencia->prioridad == null): ?>
                        Pendiente
                    <?php else: ?>
                        Solucionando
                    <?php endif; ?>
                </td>
                <td>
                    <?php if($incidencia->prioridad == null): ?>
                        Pendiente
                    <?php else: ?>
                        <?php echo e($incidencia->prioridad); ?>

                    <?php endif; ?>
                </td>
                <td><?php echo e($incidencia->descripcion); ?></td>
                <td>
                <a href="<?php echo e(url('cliente/incidencias-cliente/editar/'.$incidencia->id)); ?>">
                <!--<a href="<?php echo e(url('cliente/incidencias-cliente/editar')); ?>">-->
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                        editar
                    </button>
                </a>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </tbody>
       
    </table>
    <?php echo e($incidencias->links()); ?> 
         
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/cliente/incidencias/incidencias-usuario.blade.php ENDPATH**/ ?>