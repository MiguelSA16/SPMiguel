<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-TT59N7D');</script>
        <!-- End Google Tag Manager -->
    
        <!-- Google Recaptcha V3-->
        <script src="https://www.google.com/recaptcha/api.js?render=6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH"></script>
    <script>
        $(document).ready(function(){
            $('#butonRegistro').click(function(){
                grecaptcha.ready(function() {
                    grecaptcha.execute('6Ld84mQfAAAAAJKRPE3Ch6MrchF6DPJtm22Dq3WH',{
                        action: 'validarRegistro'
                    }).then(function(token) {
                        $('#form-registro').prepend('<input type="hidden" name="token" value="' + token + '" >'); 
                        $('#form-registro').prepend('<input type="hidden" name="action" value="validarRegistro" >');
                        $('#form-registro').submit();
                    });
                });
            })
        })
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>" class=" titulo">                 
                    <img src="<?php echo e(asset('images/favicon.png')); ?>" alt="Sunpro Redes y Sistemas" class="favicon">
                    Sunpro Redes y Sistemas
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">     
                    <ul class=" nav ml-auto">
                        <?php if(Route::has('login')): ?>
                            <?php if(auth()->guard()->check()): ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    Hola, <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                                </a>  
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">                                
                                    <a class="dropdown-item" href="#">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>
                                    <a class="dropdown-item" href="<?php echo e(route('admin.articulos-alta')); ?>" target="_black" >
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <?php echo e(__('Settings')); ?>

                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item"  href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        <?php echo e(__('Logout')); ?>

                                    </a>
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                            <?php else: ?>
                            <li class="nav-item">
                                <a href="<?php echo e(route('login')); ?>" class="nav-link  text-decoration-none">
                                    <i class="fas fa-fingerprint"></i> 
                                    <?php echo e(__('Login')); ?>

                                </a>
                            </li>
                            <li class="nav-item">
                                <?php if(Route::has('register')): ?>
                                <a href="<?php echo e(route('register')); ?>" class="nav-link text-decoration-none">
                                    <i class="fas fa-user-plus"></i>
                                    <?php echo e(__('Register')); ?>

                                </a>
                                <?php endif; ?>
                            </li>          
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class=" container pt-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
        </div>
        
        <main class="pb-4 pt-2">            
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
    <!--JS-->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
</body>
</html>


<?php /**PATH F:\laragon\www\SPMiguel\resources\views/layouts/app.blade.php ENDPATH**/ ?>