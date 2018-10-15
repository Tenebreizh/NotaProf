<header class="main-header">
    <a href=" {{ route('home') }} " class="logo">
        <img class="logo-mini" src="{{ asset('img/notaprof.png') }}" alt="Ntp" width="50" height="50" />
        <span class="logo-lg"><b>Nota</b>Prof</span>
        
    </a>
    <nav class="navbar navbar-static-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if (!Auth::user()->avatar)
                            <img src="{{ asset('img/default-avatar.png') }}" class="user-image">
                        @else
                            <img src="{{ Auth::user()->avatar }}" class="user-image">
                        @endif
                        <span class="hidden-xs"> {{ Auth::user()->name }} </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-header">
                            @if (!Auth::user()->avatar)
                                <img src="{{ asset('img/default-avatar.png') }}" class="img-circle">
                            @else
                                <img src="{{ Auth::user()->avatar }}" class="img-circle">
                            @endif
                            <p>
                                {{ Auth::user()->name }}
                                <small>Depuis le {{ \Carbon\Carbon::parse(Auth::user()->created_at)->format('d/m/Y') }}</small>
                            </p>
                        </li>
                        <li class="user-body">
                            <div class="row">
                            </div>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Paramètres</a>
                            </div>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('logout') }}" data-toggle="control-sidebar" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</header>