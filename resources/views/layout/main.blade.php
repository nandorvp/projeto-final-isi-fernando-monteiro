<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Band Fernando</title>
</head>
<body>
<header>
    <nav class="navScroll">
        @if(Auth::user())
            <a href="#" class="navBranding"><span class="_span">.</span>Bem vindo, {{Auth::user()->name}}</a>
            <ul class="navMenu">
                <li class="navItem"><a href="/" class="navLink">HomePage</a></li>
                <li class="navItem"><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="navItem"><a href="{{route('all_bands')}}">Todas as Bandas</a></li>
                <li class="navItem"><a href="{{route('all_albums')}}">Todos os Àlbuns</a></li>
            @if(Auth::user()->isAdmin)
                    <li class="navItem"><a href="{{route('add_band')}}" class="navLink">Adicionar Banda</a></li>
                    <li class="navItem"><a href="{{route('add_album')}}" class="navLink">Adicionar Àlbum</a></li>
                @endif
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button class="navItem" type="submit">Logout</button>
                </form>
            </ul>
        @else
            <a href="#" class="navBranding"><span class="_span">.</span>HomePage</a>
            <ul class="navMenu">
                <li class="navItem"><a href="/" class="navLink">HomePage</a></li>
                <li class="navItem"><a href="{{route('login')}}" class="navLink">Login</a></li>
                <li class="navItem"><a href="{{route('all_bands')}}" class="navLink">Ver Bandas</a></li>
                <li class="navItem"><a href="{{route('all_albums')}}" class="navLink">Ver Àlbuns</a></li>
                <li class="navItem"><a href="{{route('register')}}" class="navLink">Register</a></li>
            </ul>
        @endif
    </nav>
</header>
<main>
    @yield('content')
</main>
<footer>
        <div style="position: fixed;display: flex;align-items: center; justify-content: center; bottom: 0; width: 100%;">
            <p class="text-muted mb-0 py-2">&copy; 2023 <span class="zoom">Fernando Monteiro</span> All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
