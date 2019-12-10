<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li>
                <a id='sidebar-toggle' class="sidebar-toggle" href="javascript:void(0);">
                    {{-- <i class="ti-menu"></i> --}}
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="notifications dropdown">
                @if(Auth::user()->notifications->count() != 0)
                <span class="counter bgc-red">{{ Auth::user()->unreadNotifications()->count() }}</span>
                @endif
                <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                    {{-- <i class="ti-bell"></i> --}}
                    {{-- <i class="fas fa-bell"></i> --}}
                    <i class="far fa-bell"></i>
                </a>


                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB">
                        <i class="fas fa-bell"></i>
                        {{-- <i class="ti-bell pR-10"></i> --}}
                        <span class="fsz-sm fw-600 c-grey-900">Notifications</span>
                    </li>
                    

                    <li>
                        <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                          @forelse (Auth::user()->unreadNotifications()->take(3)->get() as $item)
                          {{-- {{dd($item->data)}} --}}
                            <li>
                            <a href="{{ route('admin.letters.index') }}" class='peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100'>
                                <div class="peer mR-15">
                                    <img class="w-3r bdrs-50p" src="{{ asset('images/noti_letter.png')}}" alt="">
                                </div>
                                <div class="peer peer-greed">
                                    <span>
                                    <span class="fw-500">{{ $item->data['username'] }}</span>
                                    <span class="c-grey-600">envio una <span class="text-dark">carta</span>
                                    </span>
                                    </span>
                                    <p class="m-0">
                                    <small class="fsz-xs">
                                        {{ Carbon::now() }}</small>
                                    </p>
                                </div>
                                </a>
                            </li>    
                          @empty
                            Vacio                     
                          @endforelse
                          <li class="pX-20 pY-15 ta-c bdT">
                            <span>
                                <a href="" class="c-grey-600 cH-blue fsz-sm td-n">Ver todas las notificaciones <i class="ti-angle-right fsz-xs mL-10"></i></a>
                            </span>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
<!--
            <li class="notifications dropdown">
                <span class="counter bgc-blue">3</span>
                <a href="" class="dropdown-toggle no-after" data-toggle="dropdown">
                    {{-- <i class="ti-email"></i> --}}
                    <i class="far fa-envelope"></i>
                </a>

                <ul class="dropdown-menu">
                    <li class="pX-20 pY-15 bdB">
                    {{-- <i class="ti-email pR-10"></i> --}}
                    <i class="fas fa-envelope"></i>
                    <span class="fsz-sm fw-600 c-grey-900">Emails</span>
                    </li>
                </ul>
            </li>
-->
            <li class="dropdown">
                <a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10">
                        <img class="w-2r bdrs-50p" src="https://randomuser.me/api/portraits/men/10.jpg" alt="">
                    </div>
                    <div class="peer">
                        <span class="fsz-sm c-white">{{ Auth::user()->firstname }}</span>
                    </div>
                </a>
                
                <ul class="dropdown-menu fsz-sm">
                    <li>
                        <a href="{{ route('admin.roles.index') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            {{-- <i class="ti-settings mR-10"></i> --}}
                            <i class="fas fa-cog"></i>
                            <span>Setting</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            {{-- <i class="ti-user mR-10"></i> --}}
{{--                            <i class="far fa-user"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700">
                            {{-- <i class="ti-email mR-10"></i> --}}
    {{--                        <i class="far fa-envelope"></i>
                            <span>Messages</span>
                        </a>
                    </li> --}}
                    <li role="separator" class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">

                            {{-- <i class="ti-power-off mR-10"></i> --}}
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>