<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="{{ url('/') }}">
                    <div class="peers ai-c fxw-nw">
                    <div class="peer">
                        <div class="logo">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="">
                        </div>
                    </div>
                    <div class="peer peer-greed">
                        <h5 class="lh-1 mB-0 logo-text c-white">Administrator</h5>
                    </div>
                    </div>
                </a>
                </div>
                <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                    <a href="" class="td-n">
                        <i class="fas fa-chevron-circle-left"></i>
                        {{-- <i class="ti-arrow-circle-left"></i> --}}
                    </a>
                </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 actived">
            <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <span class="icon-holder">
                        {{-- <i class="c-blue-500 ti-home"></i> --}}
                        <i class="fas fa-home"></i>
                    </span>
                    <span class="title c-white">Dashboard</span>
                </a>
            </li>
            @if(Gate::check('list users') || Gate::check('create users'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-users"></i>
                    </span>
                    <span class="title c-white">Usuarios</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list users')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.users.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista usuarios</span>
                        </a>
                    </li>
                    @endcan
                    @can('create users')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.users.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear usuario</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list roles') || Gate::check('create roles'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-user-lock"></i>
                    </span>
                    <span class="title c-white">Roles</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list roles')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.roles.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista roles</span>
                        </a>
                    </li>
                    @endcan
                    @can('create users')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.roles.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear role</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list writers') || Gate::check('create writers'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-edit"></i>
                    </span>
                    <span class="title c-white">Escritores</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list writers')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.writers.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista escritores</span>
                        </a>
                    </li>
                    @endcan
                    @can('create writers')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.writers.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear escritor</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list letters') || Gate::check('create letters'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-mail-bulk"></i>
                    </span>
                    <span class="title c-white">Cartas</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list letters')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.letters.index') }}">
                            <span class="icon-holder">
                                <i class="fas fa-list"></i>
                            </span>
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('redactor'))
                                <span class="title c-white">Lista de cartas</span>
                            @else
                                <span class="title c-white">Mis cartas</span>
                            @endif
                        </a>
                    </li>
                    @endcan
                    @can('create letters')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.letters.create') }}">
                            <span class="icon-holder">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Redactar carta</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list articles') || Gate::check('create articles'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-mail-bulk"></i>
                    </span>
                    <span class="title c-white">Articulos</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list articles')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.articles.index') }}">
                            <span class="icon-holder">
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">lista articulos</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list bulletins') || Gate::check('create bulletins'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="fas fa-file"></i>
                    </span>
                    <span class="title c-white">Boletines</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list templates')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.templates.index') }}">
                            <span class="icon-holder">
                                <i class="fas fa-list"></i>
                            </span>
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
                                <span class="title c-white">Lista de Plantillas</span>
                            @else
                                <span class="title c-white">Mis Plantillas</span>
                            @endif
                        </a>
                    </li>
                    @endcan
                    
                    @can('list bulletins')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.bulletins.index') }}">
                            <span class="icon-holder">
                                <i class="fas fa-list"></i>
                            </span>
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor'))
                                <span class="title c-white">Lista de Boletines</span>
                            @else
                                <span class="title c-white">Mis Boletines</span>
                            @endif
                        </a>
                    </li>
                    @endcan
                    @can('create bulletins')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.bulletins.create') }}">
                            <span class="icon-holder">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Subir Boletin</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list redactors') || Gate::check('create redactors'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="title c-white">Redactores</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list redactors')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.redactors.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista redactores</span>
                        </a>
                    </li>
                    @endcan
                    @can('create redactors')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.redactors.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear redactor</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list suscriptors') || Gate::check('create suscriptors'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-user-tag"></i>
                    </span>
                    <span class="title c-white">Editores</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list suscriptors')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.suscriptors.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista editores</span>
                        </a>
                    </li>
                    @endcan
                    @can('create suscriptors')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.suscriptors.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear editor</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
            @if(Gate::check('list areas') || Gate::check('create areas'))
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        {{-- <i class="c-orange-500 ti-layout-list-thumb"></i> --}}
                        <i class="fas fa-globe-americas"></i>
                    </span>
                    <span class="title c-white">Areas</span>
                    <span class="arrow">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    @can('list areas')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.areas.index') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-list"></i>
                            </span>
                            <span class="title c-white">Lista areas</span>
                        </a>
                    </li>
                    @endcan
                    @can('create areas')
                    <li>
                        <a class='sidebar-link c-white' href="{{ route('admin.areas.create') }}">
                            <span class="icon-holder">
                                {{-- <i class="c-brown-500 ti-email"></i> --}}
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="title c-white">Crear area</span>
                        </a>
                    </li>
                    @endcan
                </ul>
            </li>
            @endif
        </ul>
    </div>
</div>