<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LogByServiceExport implements FromCollection, WithColumnWidths
{
    public function columnWidths(): array
    {
        return [
            'A' => 45,
            'B' => 17,
            'C' => 17,
            'D' => 17,
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        /**
         * Columns
         */
        $columns = [
            'SERVICE ID',
            'TOTAL PROXY',
            'TOTAL GATEWAY',
            'TOTAL REQUEST',
        ];

        /**
         * Logs
         */
        $logs = DB::table('logs')
            ->select(DB::raw('
                    service_id,
                    SUM(DISTINCT(proxy)) AS total_proxy,
                    SUM(DISTINCT(gateway)) AS total_gateway,
                    SUM(DISTINCT(request)) AS total_request
                '))
            ->groupBy('service_id')
            ->orderBy('total_proxy', 'DESC')
            ->orderBy('total_gateway', 'DESC')
            ->orderBy('total_request', 'DESC')
            ->get();

        /**
         * Prepend
         */
        $logs->prepend(
            /**
             * Columns
             */
            $columns
        );

        /**
         * Return
         */
        return $logs;
    }
}
