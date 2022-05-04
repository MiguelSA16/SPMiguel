<!DOCTYPE html>


<html lang="Es-es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title> <?php echo $__env->yieldContent('titulo'); ?> | Sunpro Redes y Sistemas</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">    

        <!--Bootstrap-->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>"> 
        <script>
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-TT59N7D');
        </script>
        <!-- End Google Tag Manager -->
    
        <!-- Google Recaptcha V3-->
        <script src="https://www.google.com/recaptcha/api.js?render=6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH"></script>
    </head>
    <body>
        <section id="cabecera">      
            <?php echo $__env->make('comun.front.cabecera', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('comun.front.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
            <?php echo $__env->make('comun.front.camino-migas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
        <section id="cuerpo">
            <div class="container-fluid bg-white">             
                <div class="container ">
                    <div class="row">
                        <div class="col-12 col-sm-3 d-none d-sm-block border-right p-0">
                            <?php echo $__env->make('comun.front.menu-lateral', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                              
                        </div>
                        <div class="col-12 col-sm-9">
                            <?php echo $__env->yieldContent("cuerpo"); ?>                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="pie">
            <?php echo $__env->make('comun.front.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </section>
        <!--JS-->
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    </body>
</html><?php /**PATH C:\laragon\www\SPMiguel\resources\views/layouts/front/nav-left.blade.php ENDPATH**/ ?>