<ul class="navbar-nav sidebar sidebar-dark accordion toggled" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-icon rotate-n-15 ">
            <img src="{{asset('images/favicon.png')}}" style="width: 40px;">
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
        <a class="nav-link " href="{{url('/admin')}}">
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
        <a class="nav-link collapsed" href="{{url('admin/users')}}">
            <i class="fas fa-users-cog"></i>
            <span>Usuarios</span>
        </a>

    </li>

    <li class="nav-item {{setActive('admin.articulos-alta')}} {{setActive('admin.articulos-baja')}} {{setActive('admin.articulos-stock')}}">
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
                <a class="collapse-item bg-dark text-center text-white py-1 mb-1 {{setActive('admin.articulos-stock')}}" 
                    href="{{url('admin/articulos/stock')}}">	
                    ARTICULOS CON STOCK
                </a>
                <a class="collapse-item bg-success text-center text-white py-1 mb-1 {{setActive('admin.articulos-alta')}}" 
                    href="{{url('admin/articulos/alta')}}">	
                    ARTICULOS DE ALTA
                </a>
                <a class="collapse-item bg-danger text-center text-white py-1 mb-2 {{setActive('admin.articulos-baja')}}" 
                    href="{{url('admin/articulos/baja')}}">	
                    ARTICULOS DE BAJA
                </a> 
                <a class="collapse-item bg-info text-center text-white py-1 mb-2 {{setActive('admin.articulos-fabricacion')}}" 
                    href="{{url('admin/articulos/fabricacion')}}">	
                    ARTICULOS DE FABRICACION
                </a>                
            </div>
        </div>
    </li>

    <li class="nav-item {{setActive('admin.familias')}} ">
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
                    <a class="collapse-item bg-success text-center text-white py-1 mb-1 {{setActive('admin.familias')}}" 
                        href="{{url('admin/familias')}}">	
                        FAMILIAS
                    </a>             
                </div>
            </div>
        </li>

    <hr class="sidebar-divider">  

    <div class="sidebar-heading">
        Utilidades
    </div>
    
    <li class=" nav-item {{setActive('admin.agrupar')}} {{setActive('admin.updTableFamilia')}} {{setActive('admin.upTableArticulo')}} 
        {{setActive('admin.upTableAlmacen')}}  {{setActive('admin.upTableSunpro')}}">   

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
                <a class="collapse-item bg-warning py-1 mb-1 text-center" href="{{url('admin/imagenes/cargar')}}">	
                    CARGAR IMAGENES
                </a> 
            -->
            <!--Herramientas Articulos-->
                <h6 class="collapse-header">
                    Articulos
                </h6>
                <a class="collapse-item bg-dark text-white py-1 mb-1 {{setActive('admin.agrupar')}}" 
                    href="{{route('admin.agrupar')}}"
                >	
                    AGRUPAR ARTICULOS
                </a>
                <a class="collapse-item bg-success text-white py-1 mb-2  text-uppercase {{setActive('admin.upTableArticulo')}}" 
                    href="{{route('admin.upTableArticulo')}}"
                >	
                    actual. articulos
                </a>
            <!--
                <a class="collapse-item bg-warning py-1 mb-2  text-uppercase {{setActive('admin.upTableSunpro')}}" 
                    href="{{route('admin.upTableSunpro')}}"
                >	
                    articulos sunpro
                </a>
            -->
            
            <!--FIN Herramientas Articulos-->

            <!--Herramientas Familias-->
                <h6 class="collapse-header">
                    Familias
                </h6>
            
                <a class="collapse-item bg-success text-white py-1 mb-2 text-uppercase {{setActive('admin.updTableFamilia')}}" 
                    href="{{route('admin.updTableFamilia')}}"
                >	
                    actual. familias
                </a>
            <!--
                <a class="collapse-item bg-warning py-1 mb-2 text-uppercase {{setActive('admin.upTableFamSunpro')}}" 
                    href="{{route('admin.upTableFamSunpro')}}"
                >	
                    familias sunpro
                </a>
            -->
            <!--Fin Herramientas Familias-->

            <!--Herramientas Movimiemtos Alamacen-->
            <h6 class="collapse-header">
                    Almacen
                </h6>
                <a class="collapse-item bg-warning py-1 text-uppercase {{setActive('admin.upTableAlmacen')}}" 
                    href="{{route('admin.upTableAlmacen')}}"
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
</ul>