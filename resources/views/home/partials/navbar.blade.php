<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="d-flex align-items-center">Iscent</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        <nav id="navbar" class="navbar">
            <ul class="text-center">
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/about" class="{{ Request::is('about*') ? 'active' : '' }}">About</a></li>
                <li><a href="/services" class="{{ Request::is('services*') ? 'active' : '' }}">Services</a></li>
                @auth
                <li><a href="/usulan" class="{{ Request::is('services*') ? 'active' : '' }}">Usulan Magang</a></li>
                @endauth
                <li class="dropdown">
                    @auth
                    <a href="#" class="text-warning"><span>Selamat Datang,  {{ Auth::user()->name }}!</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                    <ul>
                        <li>
                            <a  href="/user/profile/page"> Account</a>
                        </li>
                        @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                        <li>
                            <a  href="/dashboard">Dashboard</a>
                        </li>
                        @endif
                            <hr class="dropdown-divider text-dark">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary mt-3">  Logout</button>
                            </form>
                        </li>
                        </ul>
                    </li>
                    <li>
                    @else
                    <a href="/login" class="text-center text-uppercase font-weight-bold text-warning">Login Here</a>
                </li>
                @endauth
            </ul>
        </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->