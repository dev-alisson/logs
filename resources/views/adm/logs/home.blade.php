@extends('adm.layouts.main')
@section('title', 'Logs')

<!-- content -->
@section('content')

<!-- orders -->
<section class="modules">

    <!-- container -->
    <div class="container">

        <!-- header -->
        <header class="modules__header">

            <!-- headline -->
            <h2 class="modules__headline">

                Logs

                <!-- featured -->
                <span class="modules__featured">

                    listagem

                </span>

            </h2>

            <!-- wrapper -->
            <div class="modules__wrapper">

                <!-- upload -->
                <button class="modules__upload" data-bs-toggle="modal" data-bs-target="#logsModal">

                    <!-- icon -->
                    <i class="ri-upload-2-line modules__icon--plus"></i>

                    <!-- button -->
                    <span class="modules__legend--button">

                        Upload

                    </span>

                </button>

                <!-- export -->
                <button class="modules__export" title="Exportar" data-bs-toggle="modal" data-bs-target="#reportsModal">

                    <!-- icon -->
                    <i class="ri-download-line modules__icon--plus"></i>

                    <!-- button -->
                    <span class="modules__legend--button">

                        Exportar

                    </span>

                </button>

                <!-- clear -->
                <button class="modules__clear js-logs-clear" title="Limpar">

                    <!-- icon -->
                    <i class="ri-delete-bin-6-line modules__icon--plus"></i>

                    <!-- button -->
                    <span class="modules__legend--button">

                        Limpar

                    </span>

                </button>

            </div>

            <!-- upload -->
            <form class="modal fade js-logs-upload" id="logsModal" action="/admin/users/store">

                <!-- csrf -->
                @csrf

                <!-- dialog -->
                <div class="modal-dialog">

                    <!-- content -->
                    <div class="modal-content">

                        <!-- header -->
                        <div class="modal-header modal__header">

                            <!-- title -->
                            <h5 class="modal-title" id="logsModalLabel">

                                Selecione o arquivo

                            </h5>

                            <!-- button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- body -->
                        <div class="modal-body modal__body">

                            <!-- column -->
                            <div class="mb-3">

                                <!-- field -->
                                <input class="form-control" type="file" name="file">

                            </div>

                            <!-- progress -->
                            <div class="modal__progress progress js-progress">

                                <!-- bar -->
                                <div class="modal__bar progress-bar progress-bar-striped bg-success js-bar"></div>

                            </div>

                        </div>

                        <!-- footer -->
                        <div class="modal-footer modal__footer">

                            <!-- button -->
                            <button type="button" class="modal__button modal__button--close" data-bs-dismiss="modal">

                                Fechar

                            </button>

                            <!-- button -->
                            <button type="submit" class="modal__button modal__button--send">

                                Enviar

                            </button>

                        </div>

                    </div>

                </div>

            </form>

            <!-- export -->
            <form class="modal fade js-export" id="reportsModal" action="/admin/users/store">

                <!-- csrf -->
                @csrf

                <!-- dialog -->
                <div class="modal-dialog modal-dialog-centered modal-lg">

                    <!-- content -->
                    <div class="modal-content">

                        <!-- header -->
                        <div class="modal-header modal__header">

                            <!-- title -->
                            <h5 class="modal-title" id="reportsModalLabel">

                                Selecione o modelo

                            </h5>

                            <!-- button -->
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- body -->
                        <div class="modal-body modal__body">

                            <!-- export -->
                            <div class="row g-3">

                                <div class="col-12 col-md-6 col-xl-4">

                                    <a class="modal__export modal__export--consumer"
                                        href="{{ route('reports.consumer') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modal__icon--export"></i>

                                        Por consumidor

                                    </a>

                                </div>

                                <div class="col-12 col-md-6 col-xl-4">

                                    <a class="modal__export modal__export--service"
                                        href="{{ route('reports.service') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modal__icon--export"></i>

                                        Por serviço

                                    </a>

                                </div>

                                <div class="col-12 col-md-6 col-xl-4">

                                    <a class="modal__export modal__export--media" href="{{ route('reports.media') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modal__icon--export"></i>

                                        Média por serviço

                                    </a>

                                </div>

                            </div>

                        </div>

                        <!-- footer -->
                        <div class="modal-footer modal__footer">

                            <!-- button -->
                            <button type="button" class="modal__button modal__button--close" data-bs-dismiss="modal">

                                Fechar

                            </button>

                        </div>

                    </div>

                </div>

            </form>

        </header>

        <!-- session -->
        @if (session('message'))

        <!-- alert -->
        <div class="alert alert-success" role="alert">

            <!-- message -->
            {{session('message')}}

        </div>

        @endif

        <!-- datagrid -->
        <form class="datagrid">

            <!-- table -->
            <table class="datagrid__table responsive nowrap">

                <!-- header -->
                <thead class="datagrid__header">

                    <!-- fields -->
                    <tr class="datagrid__fields">

                        <!-- column -->
                        <th class="datagrid__column">

                            ID

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Método

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            URL

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            ID Consumidor

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Serviço

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Proxy

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Gateway

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Request

                        </th>

                    </tr>

                </thead>

                <!-- body -->
                <tbody class="datagrid__body">

                    <!-- loop -->
                    @foreach ($logs as $log)

                    <!-- item -->
                    <tr class="datagrid__item">

                        <!-- data -->
                        <td class="datagrid__data">

                            #{{ str_pad($log->id, 4, '0', STR_PAD_LEFT) }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->method }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->url }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->consumer_id }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->service_name }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->proxy }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->gateway }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->request }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </form>

    </div>

</section>

@endsection
