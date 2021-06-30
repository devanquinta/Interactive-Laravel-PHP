
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <div class></div>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Interact Play') }}</title> --}}
    <title>Interact Play</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @auth
         <link href="{{ asset('css/topic.css') }}" rel="stylesheet">
    @endauth
    @if (!Auth::user())
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
    @endif

</head>
<body id="app_2">
    <div id="app">
        <div class="col-12" id="app_1"></div>
        <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a> --}}
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent" style="text-shadow: 1px 1px #000105">
                    <!-- Left Side Of Navbar -->
                    <ul class="mr-auto navbar-nav">
                        <li class="nav-item">
                            {{-- <span class="txt_logo img-responsive img-thumbnail"></span> --}}
                            @auth
                               
                                 <a href="{{ route('topics.index') }}" class="nav-link logo img-rounded img-fluid img-responsive"></a>
                                 @if(Auth::check())
                                    <a href="{{ route('limpar') }}"</a>
                                 @endif
                                {{-- AQUI VAI SER O NOME DO APP / LOGO --}}
                            @endauth
                            @if (!(Auth::check()))
                                <a href="{{ route('topics.index') }}"
                                 class="nav-link logo img-rounded img-fluid img-responsive" style="margin-left:-4%; margin-top:-1.3%">
                                </a>
                            @endif



                        </li>
                        @if ( Auth::user() and ( Auth::user()->role_id  ) != 2 )
                        <li class="nav-item">
                            @auth
                                <a href="{{ route('topics.create') }}" class="nav-link">
                                    <span class="created">CRIAÇÃO</span>
                                </a>
                            @endauth
                        </li>
                        @endif
                        @auth
                        @if ( ( Auth::user()->role_id  ) == 1   or    ( Auth::user()->role_id  ) == 2  )
                            <li class="nav-item">
                                @auth
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                        <span class"control">CONTROLE</span>
                                    </a>
                                @endauth
                            </li>
                        @endif
                        @endauth
                        <li class="nav-item dropdown">
                            @auth
                                <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button"
                                    data-toggle="dropdown">
                                    <span class="curse">CURSO</span>
                                </a>
                            @endauth
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a href="{{ route('topics.index') }}">
                                    <span style="color: gray">
                                    </span>
                                </a>

                            @auth
                                @foreach (\App\Channel::all('slug', 'name') as $channel)
                                    <a href="{{ route('topics.index', ['channel' => $channel->slug]) }}"
                                        class="dropdown-item">
                                        <div style="width: 360px;">
                                            <span class="canal_index">{{ $channel->name }}</span>
                                        <div>
                                    </a>
                                @endforeach
                            @endauth

                            </div>
                        </li>
                    </ul>
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" style="color:rgb(4, 4, 139); text-shadow:rgb(1, 1, 39);" href="{{ route('login') }}">{{ 'Login' }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" style="color:rgb(1, 39, 20); text-shadow:rgb(4, 99, 43);" href="{{ route('register') }}">{{ 'Register' }}</a>
                                </li>
                            @endif
                            @else
                            <li class="nav-item dropdown" style="font-size: bold; font-family: Verdana, Geneva, Tahoma, sans-serif">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span class="name_user">
                                        {{ Auth::user()->name }}
                                    </span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();                                                                                                                               document.getElementById('logout-form').submit();">
                                        {{ 'Logout' }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
            <!-- tópico não encontrado  -->
            <div class="container"><br>
                @include('flash::message')
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
