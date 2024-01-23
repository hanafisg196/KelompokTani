<!-- Start Header/Navigation -->
<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

    <div class="container">
        <a class="navbar-brand" href="index.html">Furni<span>.</span></a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
         data-bs-target="#navbarsFurni" aria-controls="navbarsFurni"
         aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsFurni">
            <ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
                <li class="nav-item {{ request()->segment(1)==''? 'active' : '' }}">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li><a class="nav-link" href="/profilperusahaan">Profil Perusahaan</a></li>
                <li class="nav-item {{ request()->segment(1)=='produkpelanggan'? 'active' : '' }}">
                    <a class="nav-link" href="{{ url('/produkpelanggan') }}">Produk</a>
                </li>
                <li><a class="nav-link" href="contact.html">Contact us</a></li>
            </ul>

            <ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">


                     @auth
                    
                     <div class="dropdown show">
                        <a class="btn btn-secondary dropdown-toggle" href="#" 
                        role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                          {{ auth()->user()->name }}
                        </a>
                      
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <a class="dropdown-item" href="/profile">Akun</a>
                          <a class="dropdown-item" href="/cartproduk">Pesanan</a>
                          <a class="dropdown-item" href="/logout">Logout</a>
                        </div>
                      </div>
                     
                     @else
                     <li><a class="nav-link" href="/login"><img src="/assets2/images/user.svg"></a></li>
                    @endauth
                        @livewire('cart-counter')

                </li>
            </ul>
        </div>
    </div>

</nav>
<!-- End Header/Navigation -->
