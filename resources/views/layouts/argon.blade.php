<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Synapse Proposals</title>
  <!-- Favicon -->
  <link href="/img/brand/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="/css/argon.css?v=1.0.0" rel="stylesheet">
  <!-- Docs CSS -->
  <link type="text/css" href="/css/docs.min.css" rel="stylesheet">
  @yield('styles')
</head>

<body>
  <header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light">
      <div class="container">
        <a class="navbar-brand mr-lg-5" href="/">
          Home
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbar_global">
          <div class="navbar-collapse-header">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="/">
                  Home
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
              @if (Route::has('login'))
                @auth
                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
                      <i class="ni ni-collection d-lg-none"></i>
                      <span class="nav-link-inner--text">Hi {{ Auth::user()->name }}</span>
                    </a>
                    <div class="dropdown-menu">
                      <a href="{{ url('/admin') }}" class="dropdown-item">Go to Dashboard</a>
                      <a href="/admin/users/{{ Auth::user()->id }}/edit" class="dropdown-item">Profile</a>
                      <a href="{{ url('/logout') }}" class="dropdown-item">Logout</a>
                    </div>
                  </li>
                @else
                  <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link" role="button">
                      <i class="ni ni-ui-04 d-lg-none"></i>
                      <span class="nav-link-inner--text">Login</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link" role="button">
                      <i class="ni ni-ui-04 d-lg-none"></i>
                      <span class="nav-link-inner--text">Create Account</span>
                    </a>
                  </li>
                @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>
  
  @yield('content')

  </footer>
  <!-- Core -->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/popper/popper.min.js"></script>
  <script src="/vendor/bootstrap/bootstrap.min.js"></script>
  <script src="/vendor/headroom/headroom.min.js"></script>
  <!-- Argon JS -->
  <script src="/js/argon.js?v=1.0.0"></script>
  @yield('scripts')
</body>

</html>