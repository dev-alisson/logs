@extends('adm.layouts.auth')
@section('title', 'Login')

<!-- content -->
@section('content')

<!-- Login -->
<article class="login">

    <!-- container -->
    <div class="container">

        <!-- flex -->
        <div class="login__flex">

            <!-- box -->
            <div class="login__box">

                <!-- title -->
                <h1 class="login__title">

                    Recuperar

                </h1>

                <!-- description -->
                <p class="login__description">

                    Insira seu endereço de e-mail ou o celular de cadastro para recuperar o seu acesso.

                </p>

                <!-- form -->
                <form class="login__form js-form-ajax">

                    <!-- csrf -->
                    @csrf

                    <!-- option -->
                    <div class="login__option is-active js-option" data-content="email">

                        <!-- label -->
                        <label class="login__label">

                            <!-- field -->
                            <input class="login__field" type="text" name="email" placeholder="E-mail" autofocus>

                        </label>

                    </div>

                    <!-- option -->
                    <div class="login__option js-option" data-content="phone">

                        <!-- group -->
                        <div class="login__group login__group--phone">

                            <!-- group -->
                            <div class="login__cell">

                                <!-- label -->
                                <label class="login__label login__label--area">

                                    <!-- field -->
                                    <input class="login__field" type="text" name="area" placeholder="+00">

                                </label>

                                <!-- label -->
                                <label class="login__label login__label--code">

                                    <!-- field -->
                                    <input class="login__field" type="text" name="code" placeholder="( DDD )">

                                </label>

                            </div>

                            <!-- label -->
                            <label class="login__label login__label--number">

                                <!-- field -->
                                <input class="login__field" type="text" name="number" placeholder="Celular">

                            </label>

                        </div>

                    </div>

                    <!-- button -->
                    <button class="login__button">

                        Continuar

                    </button>

                    <!-- legend -->
                    <p class="login__legend">

                        Lembrei minha senha.

                        <!-- access -->
                        <a class="login__back" href="/" title="Acessar agora!">

                            Acessar agora!

                        </a>

                    </p>

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
                    <div class="owl-carousel owl-theme js-carousel">

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
