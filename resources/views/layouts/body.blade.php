<body>
  @yield('content')

  <footer>
    @stack('scripts')
    @yield('footer')
  </footer>
</body>