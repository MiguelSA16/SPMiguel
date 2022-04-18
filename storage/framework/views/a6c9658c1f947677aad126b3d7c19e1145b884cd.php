<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        
        <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">  
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">  
        
        

        
    </head>
    <body id="page-top" class="sidebar-toggled">
        <div id="app">            
            <div id="wrapper">
                <section id="menu-lateral" class=" bg-gradient-dark">
                    <?php echo $__env->make('comun.admin.menu-lateral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>           
                </section>
                <div id="content-wrapper" class="d-flex flex-column">
                    <div id="content">
                        <section id="menu-superior">
                            <?php echo $__env->make('comun.admin.menu-superior', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </section>
    
                        <section id="cuerpo">                 
                            <div class="container-fluid">
                                <?php echo $__env->yieldContent('cuerpo'); ?>
                            </div>
                        </section>
                    </div>
                    <section id="footer">
                        <?php echo $__env->make('comun.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </section>
                    
                </div>
            </div>

        </div>

       

        <!--JS-->            
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/admin.js')); ?>"></script>
        
       
        
       
    </body>
</html><?php /**PATH F:\laragon\www\SPMiguel\resources\views/layouts/admin/nav-left.blade.php ENDPATH**/ ?>