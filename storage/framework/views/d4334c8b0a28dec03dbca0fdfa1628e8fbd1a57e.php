<div class="container-fluid borde-inferior bg-white ">
    <div class="container">
        <ul class="nav nav-pills nav-fill ">
            <li class="nav-item mr-auto d-none d-sm-block ">
                <a class="nav-link disabled">
                    <i class="fas fa-phone"></i> +34 915 00 79 63
                </a>
            </li>  
            
            <li class="nav-item d-none d-sm-block">
                <a class="nav-link disabled">
                    <i class="fas fa-envelope"></i> comercial@sunprored.es
                </a>
            </li>
              
            <li class="nav-item d-none d-sm-block">		  		
                <a class="redes-sociales" href="#">
                    <i class="fab fa-linkedin"></i>
                </a>	    	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-youtube"></i>
                </a>	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-instagram"></i>
                </a>	
            
                <a class="redes-sociales" href="#">
                    <i class="fab fa-facebook-square"></i>
                </a>
            </li>

                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">                            
                            Hola, <b><?php echo e(Auth::user()->name); ?></b>
                            <img class="img-profile rounded-circle" src="<?php echo e(asset('images/profile.jpg')); ?>" style="width: 30px;">
                            <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in  mt-1" aria-labelledby="userDropdown">       
                            

                        <!-- solo se ve cuando tienes rol cliente  rol 1 => Admin-->
                        <?php if(Auth::user()->role_id == 1): ?>
                            <a class="dropdown-item" href="<?php echo e(route('admin.articulos-alta')); ?>" target="_black" >
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?php echo e(__('Settings')); ?>
                            </a>
                        
                        <!-- rol 3 => Cliente -->
                        <?php elseif(Auth::user()->role_id == 3 && Auth::user()->cliente_id != 0): ?>
                            <a class="dropdown-item" href="cliente/incidencias" target="_black" >
                            <i class="fas fa-user-cog mr-2"></i>
                                Area de cliente
                            </a>
                        <?php endif; ?>

                         <!-- rol 5 => Operario -->
                         <?php if(Auth::user()->role_id == 5): ?>
                            <a class="dropdown-item" href="operario/incidencias" target="_black" >
                            <i class="fas fa-user-cog mr-2"></i>
                                Incidencias
                            </a>
                        <?php endif; ?>
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
                    <li class="nav-item ">
                        <a href="<?php echo e(route('login')); ?>" class="nav-link  text-decoration-none">
                            <i class="fas fa-fingerprint"></i> 
                            <?php echo e(__('Login')); ?>
                        </a>
                    </li>
                    <li class="nav-item ">
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

<?php /**PATH F:\laragon\www\SPMiguel\resources\views/comun/front/cabecera.blade.php ENDPATH**/ ?>