<?php

namespace App\Http\Controllers;

/**
 * Models
 */

use App\Exports\LogByMediaExport;
use App\Exports\LogByServiceExport;
use App\Exports\LogByConsumerExport;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * Consumer
     *
     * @return \Illuminate\Http\Response
     */
    public function consumer()
    {
        /**
         * Try
         */
        try {
            /**
             * Export
             */
            return Excel::download(new LogByConsumerExport, 'logs.xlsx');
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }

    /**
     * Service
     *
     * @return \Illuminate\Http\Response
     */
    public function service()
    {
        /**
         * Try
         */
        try {
            /**
             * Export
             */
            return Excel::download(new LogByServiceExport, 'logs.xlsx');
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }

    /**
     * Media
     *
     * @return \Illuminate\Http\Response
     */
    public function media()
    {
        /**
         * Try
         */
        try {
            /**
             * Export
             */
            return Excel::download(new LogByMediaExport, 'logs.xlsx');
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }
}
