<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LogByConsumerExport implements FromCollection, WithColumnWidths
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
            'CONSUMER ID',
            'TOTAL PROXY',
            'TOTAL GATEWAY',
            'TOTAL REQUEST',
        ];

        /**
         * Logs
         */
        $logs = DB::table('logs')
            ->select(DB::raw('
                    consumer_id,
                    SUM(proxy) AS total_proxy,
                    SUM(gateway) AS total_gateway,
                    SUM(request) AS total_request
                '))
            ->groupBy('consumer_id')
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
