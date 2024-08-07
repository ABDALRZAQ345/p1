<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-success text-white">
        <div class="ms-2">
            <a class="navbar-brand" href="{{ route('posts.index') }}">
                <img
                    @guest  src="{{ asset('storage/logos/Untitled.png') }}" @endguest
                   @auth src="{{ asset('storage/' . Auth::user()->logo) }}" @endauth
                    width="35" height="35" class="d-inline-block align-text-top rounded-5 " alt="">
            </a>
            </div>

                <div class="container-fluid">

          <a class="navbar-brand" href="{{route('posts.index')}}">blogs</a>

          @guest
          <div class="ml-4 flex items-center md:ml-6">

            <a class="navbar-brand text-green " href="{{ route('auth.login') }}">login</a>
            <a class="navbar-brand" href="{{route('auth.register')}}">register</a>
          </div>
          @endguest

          @auth
          <form action="{{ route('auth.logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">log out </button>

        </form>

          @endauth

</nav>
@yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
