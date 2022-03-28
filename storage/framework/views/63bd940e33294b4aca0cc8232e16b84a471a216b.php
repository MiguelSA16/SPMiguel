<nav id="sidebarMenu" class=" d-md-block sidebar collapse bg-dark " >
    <div class="sidebar-sticky pt-3">
        <div class=" pb-3">
            <a class="sidebar-brand d-flex align-items-center justify-content-center text-light" href="/admin" >
                <img src="<?php echo e(asset('images/favicon.png')); ?>" style="width: 40px;">
                
                <div class="sidebar-brand-text mx-3">
                    Sunprored
                    <small class=" d-block">
                        v1.0
                    </small>
                </div>
            </a>       
        </div>
        <hr class="sidebar-divider">

        
        <h6 class="sidebar-heading d-flex justify-content-between text-center text-light " style="font-size: 0.85rem;">            
            <span class="fs-4 mb-2">     
                <i class="fas fa-exclamation-triangle pr-1"></i>       
                Incidencias
            </span>
        </h6>
    <?php if(Auth::user()->role_id == 3): ?>
        <ul class="nav flex-column mb-2 ">
            <li >
                <a class="nav-link" href="<?php echo e(route('cliente.incidencias')); ?>" >  
                    <button type="button" class="btn btn-outline-light btn-block">
                        <i class="fas fa-list-ul"></i>
                        Ver incidencias
                    </button>              
                </a>
            </li>
            <li >
                <a class="nav-link" href="<?php echo e(route('cliente.incidencias.create')); ?>">
                    <button type="button" class="btn btn-outline-light btn-block ">
                        <i class="fas fa-plus-circle"></i>
                        Crear incidencia
                    </button>              
                </a>
            </li>        
        </ul>
    <?php endif; ?>

    <?php if(Auth::user()->role_id == 5): ?>
        <ul class="nav flex-column mb-2 ">
            <li >
                <a class="nav-link" href="<?php echo e(route('operario.incidencias')); ?>" > 
                    <button type="button" class="btn btn-outline-light btn-block">
                        <i class="fas fa-list-ul"></i>
                        Ver incidencias
                    </button>              
                </a>
            </li>
            <li >
                <a class="nav-link" href="<?php echo e(route('operario.incidencias.create')); ?>">
                    <button type="button" class="btn btn-outline-light btn-block ">
                        <i class="fas fa-plus-circle"></i>
                        Crear incidencia
                    </button>              
                </a>
            </li>               
        </ul>
    <?php endif; ?>
      </div>
    </nav><?php /**PATH F:\laragon\www\SPMiguel\resources\views/front/componentes/menu-lateral.blade.php ENDPATH**/ ?>