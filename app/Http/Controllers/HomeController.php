<?php

namespace App\Http\Controllers;

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
             * Error
             */
            return $error->getMessage();
        }
    }
}
