<ul class="navbar-nav sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15 ">
            <img src="<?php echo e(asset('images/favicon.png')); ?>" style="width: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">
            Sunprored
            <small class=" d-block">
                v1.0
            </small>
        </div>
    </a>
    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link " href="<?php echo e(url('/admin')); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span class=" active">Inicio</span>
        </a>
    </li>
    <hr class="sidebar-divider">
    
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item ">
        <a class="nav-link collapsed" href="<?php echo e(url('admin/users')); ?>">
            <i class="fas fa-users-cog"></i>
            <span>Usuarios</span>
        </a>

    </li>

    <li class="nav-item <?php echo e(setActive('admin.articulos-alta')); ?> <?php echo e(setActive('admin.articulos-baja')); ?> <?php echo e(setActive('admin.articulos-stock')); ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArticulos" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-puzzle-piece"></i>
            <span>Articulos</span>
        </a>
        <div id="collapseArticulos" class=" collapse " 
            aria-labelledby="headingPages" data-parent="#accordionSidebar" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">
                    Listar Articulos:
                </h6>
                <a class="collapse-item bg-dark text-center text-white py-1 mb-1 <?php echo e(setActive('admin.articulos-stock')); ?>" 
                    href="<?php echo e(url('admin/articulos/stock')); ?>">	
                    ARTICULOS CON STOCK
                </a>
                <a class="collapse-item bg-success text-center text-white py-1 mb-1 <?php echo e(setActive('admin.articulos-alta')); ?>" 
                    href="<?php echo e(url('admin/articulos/alta')); ?>">	
                    ARTICULOS DE ALTA
                </a>
                <a class="collapse-item bg-danger text-center text-white py-1 mb-2 <?php echo e(setActive('admin.articulos-baja')); ?>" 
                    href="<?php echo e(url('admin/articulos/baja')); ?>">	
                    ARTICULOS DE BAJA
                </a> 
                <a class="collapse-item bg-info text-center text-white py-1 mb-2 <?php echo e(setActive('admin.articulos-fabricacion')); ?>" 
                    href="<?php echo e(url('admin/articulos/fabricacion')); ?>">	
                    ARTICULOS DE FABRICACION
                </a>                
            </div>
        </div>
    </li>

    <li class="nav-item <?php echo e(setActive('admin.familias')); ?> ">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFamilias" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-align-left"></i>
                <span>Familias</span>
            </a>
            <div id="collapseFamilias" class=" collapse  " 
                aria-labelledby="headingPages" data-parent="#accordionSidebar" >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">
                        Listar Familias:
                    </h6>
                    <a class="collapse-item bg-success text-center text-white py-1 mb-1 <?php echo e(setActive('admin.familias')); ?>" 
                        href="<?php echo e(url('admin/familias')); ?>">	
                        FAMILIAS
                    </a>             
                </div>
            </div>
        </li>

    <hr class="sidebar-divider">  

    <div class="sidebar-heading">
        Utilidades
    </div>
    
    <li class=" nav-item <?php echo e(setActive('admin.agrupar')); ?> <?php echo e(setActive('admin.updTableFamilia')); ?> <?php echo e(setActive('admin.upTableArticulo')); ?> 
        <?php echo e(setActive('admin.upTableAlmacen')); ?>  <?php echo e(setActive('admin.upTableSunpro')); ?>">   

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHerramientas" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Herramientas</span>
        </a>
        <div id="collapseHerramientas" 
            class="collapse "
            aria-labelledby="headingPages" 
            data-parent="#accordionSidebar"
        >

            <div class="bg-white py-2 collapse-inner rounded">
            <!-- 
                <h6 class="collapse-header">
                    Imagenes:
                </h6>
                <a class="collapse-item bg-warning py-1 mb-1 text-center" href="<?php echo e(url('admin/imagenes/cargar')); ?>">	
                    CARGAR IMAGENES
                </a> 
            -->
            <!--Herramientas Articulos-->
                <h6 class="collapse-header">
                    Articulos
                </h6>
                <a class="collapse-item bg-dark text-white py-1 mb-1 <?php echo e(setActive('admin.agrupar')); ?>" 
                    href="<?php echo e(route('admin.agrupar')); ?>"
                >	
                    AGRUPAR ARTICULOS
                </a>
                <a class="collapse-item bg-success text-white py-1 mb-2  text-uppercase <?php echo e(setActive('admin.upTableArticulo')); ?>" 
                    href="<?php echo e(route('admin.upTableArticulo')); ?>"
                >	
                    actual. articulos
                </a>
            <!--
                <a class="collapse-item bg-warning py-1 mb-2  text-uppercase <?php echo e(setActive('admin.upTableSunpro')); ?>" 
                    href="<?php echo e(route('admin.upTableSunpro')); ?>"
                >	
                    articulos sunpro
                </a>
            -->
            
            <!--FIN Herramientas Articulos-->

            <!--Herramientas Familias-->
                <h6 class="collapse-header">
                    Familias
                </h6>
            
                <a class="collapse-item bg-success text-white py-1 mb-2 text-uppercase <?php echo e(setActive('admin.updTableFamilia')); ?>" 
                    href="<?php echo e(route('admin.updTableFamilia')); ?>"
                >	
                    actual. familias
                </a>
            <!--
                <a class="collapse-item bg-warning py-1 mb-2 text-uppercase <?php echo e(setActive('admin.upTableFamSunpro')); ?>" 
                    href="<?php echo e(route('admin.upTableFamSunpro')); ?>"
                >	
                    familias sunpro
                </a>
            -->
            <!--Fin Herramientas Familias-->

            <!--Herramientas Movimiemtos Alamacen-->
            <h6 class="collapse-header">
                    Almacen
                </h6>
                <a class="collapse-item bg-warning py-1 text-uppercase <?php echo e(setActive('admin.upTableAlmacen')); ?>" 
                    href="<?php echo e(route('admin.upTableAlmacen')); ?>"
                >	
                    actual. Almacen
                </a>
            <!--Fin Herramientas Movimiemtos Alamacen-->
            </div>
        </div>
    </li>

    <hr class="sidebar-divider d-none d-md-block">        
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul><?php /**PATH F:\laragon\www\SPMiguel\resources\views/comun/admin/menu-lateral.blade.php ENDPATH**/ ?>