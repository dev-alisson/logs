<?php

namespace App\Http\Controllers;

/**
 * Models
 */

use App\Models\Log;

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
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/home/home'
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
}
