
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

            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Produk</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='produk'? 'active' : '' }}">
                    <a href="/produk">
                        <span class="pcoded-micon"><i class="ti-package"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Data Produk</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='kategori'? 'active' : '' }}">
                    <a href="/kategori">
                        <span class="pcoded-micon"><i class="ti-view-list-alt"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Kategori</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='stok'? 'active' : '' }}">
                    <a href="/stok">
                        <span class="pcoded-micon"><i class="ti-archive"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Stok Produk</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Pembayaran</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='biaya'? 'active' : '' }}">
                    <a href="/biaya">
                        <span class="pcoded-micon"><i class="ti-money"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Pembayaran</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Setting</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='rekening'? 'active' : '' }}">
                    <a href="/rekening">
                        <span class="pcoded-micon"><i class="ti-credit-card"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Rekening</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>
            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='voucher'? 'active' : '' }}">
                    <a href="/voucher">
                        <span class="pcoded-micon"><i class="ti-layout-cta-left"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Voucher</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>

            <ul class="pcoded-item pcoded-left-item">
                <li class="{{ request()->segment(1)=='user'? 'active' : '' }}">
                    <a href="/user">
                        <span class="pcoded-micon"><i class="ti-id-badge"></i></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">User</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            </ul>


        </div>

    </nav>
