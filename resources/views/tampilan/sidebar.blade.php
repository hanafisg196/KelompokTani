
    <nav class="pcoded-navbar">
        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
        <div class="pcoded-inner-navbar main-menu">


            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='dashboard'? 'active' : '' }}">
                    <a href="/dashboard">
                        <span class="pcoded-micon"><i class="ti-home"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

        </div>

    </nav>
