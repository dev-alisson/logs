@extends('adm.layouts.main')
@section('title', 'Novo Usuário')

<!-- content -->
@section('content')

<!-- user -->
<section class="module">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="module__header">

            <!-- headline -->
            <h2 class="module__headline">

                Usuários

                <!-- featured -->
                <span class="module__featured">

                    cadastrar

                </span>

            </h2>

            <!-- back -->
            <a class="module__back" href="/admin/users" title="Voltar">

                <!-- icon -->
                <i class="ri-arrow-go-back-line module__icon--button"></i>

                <!-- button -->
                <span class="module__legend--button">

                    Voltar

                </span>
            </a>

        </header>

        <!-- form -->
        <form class="module__form js-form-ajax" action="/admin/users/store">

            <!-- csrf -->
            @csrf

            <!-- row -->
            <div class="row">

                <!-- cover -->
                <div class="col-12 col-lg-4 module__cover">

                    <!-- image -->
                    <img class="js-preview" src="/adm/assets/img/cover.png" alt="Foto do usuário" />

                </div>

                <!-- grid -->
                <div class="col-12 col-lg-8">

                    <!-- row -->
                    <div class="row g-4">

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="first_name" class="form-label module__label">

                                Nome

                            </label>

                            <!-- field -->
                            <input id="first_name" class="form-control module__field" type="text" name="first_name"
                                placeholder="Nome">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="last_name" class="form-label module__label">

                                Sobrenome

                            </label>

                            <!-- field -->
                            <input id="last_name" class="form-control module__field" type="text" name="last_name"
                                placeholder="Sobrenome">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">

                            <!-- label -->
                            <label for="avatar" class="form-label module__label">

                                Capa

                            </label>

                            <!-- field -->
                            <input id="avatar" class="form-control module__field js-file" type="file" name="avatar">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="document" class="form-label module__label">

                                CPF

                            </label>

                            <!-- field -->
                            <input id="document" class="form-control module__field" type="text" name="document"
                                placeholder="CPF">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="genre" class="form-label module__label">

                                Sexo

                            </label>

                            <!-- field -->
                            <select id="genre" class="form-select module__field" name="genre">

                                <!-- default -->
                                <option value="">

                                    Selecione

                                </option>

                                <!-- genre -->
                                <option value="male">

                                    Masculino

                                </option>

                                <!-- genre -->
                                <option value="female">

                                    Feminino

                                </option>

                            </select>

                        </div>

                        <!-- column -->
                        <div class="col-12 col-md-6 col-lg-12 col-xl-6">

                            <!-- label -->
                            <label for="email" class="form-label module__label">

                                E-mail

                            </label>

                            <!-- field -->
                            <input id="email" class="form-control module__field" type="email" name="email"
                                placeholder="E-mail">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="phone" class="form-label module__label">

                                Telefone

                            </label>

                            <!-- field -->
                            <input id="phone" class="form-control module__field" type="text" name="phone"
                                placeholder="Telefone">

                        </div>

                        <!-- column -->
                        <div class="col-12 col-sm-6">

                            <!-- label -->
                            <label for="password" class="form-label module__label">

                                Senha

                            </label>

                            <!-- field -->
                            <input id="password" class="form-control module__field" type="password" name="password"
                                placeholder="Senha">

                        </div>

                        <!-- column -->
                        <div class="col-12">

                            <!-- label -->
                            <button type="submit" class="float-end module__button">

                                <!-- icon -->
                                <i class="ri-save-line module__icon--button"></i>

                                Cadastrar

                            </button>
                        </div>

                    </div>

                </div>

            </div>

        </form>

    </div>

</section>

@endsection
