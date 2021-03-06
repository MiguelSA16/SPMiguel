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
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-TT59N7D');</script>
    <!-- End Google Tag Manager -->
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TT59N7D"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
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
        <div class="aviso-cookies" id="aviso-cookies">
            <img class="galleta" src="<?php echo e(asset('images/cookie.svg')); ?>" alt="Galleta">
            <h3 class="titulo">Cookies</h3>
            <p class="parrafo">Utilizamos cookies propias y de terceros para mejorar nuestros servicios.</p>
            <button class="boton" id="btn-aceptar-cookies">De acuerdo</button>
            <a class="enlace" href="aviso-cookies.html">Aviso de Cookies</a>
        </div>
        <div class="fondo-aviso-cookies" id="fondo-aviso-cookies"></div>
    
    </section>
   
   

    <!--JS-->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/aviso-cookies.js')); ?>"></script>

    <script>
        $('div.alert').not('.alert-important').delay(4000).fadeOut(500);
    </script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>
<?php /**PATH F:\laragon\www\SPMiguel\resources\views/layouts/front/vertical.blade.php ENDPATH**/ ?>