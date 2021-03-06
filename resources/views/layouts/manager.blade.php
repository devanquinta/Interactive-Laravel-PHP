<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Gerenciador · Fórum</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    @if(Auth::user()->role_id == 1)
        <link href="{{asset('css/user.css')}}" rel="stylesheet">
    @endif
    <meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
</head>
<body id="back">
<nav class="p-0 shadow navbar navbar-dark sticky-top bg-dark flex-md-nowrap">
    @if(Auth::user()->role_id == 2)
        <a class="px-3 mr-0 navbar-brand col-md-3 col-lg-2" @if(request()->is('manager/users')) active @endif href="{{route('users.index')}}">
            <img  src="/img/sliders.svg" class="img-responsive muduloConfig"/> 
            <span class="textConfig">CONFIGURAÇÕES</span>
        </a>
    @endif
    @if(Auth::user()->role_id == 1)
        <div>
            <a class="px-3 mr-0 navbar-brand col-md-3 col-lg-2" @if(request()->is('manager/users')) active @endif href="{{route('users.index')}}">
                <img  src="/img/sliders.svg" class="img-responsive muduloConfig"/> 
                <span class="textConfigUser">CONFIGURAÇÕES</span>
            </a>
             
        </div>
        
    @endif
     
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="px-3 navbar-nav">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">
                
                <span @if (Auth::user()->role_id == 1) class="logoutColor" @endif>Logout</span>
                
            </a>
            <form action="{{route('logout')}}" method="post" class="logout" style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
       @include('manager.includes.menu')
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
            <div class="mt-4">
                @include('flash::message')
            </div>
            @yield('content')
        </main>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</body>
</html>
