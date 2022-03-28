<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" id="login">
            <div class="card">
                <div class="card-header text-center">
                    BIENVENIDO
                </div>

                <div class="card-body">                    
                    <?php if(session('status')): ?>
                        <div class="alert alert-success " role="alert" >                        
                            <?php echo e(session('status')); ?>
                        </div>
                    <?php endif; ?>

                    <?php if(Auth::user()->role->nombre == 'admin'): ?>
                        <?php echo e('eres un adminstrador'); ?>                       
                    <?php else: ?>
                    ¡Estás conectado!
                    <?php endif; ?>                        
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\laragon\www\SunproPrivado\resources\views/home.blade.php ENDPATH**/ ?>