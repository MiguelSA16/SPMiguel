<!DOCTYPE html>
<html lang="Es-es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title> <?php echo $__env->yieldContent('titulo'); ?> | Sunpro Redes y Sistemas</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
          
       

    </head>
    <body>
        
        <section id="cabecera">
            <?php echo $__env->make('comun.front.cabecera', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('comun.front.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>         
           
        </section>
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <section id="cuerpo">           
            <?php echo $__env->yieldContent('cuerpo'); ?>
            

        </section>

        <section id="pie">
            <?php echo $__env->make('comun.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
        </section>

        
        <!--JS-->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
         
        <script>
            $('div.alert').not('.alert-important').delay(4000).fadeOut(500);
        </script>
        
        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
    </body>
</html><?php /**PATH /home/gj1ldjyb/public_html/laravel/resources/views/layouts/front/vertical.blade.php ENDPATH**/ ?>