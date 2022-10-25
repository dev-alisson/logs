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
    <link rel="stylesheet" href="/adm/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="/adm/assets/css/owl.theme.css">
    <link rel="stylesheet" href="/adm/assets/css/main.css">
</head>

<body>

    <!-- main -->
    <main>

        <!-- content -->
        @yield('content')

    </main>

    <!-- Footer -->
    <footer class="footer">

        <!-- container -->
        <div class="container">

            <!-- flex -->
            <div class="footer__flex">

                <!-- title -->
                <div class="footer__title">

                    <!-- headline -->
                    <h2 class="footer__headline">

                        © Stock – Todos os Direitos Reservados

                    </h2>

                </div>

                <!-- text -->
                <p class="footer__text">

                    <!-- link -->
                    <a class="footer__link" href="#" title="Termos de uso">

                        Termos de uso

                    </a>

                    <!-- link -->
                    <a class="footer__link" href="#" title="Políticas de Privacidade">

                        Políticas de Privacidade

                    </a>

                </p>

            </div>

        </div>

    </footer>

    <!-- scripts -->
    <script src="/adm/assets/js/jquery.js"></script>
    <script src="/adm/assets/js/jquery.form.js"></script>
    <script src="/adm/assets/js/bootstrap.js"></script>
    <script src="/adm/assets/js/sweetalert.js"></script>
    <script src="/adm/assets/js/owl.carousel.js"></script>
    <script src="/adm/assets/js/layouts/l-auth.js"></script>
    <script src="/adm/assets/js/main.js"></script>

</body>

</html>
