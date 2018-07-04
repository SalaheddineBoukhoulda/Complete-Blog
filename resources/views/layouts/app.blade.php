<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">

                <div class="row">
                    @if(Auth::check())
                    <div class="col-lg-4">
                        <ul class="list-goup">
                            <li class="list-group-item">
                                <a href="/home">Home</a>
                            </li>
                            <li class="list-group-item">
                            <a href="{{ route('post.create')}}">Create a new post</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('posts')}}">Posts</a>
                            </li>
                            <li class="list-group-item">
                                    <a href="{{ route('posts.trashed')}}">Trashed posts</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('category.create')}}">Create a new category</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('categories')}}">Categories</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tag.create')}}">Create a new tag</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('tags')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{ route('user.edit')}}">My profile</a>
                            </li>
                            @if(Auth::user()->admin)
                            <li class="list-group-item">
                                <a href="{{ route('users')}}">Users</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{ route('user.create')}}">Create a new user</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-lg-8">
                        @yield('content')
                    </div>
                    @else
                    <div class="col-sm">
                        @yield('content')
                    </div>
                    @endif
                </div>
            </div>
        </main>
    </div>
    <!-- scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success')}}");
            @endif
            @if(Session::has('info'))
                toastr.info("{{ Session::get('info')}}");
            @endif
    </script>
    @yield('scripts')

</body>
</html>
