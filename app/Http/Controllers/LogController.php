<?php

namespace App\Http\Controllers;

/**
 * Models
 */

use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogController extends Controller
{
    /**
     * Index
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
             * Logs
             */
            $logs = Log::limit(1000)->get();

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/logs/home',

                /**
                 * Data
                 */
                [
                    /**
                     * Logs
                     */
                    'logs' => $logs
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
     * Store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Try
         */
        try {
            /**
             * Upload
             */
            if ($request->hasFile('file')) {
                /**
                 * File
                 */
                $upload = $request->file('file');

                /**
                 * Upload
                 */
                $upload->move(public_path('uploads/logs'), 'logs.txt');
            } else {
                /**
                 * Response
                 */
                return [
                    /**
                     * Error
                     */
                    'error' => true,

                    /**
                     * Message
                     */
                    'message' => 'Envie o arquivo de logs'
                ];
            }

            /**
             * Path
             */
            $logs = public_path('/uploads/logs/logs.txt');

            /**
             * Exists
             */
            if (file_exists($logs)) {
                /**
                 * Load
                 */
                $file = fopen($logs, 'r');

                /**
                 * Read
                 */
                while (!feof($file)) {
                    /**
                     * Log
                     */
                    $log = new Log;

                    /**
                     * Data
                     */
                    $data = json_decode(fgets($file));

                    /**
                     * Verify :: request
                     */
                    if (isset($data->request)) {
                        /**
                         * Verify
                         */
                        if (isset($data->request->method)) {
                            /**
                             * Method
                             */
                            $log->method = $data->request->method;
                        }

                        /**
                         * Verify
                         */
                        if (isset($data->request->url)) {
                            /**
                             * URL
                             */
                            $log->url = $data->request->url;
                        }
                    }

                    /**
                     * Verify :: authenticated
                     */
                    if (isset($data->authenticated_entity)) {
                        /**
                         * Verify :: consumer_id
                         */
                        if (isset($data->authenticated_entity->consumer_id)) {
                            /**
                             * Verify :: uuid
                             */
                            if (isset($data->authenticated_entity->consumer_id->uuid)) {
                                /**
                                 * Consumer
                                 */
                                $log->consumer_id = $data->authenticated_entity->consumer_id->uuid;
                            }
                        }
                    }

                    /**
                     * Verify :: service
                     */
                    if (isset($data->service)) {
                        /**
                         * Verify :: id
                         */
                        if (isset($data->service->id)) {
                            /**
                             * service
                             */
                            $log->service_id = $data->service->id;
                        }
                    }

                    /**
                     * Verify :: latencies
                     */
                    if (isset($data->latencies)) {
                        /**
                         * Verify :: proxy
                         */
                        if (isset($data->latencies->proxy)) {
                            /**
                             * proxy
                             */
                            $log->proxy = $data->latencies->proxy;
                        }

                        /**
                         * Verify :: gateway
                         */
                        if (isset($data->latencies->kong)) {
                            /**
                             * gateway
                             */
                            $log->gateway = $data->latencies->kong;
                        }

                        /**
                         * Verify :: request
                         */
                        if (isset($data->latencies->request)) {
                            /**
                             * request
                             */
                            $log->request = $data->latencies->request;
                        }
                    }

                    /**
                     * Save
                     */
                    $log->save();
                }

                /**
                 * Close
                 */
                fclose($file);
            }

            /**
             * Response
             */
            return [
                /**
                 * Error
                 */
                'error' => false,

                /**
                 * Message
                 */
                'message' => 'Logs cadastrado!'
            ];
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }

    /**
     * Destroy
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /**
         * Try
         */
        try {
            /**
             * Log
             */
            $log = Log::find($id);

            /**
             * Delete
             */
            $log->delete();

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Log removido!'
            ];
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }

    /**
     * Clear
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        /**
         * Try
         */
        try {
            /**
             * Log
             */
            DB::table('logs')->truncate();

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Logs removidos!'
            ];
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }
}
