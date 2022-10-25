<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */

use App\Models\User;
use App\Models\Log;

/**
 * AuthController
 */
class AuthController extends Controller
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
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Acesso',

                /**
                 * Message
                 */
                'Acessou formulário de login'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/auth/login'
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
     * Create
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**
         * Try
         */
        try {
            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Acesso',

                /**
                 * Message
                 */
                'Acessou formulário de cadastro de usuários'
            );

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/auth/register'
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
     * Register
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        /**
         * Try
         */
        try {
            /**
             * Validate
             */
            $validator = Validator::make(
                /**
                 * Data
                 */
                $request->all(),

                /**
                 * Rules
                 */
                [
                    'first_name' => 'required|min:3',
                    'last_name' => 'required|min:3',
                    'email' => 'required|email|unique:users',
                    'password' => 'required|min:6'
                ],

                /**
                 * Messages
                 */
                [
                    'first_name.required' => 'Informe o nome',
                    'first_name.min' => 'Nome muito curto',
                    'last_name.required' => 'Informe o sobrenome',
                    'last_name.min' => 'Sobrenome muito curto',
                    'email.required' => 'Informe o e-mail',
                    'email.email' => 'Informe um e-mail válido',
                    'email.unique' => 'E-mail já cadastrado',
                    'password.required' => 'Informe a senha',
                    'password.min' => 'Senha muito curta',
                ]
            );

            /**
             * Verify
             */
            if ($validator->fails()) {
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
                    'message' => $validator->errors()->first()
                ];
            }

            /**
             * User
             */
            $user = new User;

            /**
             * Data
             */
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);

            /**
             * Save
             */
            $user->save();

            /**
             * Auth
             */
            Auth::login($user);

            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Cadastro',

                /**
                 * Message
                 */
                "Usuário ID :: {$user->id} cadastrado"
            );

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
                'message' => 'Bem-vindo!',

                /**
                 * Redirect
                 */
                'redirect' => "/admin/users/edit/{$user->id}"
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
     * Remember
     *
     * @return \Illuminate\Http\Response
     */
    public function remember()
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
                'adm/auth/remember'
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
     * Login
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        /**
         * Try
         */
        try {
            /**
             * Validate
             */
            $validator = Validator::make(
                /**
                 * Data
                 */
                $request->all(),

                /**
                 * Rules
                 */
                [
                    'email' => 'required',
                    'password' => 'required'
                ],

                /**
                 * Messages
                 */
                [
                    'email.required' => 'Informe o e-mail',
                    'password.required' => 'Informe a senha'
                ]
            );

            /**
             * Verify
             */
            if ($validator->fails()) {
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
                    'message' => $validator->errors()->first()
                ];
            }

            /**
             * Data
             */
            $email = $request->email;
            $password = $request->password;
            $remember = true;

            /**
             * Credentials
             */
            $credentials = [
                /**
                 * E-mail
                 */
                'email' => $email,

                /**
                 * Password
                 */
                'password' => $password
            ];

            /**
             * Attempt
             */
            if (Auth::attempt($credentials, $remember)) {
                /**
                 * Session
                 */
                $request->session()->regenerate();

                /**
                 * Log
                 */
                $log = new Log;

                /**
                 * Level
                 */
                $log->info(
                    /**
                     * Action
                     */
                    'Login',

                    /**
                     * Message
                     */
                    'Usuário ID :: ' . Auth::user()->id . ' efetuou login'
                );

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
                    'message' => 'Bem-vindo!',

                    /**
                     * Redirect
                     */
                    'redirect' => "/admin"
                ];
            } else {
                /**
                 * Response
                 */
                return [
                    /**
                     * Message
                     */
                    'message' => 'Dados inválidos!',

                    /**
                     * Error
                     */
                    'error' => true
                ];
            }
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
     * Logout
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        /**
         * Try
         */
        try {
            /**
             * Log
             */
            $log = new Log;

            /**
             * Level
             */
            $log->info(
                /**
                 * Action
                 */
                'Logout',

                /**
                 * Message
                 */
                'Usuário ID :: ' . Auth::user()->id . ' efetuou logout'
            );

            /**
             * Logout
             */
            Auth::logout();

            /**
             * Session
             */
            $request->session()->invalidate();
            $request->session()->regenerateToken();
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
