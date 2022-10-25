@extends('adm.layouts.auth')
@section('title', 'Login')

<!-- content -->
@section('content')

<!-- login -->
<article class="login">

    <!-- container -->
    <div class="container">

        <!-- flex -->
        <div class="login__flex">

            <!-- box -->
            <div class="login__box">

                <!-- title -->
                <h1 class="login__title">

                    Bem-vindo!

                </h1>

                <!-- description -->
                <p class="login__description">

                    Bem-vindo! Se conecte-se para viajar o mundo através do dispositivo preferido

                </p>

                <!-- tabs -->
                <ul class="tabs">

                    <!-- item  -->
                    <li class="tabs__item is-active">

                        Logar

                    </li>

                    <!-- item  -->
                    <li class="tabs__item">

                        <!-- link -->
                        <a class="tabs__link" href="/register" title="Cadastrar">

                            Cadastrar

                        </a>

                    </li>

                </ul>

                <!-- form -->
                <form class="login__form js-form-ajax" action="/login">

                    <!-- csrf -->
                    @csrf

                    <!-- label -->
                    <label class="login__label">

                        <!-- field -->
                        <input class="login__field" type="text" name="email" placeholder="E-mail" autofocus>

                    </label>

                    <!-- label -->
                    <label class="login__label">

                        <!-- field -->
                        <input class="login__field js-password-file" type="password" name="password"
                            placeholder="Senha">

                        <!-- icon -->
                        <i class="ri-eye-off-line login__icon--label js-password-view"></i>

                    </label>

                    <!-- remember -->
                    <div class="login__remember">

                        <!-- Switch -->
                        <div class="switch">

                            <!-- field -->
                            <input class="switch__field" type="checkbox" name="remember" id="switch">

                            <!-- label -->
                            <label class="switch__label" for="switch"></label>

                            <!-- legend -->
                            <span class="switch__legend">

                                Lembrar-me

                            </span>

                        </div>

                        <!-- recover -->
                        <a class="login__recover" href="/remember" title="Esqueceu sua senha?">

                            Esqueceu sua senha?

                        </a>

                    </div>

                    <!-- button -->
                    <button class="login__button">

                        Entrar

                    </button>

                </form>

            </div>

            <!-- about -->
            <div class="login__about">

                <!-- play -->
                <img class="login__play animate--pulse" src="/adm/assets/img/play.svg" alt="Apresentação"
                    title="Apresentação">


                <!-- carousel -->
                <div class="login__carousel">

                    <!-- owl-carousel -->
                    <div class="owl-carousel owl-theme js-login-carousel">

                        <!-- resources -->
                        <div class="login__resource">

                            <!-- banner -->
                            <img class="login__banner" src="/adm/assets/img/login/carousel/01.svg" alt="Conexões"
                                title="Conexões">

                            <!-- headline -->
                            <h2 class="login__headline">

                                Controle suas vendas com a nossa plataforma completa

                            </h2>

                            <!-- paragrap -->
                            <p class="login__paragraph">

                                Gerencie o seu negócio com a plataforma de estoque de vendas melhor do Brasil

                            </p>

                        </div>

                        <!-- resources -->
                        <div class="login__resource">

                            <!-- banner -->
                            <img class="login__banner" src="/adm/assets/img/login/carousel/02.svg" alt="Amigos"
                                title="Amigos">

                            <!-- headline -->
                            <h2 class="login__headline">

                                Controle suas vendas com a nossa plataforma completa

                            </h2>

                            <!-- paragrap -->
                            <p class="login__paragraph">

                                Gerencie o seu negócio com a plataforma de estoque de vendas melhor do Brasil

                            </p>

                        </div>

                        <!-- resources -->
                        <div class="login__resource">

                            <!-- banner -->
                            <img class="login__banner" src="/adm/assets/img/login/carousel/03.svg" alt="Interatividade"
                                title="Interatividade">

                            <!-- headline -->
                            <h2 class="login__headline">

                                Controle suas vendas com a nossa plataforma completa

                            </h2>

                            <!-- paragrap -->
                            <p class="login__paragraph">

                                Gerencie o seu negócio com a plataforma de estoque de vendas melhor do Brasil

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</article>

@endsection
