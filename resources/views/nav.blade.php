
<nav class="navbar navbar-expand-sm bg-none navbar-light">
  <div class="container-fluid">
  <div class="col-sm-3">

  <a class="navbar-brand" href="/">
      <img src="/image/logo_ada2.png" style="width: 50%" >
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar"> 

    <div class="col-sm-6" style="">
    <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="/"><h5>Accueille</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gallery"><h5>Galerie</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/press"><h5>A propos</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact"><h5>Contacte</h5></a>
        </li>
      </ul>
    </div>
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
      </div>
    </div>
  </div>
</nav>