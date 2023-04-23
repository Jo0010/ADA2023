<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/image/logo_ada2.png" />

    <title>ADA.sprl</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-none navbar-light">
  <div class="container-fluid">
  <div class="col-sm-3">

  <a class="navbar-brand" href="/">
      <img src="/image/logo_ada2.png" style="width: 40%" >
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">

    <div class="col-sm-6" style="">
    <ul class="navbar-nav justify-content-center">
        <li class="nav-item">
          <a class="nav-link" href="/"><h5>Accueil</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/gallery"><h5>Galerie</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/press"><h5>A propos</h5></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact"><h5>Contact</h5></a>
        </li>
      </ul>

    </div>
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
          @auth
          <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>
          @else
          <a href="{{ route('login') }}" style="color:red;" class="text-sm text-gray-700 dark:text-gray-500 underline">Connexion</a>

          @if (Route::has('register'))
          <a href="{{ route('register') }}" style="color:red;" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Inscription</a>
          @endif
          @endauth
        </div>
        @endif


          </div>
        </div>
      </nav>
      <div class="container">
        @yield('content')
      </div>
      @include('footer')
    </body>
</html>

