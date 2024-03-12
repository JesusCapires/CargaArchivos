<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('images/brand-logos/desktop-logo.png') }}" alt="logo" class="desktop-logo">
            <img src="{{ asset('images/brand-logos/toggle-logo.png') }}" alt="logo" class="toggle-logo">
            <img src="{{ asset('images/brand-logos/desktop-dark.png') }}" alt="logo" class="desktop-dark">
            <img src="{{ asset('images/brand-logos/toggle-dark.png') }}" alt="logo" class="toggle-dark">
            <img src="{{ asset('images/brand-logos/desktop-white.png') }}" alt="logo" class="desktop-white">
            <img src="{{ asset('images/brand-logos/toggle-white.png') }}" alt="logo" class="toggle-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path> </svg>
            </div>
            <ul class="main-menu">

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Inicio</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{route('dashq')}}" class="side-menu__item">
                        <i class="bx bx-home side-menu__icon"></i>
                        <span class="side-menu__label">Inicio</span>
                        {{-- <span class="badge bg-secondary-transparent ms-2">New</span> --}}
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="{{route('dashq')}}">Inicio</a>
                        </li>
                    </ul>
                </li>

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide has-sub">
                    <a href="javascript:void(0);" class="side-menu__item">
                        <!-- <i class="ri-window-line side-menu__icon"></i> -->
                        <!-- <i class="bx bx-file side-menu__icon"></i> -->
                        <i class="bx bx-file side-menu__icon"></i>
                        <span class="side-menu__label">Catálagos<span class="badge bg-warning-transparent ms-2">3</span></span>
                        <i class="fe fe-chevron-right side-menu__angle"></i>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="javascript:void(0)">Catálagos</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('listaProducto')}}"  class="side-menu__item">Productos</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('listaCalidad')}}"  class="side-menu__item">Criterios de calidad</a>
                        </li>
                        <li class="slide">
                            <a href="{{route('listaCliente')}}"  class="side-menu__item">Clientes</a>
                        </li>
                        {{-- <li class="slide">
                            <a href="{{route('users')}}"  class="side-menu__item">Usuarios</a>
                        </li> --}}
                    </ul>
                </li>
                <!-- End::slide -->

                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Bitacoras</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{route('weblogs')}}"  class="side-menu__item">
                        <i class="bx bx-file-blank side-menu__icon"></i>
                        <span class="side-menu__label">
                            Bitacoras
                            {{-- <span class="badge bg-secondary-transparent ms-2">
                                New
                            </span> --}}
                        </span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="{{route('weblogs')}}" >Bitacoras</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->


                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Selecciones</span></li>
                <!-- End::slide__category -->

                <!-- Start::slide -->
                <li class="slide">
                    <a href="{{route('listaSelecciones')}}"  class="side-menu__item">
                        <i class="bx bx-file-blank side-menu__icon"></i>
                        <span class="side-menu__label">Selecciones</span>
                    </a>
                    <ul class="slide-menu child1">
                        <li class="slide side-menu__label1">
                            <a href="{{route('listaSelecciones')}}" >Selecciones</a>
                        </li>
                    </ul>
                </li>
                <!-- End::slide -->
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24" viewBox="0 0 24 24"> <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path> </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>
