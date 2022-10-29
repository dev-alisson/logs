<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;

class LogByMediaExport implements FromCollection, WithColumnWidths
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
            'MÉDIA PROXY',
            'MÉDIA GATEWAY',
            'MÉDIA REQUEST',
        ];

        /**
         * Logs
         */
        $logs = DB::table('logs')
            ->select(DB::raw('
                    service_id,
                    AVG(proxy) AS media_proxy,
                    AVG(gateway) AS media_gateway,
                    AVG(request) AS media_request
                '))
            ->groupBy('service_id')
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
