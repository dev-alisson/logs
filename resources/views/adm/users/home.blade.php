@extends('adm.layouts.main')
@section('title', 'Usuários')

<!-- content -->
@section('content')

<!-- users -->
<section class="modules">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="modules__header">

            <!-- headline -->
            <h2 class="modules__headline">

                Usuários

                <!-- featured -->
                <span class="modules__featured">

                    listagem

                </span>

            </h2>

            <!-- plus -->
            <a class="modules__plus" href="/admin/users/create" title="Adicionar">

                <!-- icon -->
                <i class="ri-add-circle-line modules__icon--plus"></i>

                <!-- button -->
                <span class="modules__legend--button">

                    Adicionar

                </span>

            </a>

        </header>

        <!-- row -->
        <div class="row g-4">

            <!-- loop -->
            @foreach ($users as $user)

            <!-- column -->
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">

                <!-- item -->
                <article class="modules__item js-module-item">

                    <!-- avatar -->
                    <img class="modules__cover" src="{{ $user->avatar ?? '/adm/assets/img/avatar.png' }}"
                        alt="{{ $user->first_name }}" title="{{ $user->first_name }}">

                    <!-- title -->
                    <h3 class="modules__name">

                        {{ $user->first_name }}

                    </h3>

                    <!-- description -->
                    <p class="modules__description">

                        <!-- e-mail -->
                        {{ $user->email }}

                    </p>

                    <!-- actions -->
                    <div class="modules__actions">

                        <!-- button -->
                        <a class="modules__button modules__button--edit" href="/admin/users/edit/{{ $user->id }}"
                            title="Editar">

                            <!-- icon -->
                            <i class="ri-edit-box-line modules__icon"></i>

                        </a>

                        <!-- button -->
                        <button class="modules__button modules__button--remove js-module-remove"
                            data-action="/admin/users/destroy/{{ $user->id }}" data-id="{{ $user->id }}">

                            <!-- icon -->
                            <i class="ri-delete-bin-6-line modules__icon"></i>

                        </button>

                    </div>

                </article>

            </div>

            @endforeach

        </div>

    </div>

</section>

@endsection
