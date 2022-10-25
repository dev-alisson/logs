<?php

namespace App\Http\Controllers;

/**
 * Models
 */

use App\Models\Log;
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
            $logs = Log::all();

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
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->danger(
                /**
                 * Action
                 */
                'Remoção',

                /**
                 * Message
                 */
                "Limpeza de logs"
            );

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
