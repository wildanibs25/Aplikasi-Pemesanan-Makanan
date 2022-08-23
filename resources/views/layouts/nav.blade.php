<div class="ban-top">
    <div class="container">
        <div class="logo" style="width: 100px; float:left">
            <a href="/"> <img src="{{ asset('grocery') }}/images/geprek1.png" style="height: 50px; margin-top:10px;" alt=""> </a>
        </div>
        <div class="top_nav_left">
            <nav class="navbar navbar-default" style="100%">
                
                <div class="container-fluid">
                    <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">		
                            <li class="active">
                                <a class="nav-stylehead" href="/">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="#contact">Contact</a>
                            </li>
                            @if (Auth::check())
                            <li class="dropdown">
                                <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">{{ Auth::user()->name }}
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu agile_short_dropdown">
                                    @if(Auth::user()->level == 'Admin')
                                        <li>
                                            <a href="/admin/home">
                                                <i class="fa fa-user-circle-o"></i>
                                                Admin
                                            </a>
                                        </li>
                                        @endif
                                    <li>
                                        <a href="/history">
                                            <i class="fa fa-clock-o"></i>
                                            History
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/alamat/{{ Auth::id() }}">
                                            <i class="fa fa-gear"></i>
                                            Alamat
                                        </a>
                                    </li>
                                    <li>
                                        <a class="nav-stylehead" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            <i class="fa fa-power-off"></i>
                                            <span>{{ __('Logout') }}</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @else
                                <li class="">
                                    <a class="nav-stylehead" href="#" data-toggle="modal" data-target="#myModal1">
                                        <span class="fa fa-unlock-alt" aria-hidden="true"></span> Sign In </a>
                                </li>
                                <li class="">
                                    <a class="nav-stylehead" href="#" data-toggle="modal" data-target="#myModal2">
                                        <span class="fa fa-pencil-square-o" aria-hidden="true"></span> Sign Up </a></a>
                                </li>
                            @endif
                           
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>

