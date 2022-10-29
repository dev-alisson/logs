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

                <!-- export -->
                <div class="modules__export">

                    <button class="modules__download modules__download--open" data-bs-toggle="modal"
                        data-bs-target="#reportsModal">

                        <!-- icon -->
                        <i class="ri-download-line modules__icon--plus"></i>

                        Exportar

                    </button>

                </div>

                <!-- upload -->
                <form class="modal fade js-export" id="reportsModal" action="/admin/users/store">

                    <!-- csrf -->
                    @csrf

                    <!-- dialog -->
                    <div class="modal-dialog modal-lg">

                        <!-- content -->
                        <div class="modal-content">

                            <!-- header -->
                            <div class="modal-header">

                                <!-- title -->
                                <h5 class="modal-title" id="reportsModalLabel">

                                    Selecione o modelo

                                </h5>

                                <!-- button -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- body -->
                            <div class="modal-body">

                                <!-- export -->
                                <div class="modules__export d-flex justify-content-center">

                                    <a class="modules__download modules__download--consumer"
                                        href="{{ route('reports.consumer') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modules__icon--plus"></i>

                                        Por consumidor

                                    </a>

                                    <a class="modules__download modules__download--service"
                                        href="{{ route('reports.service') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modules__icon--plus"></i>

                                        Por serviço

                                    </a>

                                    <a class="modules__download modules__download--media"
                                        href="{{ route('reports.media') }}">

                                        <!-- icon -->
                                        <i class="ri-download-line modules__icon--plus"></i>

                                        Tempo médio

                                    </a>

                                </div>

                            </div>

                            <!-- footer -->
                            <div class="modal-footer">

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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

                            <!-- footer -->
                            <div class="reports__footer">

                                <!-- -->

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
                        <canvas id="chartLogs01"></canvas>

                    </div>

                </div>

                <!-- column -->
                <div class="col-12 col-xl-6 d-flex">

                    <!-- orders -->
                    <div class="chart flex-fill">

                        <!-- chart -->
                        <canvas id="chartLogs02"></canvas>

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
