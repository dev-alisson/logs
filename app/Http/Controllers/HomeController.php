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
     * Index.
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

    /**
     * Charts
     *
     * @return \Illuminate\Http\Response
     */
    public function charts()
    {
        /**
         * Try
         */
        try {
            /**
             * Consumers
             */
            $namesConsumers = [];
            $proxysConsumers = [];
            $gatewaysConsumers = [];
            $requestsConsumers = [];

            /**
             * Services
             */
            $namesServices = [];
            $proxysServices = [];
            $gatewaysServices = [];
            $requestsServices = [];

            /**
             * Logs
             */
            $logsByConsumers = DB::table('logs')
                ->select(DB::raw('
                SUBSTR(consumer_id, 1, 8) AS consumer_id,
                SUM(proxy) AS total_proxy,
                SUM(gateway) AS total_gateway,
                SUM(request) AS total_request
            '))
                ->groupBy('consumer_id')
                ->orderBy('total_proxy', 'DESC')
                ->orderBy('total_gateway', 'DESC')
                ->orderBy('total_request', 'DESC')
                ->limit(5)
                ->get();

            /**
             * Logs
             */
            $logsByServices = DB::table('logs')
                ->select(DB::raw('
                    service_name,
                    SUM(proxy) AS total_proxy,
                    SUM(gateway) AS total_gateway,
                    SUM(request) AS total_request
                '))
                ->groupBy('service_id')
                ->orderBy('total_proxy', 'DESC')
                ->orderBy('total_gateway', 'DESC')
                ->orderBy('total_request', 'DESC')
                ->limit(5)
                ->get();

            /**
             * Consumers
             */
            foreach ($logsByConsumers as $consumer) {
                /**
                 * Names
                 */
                $namesConsumers[] = $consumer->consumer_id;

                /**
                 * Proxys
                 */
                $proxysConsumers[] = $consumer->total_proxy;

                /**
                 * Gateways
                 */
                $gatewaysConsumers[] = $consumer->total_gateway;

                /**
                 * Requests
                 */
                $requestsConsumers[] = $consumer->total_request;
            }

            /**
             * Services
             */
            foreach ($logsByServices as $service) {
                /**
                 * Names
                 */
                $namesServices[] = $service->service_name;

                /**
                 * Proxys
                 */
                $proxysServices[] = $service->total_proxy;

                /**
                 * Gateways
                 */
                $gatewaysServices[] = $service->total_gateway;

                /**
                 * Requests
                 */
                $requestsServices[] = $service->total_request;
            }

            /**
             * Data
             */
            return [
                /**
                 * Names
                 */
                'namesConsumers' => $namesConsumers,
                'namesServices' => $namesServices,

                /**
                 * Proxys
                 */
                'proxysConsumers' => $proxysConsumers,
                'proxysServices' => $proxysServices,

                /**
                 * Gateways
                 */
                'gatewaysConsumers' => $gatewaysConsumers,
                'gatewaysServices' => $gatewaysServices,

                /**
                 * Requests
                 */
                'requestsConsumers' => $requestsConsumers,
                'requestsServices' => $requestsServices
            ];
        } catch (\Exception $error) {
            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->critical(
                /**
                 * Action
                 */
                'Erro',

                /**
                 * Message
                 */
                $error->getMessage()
            );
        }
    }
}
