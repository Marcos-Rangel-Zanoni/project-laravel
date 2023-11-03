<!doctype html>
<html lang="pt-BR">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">




    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" charset="UTF-8"
        href="https://www.gstatic.com/_/translate_http/_/ss/k=translate_http.tr.69JJaQ5G5xA.L.W.O/d=0/rs=AN8SPfpC36MIoWPngdVwZ4RUzeJYZaC7rg/m=el_main_css">
    <!-- style da pagina toda -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('style.scss') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />



    <script src="{{asset('js/carousel.js')}}" type="module"></script>
    <title>Blast Study</title>
</head>

<body class="container">
    <div class="">
        @auth
            <nav class="nav-bar">
                <div class="navigation">
                    <ul>
                        <li class="list">
                            @if (Route::has('login'))
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); this.closest('form').submit();" title="Sair">
                                        <span class="icon">
                                            <ion-icon name="log-out-outline"></ion-icon>
                                        </span>
                                        <span class="text">Sair</span>
                                    </a>
                                </form>
                            @endif
                        </li>
                        <li class="list {{ Route::currentRouteName() == 'site.home' ? 'active' : '' }}">
                            <a href="{{ Route('site.home') }}">
                                <span class="icon">
                                    <ion-icon name="home-outline"></ion-icon>
                                </span>
                                <span class="text">Inicio</span>
                            </a>
                        </li>
                        <li class="list {{ Route::currentRouteName() == 'site.calendar.index' ? 'active' : '' }} ">
                            <a href="{{ Route('site.calendar.index') }}">
                                <span class="icon">
                                    <ion-icon name="calendar-outline"></ion-icon>
                                </span>
                                <span class="text">Calendario</span>
                            </a>
                        </li>
                        <li class="list {{ Route::currentRouteName() == 'notes.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'notes.create' ? 'active' : '' }} {{ Route::currentRouteName() == 'notes.edit' ? 'active' : '' }}">
                            <a href="{{ Route('notes.index') }}">
                                <span class="icon">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </span>
                                <span class="text">Caderno</span>
                            </a>
                        </li>

                        <li class="list {{ Route::currentRouteName() == 'postagem.index' ? 'active' : '' }}">
                            <a href="{{ Route('postagem.index') }}">
                                <span class="icon">
                                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                </span>
                                <span class="text">Forum</span>
                            </a>
                        </li>
                        <li class="list {{ Route::currentRouteName() == 'profile.edit' ? 'active' : '' }}">

                            <a href="{{ Route('profile.edit') }}">
                                <span class="icon">
                                    <ion-icon name="person-outline"></ion-icon>
                                </span>
                                <span class="text">Perfil</span>
                            </a>
                        </li>
                        <div class="indicator"></div>

                    </ul>


                </div>
            </nav>
        @endauth

        @auth
            <div class="user">
                <div class="user-img">
                    <img src="@if(Auth::user()->image == null){{ asset('img/icons8-usuário-homem-com-círculo-24.png') }} @else {{ asset(Auth::user()->image) }} @endif" alt="Imagem do usuário">
                </div>
                @auth
                    <div class="user-lvl">
                        <div style="width: {{ Auth::user()->experiencia}}%; height: 100%; background-color: #c278f5; direction: ltr; border-radius: 15px;"><p>{{Auth::user()->experiencia}}%</p></div>
                    </div>
                @endauth
                @auth
                    <div class="user-name">
                        <div class="user-moldura">
                            <img src="{{ asset('img/moldura.png') }}" alt="Minha Imagem">
                        </div>

                        <div class="user-lvl-background-number">

                            <div class="user-lvl-number">
                                @auth
                                    <p class="user-lvl-number">{{ $user->level }}</p>
                                @endauth
                            </div>
                        </div>
                    </div>

                @endauth

            </div>
        @endauth
        @guest
            <div class="login-enter">
                <div class="login-img">
                    <a href="{{ Route('login') }}">
                        <span class="user-login">
                            <ion-icon name="person-outline"></ion-icon>
                        </span>
                    </a>
                </div>
            </div>
        @endguest
        <main class="">

            @yield('content')

            <!-- <div class="box2">

                                                                                                                                                        <div class="" id="">
                                                                                                                                                            <h1>Propaganda</h1>
                                                                                                                                                        </div>
                                                                                                                                                    </div> -->

        </main>
        <!-- <footer>
                                                                                                                                                    <p>&copy; 2023 - Todos os direitos reservados</p>
                                                                                                                                                </footer> -->
        <!--
                                                                                                                                                <script>
                                                                                                                                                    const list = document.querySelectorAll('.list');


                                                                                                                                                    function activeLink() {
                                                                                                                                                        list.forEach((item) =>
                                                                                                                                                            item.classList.remove('active'));
                                                                                                                                                        this.classList.add('active');

                                                                                                                                                    }
                                                                                                                                                    list.forEach((item) =>
                                                                                                                                                        item.addEventListener('click', activeLink));
                                                                                                                                                </script> -->

        <!-- NavBar code -->
        <script src="{{ asset('js/navbar.js') }}"></script>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
        </script>
        </script>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                                                                                                                                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                </script>
                                                                                                                                                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                </script>
                                                                                                                                                -->
        <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
            crossorigin="anonymous"></script>
</body>

</html>
