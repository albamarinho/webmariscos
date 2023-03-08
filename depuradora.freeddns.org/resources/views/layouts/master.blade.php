{{-- https://getbootstrap.com/docs/4.0/examples/blog/# --}}

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>@yield('titulopagina')</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        :root{
            --bg-color: rgb(44, 49, 92);
        }

        body{
            background-color: #d7e6f7;
        }

        p, td, tr, th, li{
            font-size: 16px;
        }

        .nav-link{
            font-size: 18px;
        }

        a, :visited, a:hover {
            color: rgb(90, 131, 192);
        }

        .btn{
            color: white;
        }

        @media(max-width: 765px){
            #container-3 div{
                display: flex;
                justify-content: space-between;
            }
        }

        @media(min-width: 766px){
            #container-master{
                display: grid;
                grid-template-columns: 45% 55%;
                grid-gap: 30px;
            }
            #container-text{
                grid-column: auto;
            }
            #container-image{
                grid-column: auto;
            }

            #container-profile{
                display: grid;
                grid-gap: 30px;
                grid-template-columns: [first-column] auto [middle-column] auto [end-column];
                grid-template-rows: [first-row] auto [middle-row] auto [end-row];
            }

            #container-1{
                grid-column-start: first-column;
                grid-column-end: middle-column;
                grid-row-start: first-row;
                grid-row-end: middle-row;
            }

            #container-2{
                grid-column-start: middle-column;
                grid-column-end: end-column;
                grid-row-start: first-row;
                grid-row-end: end-row;
            }

            #container-3{
                grid-column-start: first-column;
                grid-column-end: middle-column;
                grid-row-start: middle-row;
                grid-row-end: end-row;
            }
        }
        
    </style>
</head>

<body class="mx-auto" style="max-width:1600px;">
    <div class="text-center bg-image d-none d-md-block" style="background-image: url('{{ asset('img/fondo.jpg') }}');height:280px;">
        <div class="mask" style="background-color: var(--bg-color)">
            <div class="d-flex justify-content-center align-items-center h-100">
                
                @guest
                    {{-- Login --}}
                    <a href="{{ route('login') }}" class="nav-link text-white" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-door-closed-fill" viewBox="0 0 20 20">
                            <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                        </svg>
                            Login
                    </a>

                    {{-- Registrarse --}}
                    <a href="{{ route('register') }}" class="nav-link text-white" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-pencil-square" viewBox="0 0 20 20">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        Rexistro
                    </a>
                @else
                    {{-- Logout --}}
                    <a class="nav-link text-white" aria-current="page" data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-door-open-fill" viewBox="0 0 20 20">
                            <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        </svg>
                        Logout
                    </a>
                    
                    {{-- Perfil --}}
                    <a href="{{ route('produtos.index') }}" class="nav-link text-white" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="white" class="bi bi-person-circle" viewBox="0 0 20 20">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                        </svg>
                        Perfil
                    </a>
                @endguest
            </div>

        </div>
    </div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-md navbar-dark" style="background-color: var(--bg-color)">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h5 class="d-block d-md-none text-white">Acceso</h3>
                <ul class="navbar-nav mr-auto d-block d-md-none">
                    @guest
                        {{-- Login --}}
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        {{-- Registrarse --}}
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    @else
                        {{-- Logout --}}
                        <a class="nav-link text-white" aria-current="page" data-toggle="modal" data-target="#logoutModal" style="cursor: pointer;">
                            Logout
                        </a>
                    @endguest
                </ul>

            <hr class="d-block d-md-none"/>
            <h5 class="d-block d-md-none text-white">Inicio</h3>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacto.index') }}">Contacto</a>
                </li>
                @auth
                    <li class="nav-item d-block d-md-none">
                        <a class="nav-link" href="{{ route('produtos.index') }}">Perfil</a>
                    </li>
                @endauth
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('politica.index') }}">Política</a>
                </li>
            </ul>

            <hr class="d-block d-md-none"/>
            <h5 class="d-block d-md-none text-white">Mariscos</h3>

            @php($mariscos = DB::table("mariscos")->select('*')->distinct()->orderBy('tipo')->get())
            <ul class="navbar-nav ml-auto">
                @foreach ($mariscos as $marisco)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mariscos.show', $marisco->id) }}">{{ $marisco->tipo }}</a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Modal de Logout --}}
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Desexa pechar a sesión?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Seguro que desexa finalizar a sesión?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary">Pechar sesión</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @if (session('estado'))
            <div class="alert alert-success" style="margin:10px;">
                {{ session('estado') }}
            </div>
        @endif
        {{-- Contido --}}
        <div style="margin: 50px;">
            @yield('contido')
        </div>
    </main>

    {{-- Vue --}}
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>