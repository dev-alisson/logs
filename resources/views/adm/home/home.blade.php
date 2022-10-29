@extends('adm.layouts.main')
@section('title', 'Stock')

<!-- content -->
@section('content')

<!-- dashboard -->
<div class="dashboard">

    <!-- reports -->
    <div class="reports">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row">

                <!-- controls -->
                <div class="mb-5 d-flex justify-content-end">

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
                    <button class="modules__export" title="Exportar" data-bs-toggle="modal"
                        data-bs-target="#reportsModal">

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
                    <div class="modal-dialog modal-dialog-centered">

                        <!-- content -->
                        <div class="modal-content">

                            <!-- header -->
                            <div class="modal-header modal__header">

                                <!-- title -->
                                <h5 class="modal-title" id="logsModalLabel">

                                    Selecione o arquivo

                                </h5>

                                <!-- button -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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
                                <button type="button" class="modal__button modal__button--close"
                                    data-bs-dismiss="modal">

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
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
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

                                        <a class="modal__export modal__export--media"
                                            href="{{ route('reports.media') }}">

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
                                <button type="button" class="modal__button modal__button--close"
                                    data-bs-dismiss="modal">

                                    Fechar

                                </button>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

            <!-- row -->
            <div class="row gy-3">

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Logs

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalLogs, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Consumidores

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalConsumers, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Serviços

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalServices, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Média proxy

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalMedias->media_proxy, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Média gateway

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalMedias->media_gateway, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- column -->
                <div class="col-6 col-sm-4 col-xl-2">

                    <!-- panel -->
                    <div class="reports__panel">

                        <!-- content -->
                        <div class="reports__content">

                            <!-- header -->
                            <div class="reports__header">

                                <!-- period -->
                                <span class="reports__period">

                                    Média request

                                </span>

                            </div>

                            <!-- body -->
                            <div class="reports__body">

                                <!-- total -->
                                <span class="reports__total">

                                    {{ number_format($totalMedias->media_request, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- dashboard -->
    <section class="modules">

        <!-- container -->
        <div class="container">

            <!-- row -->
            <div class="row g-4">

                <!-- column -->
                <div class="col-12 col-xl-6">

                    <!-- chart -->
                    <div class="chart">

                        <!-- canvas -->
                        <canvas id="chartByConsumers"></canvas>

                    </div>

                </div>

                <!-- column -->
                <div class="col-12 col-xl-6 d-flex">

                    <!-- orders -->
                    <div class="chart flex-fill">

                        <!-- chart -->
                        <canvas id="chartByServices"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection

<!-- scripts -->
@section('scripts')

<!-- layouts -->
<script src="/adm/assets/js/layouts/l-home.js"></script>

@endsection
