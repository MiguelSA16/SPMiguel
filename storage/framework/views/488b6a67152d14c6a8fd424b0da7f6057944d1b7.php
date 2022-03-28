<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">    
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>    
                <span class="badge badge-danger badge-counter">
                    3+
                </span>
            </a>
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow " aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">                
                    Notificaciones
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <i class="fas fa-exclamation-triangle pr-1" style="font-size: 20px;"></i>
                    </div>
                    <div>
                        <div class="small text-gray-500">Noviembre 17, 2021</div>
                        <span class="font-weight-bold" style="white-space: normal;">Cable defectuoso</span>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">
                    ver todas las notificaciones
                </a>
            </div>

        </li>
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown">    
            <a class="nav-link dropdown-toggle " href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Hola, <b><?php echo e(Auth::user()->name); ?></b> 
                <img class="img-profile rounded-circle" src="<?php echo e(asset('images/profile.jpg')); ?>">
                <span class="caret"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in  mt-1" aria-labelledby="userDropdown">                                
                <a class="dropdown-item" href="/" target="_black" >
                    <i class="fas fa-reply mr-2"></i> 
                    Web
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
    </ul>
        
</nav><?php /**PATH F:\laragon\www\SPMiguel\resources\views/front/componentes/cabecera.blade.php ENDPATH**/ ?>