<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Facades\DB;

/**
 * HomeController
 */
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Try
         */
        try {
            /**
             * Total
             */
            $totalLogs = Log::all()->count();

            /**
             * Consumers
             */
            $totalConsumers = DB::table('logs')
                ->groupBy('consumer_id')
                ->get()
                ->count();

            /**
             * Services
             */
            $totalServices = DB::table('logs')
                ->groupBy('service_id')
                ->get()
                ->count();

            /**
             * Medias
             */
            $totalMedias = DB::table('logs')
                ->select(DB::raw('
                    AVG(proxy) AS media_proxy,
                    AVG(gateway) AS media_gateway,
                    AVG(request) AS media_request
                '))
                ->get()
                ->first();

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/home/home',

                [
                    /**
                     * Total
                     */
                    'totalLogs' => $totalLogs,

                    /**
                     * Consumers
                     */
                    'totalConsumers' => $totalConsumers,

                    /**
                     * Services
                     */
                    'totalServices' => $totalServices,

                    /**
                     * Medias
                     */
                    'totalMedias' => $totalMedias
                ]
            );
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }
}
