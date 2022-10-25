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

            <!-- clear -->
            <button class="modules__clear js-logs-clear" title="Limpar">

                <!-- icon -->
                <i class="ri-delete-bin-6-line modules__icon--plus"></i>

                <!-- button -->
                <span class="modules__legend--button">

                    Limpar

                </span>

            </button>

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

                            Autor

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Ação

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Descrição

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Level

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            Data

                        </th>

                        <!-- column -->
                        <th class="datagrid__column">

                            <!-- empty -->

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

                            {{ ($log->user()->first_name ?? '') }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->action }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ $log->description }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            <!-- badget -->
                            <span
                                class="datagrid__badge badge {{ ($log->level == 'info' ? 'bg-primary' : ($log->level == 'warning' ? 'bg-warning' : ($log->level == 'danger' ? 'bg-danger' : ($log->level == 'critical' ? 'bg-dark' : 'bg-light')))) }} {{ ($log->level != 'warning' ? 'text-light' : 'text-dark') }}">

                                <!-- level -->
                                {{ $log->level }}

                            </span>

                        </td>

                        <!-- data -->
                        <td class="datagrid__data">

                            {{ date('d/m H:i', strtotime($log->created_at)) }}

                        </td>

                        <!-- data -->
                        <td class="datagrid__data datagrid__actions">

                            <!-- button -->
                            <button class="datagrid__button js-data-remove"
                                data-action="/admin/logs/destroy/{{ $log->id }}">

                                <!-- icon -->
                                <i class="ri-delete-bin-6-line modules__icon"></i>

                            </button>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </form>

    </div>

</section>

@endsection
