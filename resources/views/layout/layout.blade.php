<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name')}}</title>
    <link rel="stylesheet" href=" {{ asset('css/style.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.css') }}"/>
    <link rel="stylesheet" href=" {{ asset('css/bootstrap.min.css') }}"/>
</head>
<body>
    <header>
        <div class='container'>
            <div class="divFlex">
                <div class="logo">
                    <a href="{{ route('index')}}">
                        <p>GoolbeNews</p>
                    </a>
                </div>
                <div class="search">
                    <form action="{{ route('search')}}" method="post">
                        @csrf
                        @method('post')
                    <div class="form-group button-search">
                        <input type="text" name="search" class="form-control" id="idSearch" placeholder="Procure aqui ...">
                        <button type="submit" class="btm-search">Filtrar</button>
                    </div>
                    </form>
                </div>
                <nav class="menu">
                    <ul>
                        <li><a href="{{ route('index')}}">Post</a></li>
                        <li><a href="{{ route('create')}}">Novo Post</a></li>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Fale Conosco</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    
    @yield('content')


    <script type="text/javascript" src=" {{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('js/popper.min.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('js/bootstrap.js') }}"></script>
    
</body>
</html>