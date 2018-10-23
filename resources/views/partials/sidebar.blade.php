<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">
                <i class="fas fa-home"></i> 
                Navigation
            </li>

            <li>
                <a href=" {{ route('home') }} ">
                    <i class="fas fa-home"></i>
                    <span> Home </span>
                </a>
            </li>

            <li>
                <a href=" {{ route('sentences.index') }} ">
                    <i class="fas fa-pen-nib"></i>
                    <span> Vos phrases </span>
                </a>
            </li>

            @if (Auth::user()->admin)
                <li class="header">
                    <i class="fas fa-gears"></i>
                    Administration
                </li>

                <li>
                    <a href=" {{ route('users.index') }} ">
                        <i class="fas fa-users"></i>
                        <span> Utilisateurs </span>
                    </a>
                </li>

                <li>
                    <a href=" {{ route('admins.index') }} ">
                        <i class="fas fa-user-shield"></i>
                        <span> Administrateurs </span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
</aside>