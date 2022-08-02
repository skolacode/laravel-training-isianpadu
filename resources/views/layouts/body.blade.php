<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @guest
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <a class="navbar-brand" href="{{ route('login') }}">Login</a>
      </div>
      @endguest

      @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <a class="navbar-brand" href="{{ route('post') }}">Posts</a>
        
            <a class="navbar-brand" href="{{ route('auth.logout') }}">Logout</a>
          </div>
      @endauth
    </div>
  </nav>


  @yield('content')

  <footer>
    @stack('scripts')
    @yield('footer')
  </footer>
</body>