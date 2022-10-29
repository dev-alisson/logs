<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="/adm/assets/img/favicon.png" type="image/png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- stylesheets -->
    <link rel="stylesheet" href="/adm/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/adm/assets/fonts/remixicon.css">
    <link rel="stylesheet" href="/adm/assets/css/sweetalert.css">
    <link rel="stylesheet" href="/adm/assets/css/datatables.css">
    <link rel="stylesheet" href="/adm/assets/css/widgets.css">
    <link rel="stylesheet" href="/adm/assets/css/main.css">

    <!-- layouts -->
    <link rel="stylesheet" href="/adm/assets/css/layouts/l-main.css">
</head>

<body class="l-main">

    <!-- header -->
    <header class="header">

        <!-- container -->
        <div class="container">

            <!-- flex -->
            <div class="header__flex">

                <!-- menu -->
                <ul class="header__menu">

                    <!-- item -->
                    <li class="header__item js-cart-button">

                        <!-- button -->
                        <a class="header__button {{ (request()->is('admin')) ? 'is-active' : '' }}" href="/admin"
                            title="Home">

                            <!-- icon -->
                            <i class="ri-home-4-line header__icon--button"></i>

                            <!-- legend -->
                            <span class="header__legend--button">

                                Home

                            </span>

                        </a>

                    </li>

                    <!-- item -->
                    <li class="header__item js-cart-button">

                        <!-- button -->
                        <a class="header__button {{ (request()->is('admin/logs')) ? 'is-active' : '' }}"
                            href="/admin/logs" title="Logs">

                            <!-- icon -->
                            <i class="ri-hammer-line header__icon--button"></i>

                            <!-- legend -->
                            <span class="header__legend--button">

                                Logs

                            </span>

                        </a>

                    </li>

                    <!-- item -->
                    <li class="header__item js-cart-button">

                        <!-- button -->
                        <a class="header__button {{ (request()->is('admin/users*')) ? 'is-active' : '' }}"
                            href="/admin/users" title="Usuários">

                            <!-- icon -->
                            <i class="ri-user-line header__icon--button"></i>

                            <!-- legend -->
                            <span class="header__legend--button">

                                Usuários

                            </span>

                        </a>

                    </li>

                    <!-- item -->
                    <li class="header__item js-cart-button">

                        <!-- button -->
                        <a class="header__button js-logout" href="#" title="Sair">

                            <!-- icon -->
                            <i class="ri-logout-circle-line header__icon--button"></i>

                            <!-- legend -->
                            <span class="header__legend--button">

                                Sair

                            </span>

                        </a>

                    </li>

                </ul>
            </div>

        </div>

    </header>

    <!-- main -->
    <main>

        <!-- content -->
        @yield('content')

    </main>

    <!-- scripts -->
    <script src="/adm/assets/js/jquery.js"></script>
    <script src="/adm/assets/js/jquery.form.js"></script>
    <script src="/adm/assets/js/bootstrap.js"></script>
    <script src="/adm/assets/js/sweetalert.js"></script>
    <script src="/adm/assets/js/datatables.js"></script>
    <script src="/adm/assets/js/chart.js"></script>
    <script src="/adm/assets/js/widgets.js"></script>
    <script src="/adm/assets/js/main.js"></script>

    <!-- custom -->
    @yield('scripts')

</body>

</html>
