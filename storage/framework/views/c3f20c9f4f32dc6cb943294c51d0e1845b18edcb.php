<?php $__env->startSection('cuerpo'); ?>



    <table class="table table-striped table-sm ">
        <thead class="">
            <tr>
                <th scope="col">#incidencia</th>
                <th scope="col">fecha</th>
                <th scope="col">asunto</th>
                <th scope="col">descripcion</th>
                <th scope="col">acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $incidencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incidencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row"><?php echo e($incidencia->id); ?></th>
                <td><?php echo e($incidencia->fecha); ?></td>
                <td><?php echo e($incidencia->asunto); ?></td>
                <td><?php echo e($incidencia->descripcion); ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal">
                        editar
                    </button>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
        </tbody>
    </table>

    <div class="modal" tabindex="-1" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

     
   
        
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.incidencia.incidencia', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/front/clientes/incidencias/incidencias-usuario.blade.php ENDPATH**/ ?>