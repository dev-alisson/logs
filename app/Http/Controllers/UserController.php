<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

/**
 * Models
 */

use App\Models\User;

/**
 * UserController
 */
class UserController extends Controller
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
             * Users
             */
            $users = User::all();

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/users/home',

                /**
                 * Data
                 */
                [
                    /**
                     * Users
                     */
                    'users' => $users
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
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/users/create'
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
                    'phone' => 'unique:users',
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
                    'phone.unique' => 'Telefone já cadastrado',
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
            $user->document = $request->document;
            $user->genre = $request->genre;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);

            /**
             * Avatar
             */
            if ($request->hasFile('avatar')) {
                /**
                 * Name
                 */
                $avatarRequest = $request->file('avatar');
                $avatarExtension = $avatarRequest->extension();
                $avatarName = time() . '.' . $avatarExtension;

                /**
                 * Upload
                 */
                $avatarRequest->move(public_path('uploads/users'), $avatarName);

                /**
                 * Data
                 */
                $user->avatar = "/uploads/users/{$avatarName}";
            }

            /**
             * Save
             */
            $user->save();

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
                'message' => 'Usuário cadastrado!',

                /**
                 * Redirect
                 */
                'redirect' => "/admin/users/edit/{$user->id}"
            ];
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }

    /**
     * Edit
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * Try
         */
        try {
            /**
             * User
             */
            $user = User::find($id);

            /**
             * View
             */
            return view(
                /**
                 * Template
                 */
                'adm/users/edit',

                /**
                 * Data
                 */
                [
                    /**
                     * User
                     */
                    'user' => $user
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
     * Update
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /**
         * Try
         */
        try {
            /**
             * User
             */
            $user = User::find($id);

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
                    'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
                    'phone' => [Rule::unique('users')->ignore($user->id)]
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
                    'phone.unique' => 'Telefone já cadastrado'
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
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->document = $request->document;
            $user->genre = $request->genre;
            $user->email = $request->email;
            $user->phone = $request->phone;

            /**
             * Password
             */
            if ($request->password) {
                /**
                 * Data
                 */
                $user->password = Hash::make($request->password);
            }

            /**
             * Avatar
             */
            if ($request->hasFile('avatar')) {
                /**
                 * Old
                 */
                if ($user->avatar) {
                    /**
                     * Path
                     */
                    $path = public_path($user->avatar);

                    /**
                     * Exists
                     */
                    if (file_exists($path)) {
                        /**
                         * Remove
                         */
                        unlink($path);
                    }
                }

                /**
                 * Name
                 */
                $avatarRequest = $request->file('avatar');
                $avatarExtension = $avatarRequest->extension();
                $avatarName = time() . '.' . $avatarExtension;

                /**
                 * Upload
                 */
                $avatarRequest->move(
                    /**
                     * Path
                     */
                    public_path('uploads/users'),

                    /**
                     * Name
                     */
                    $avatarName
                );

                /**
                 * Data
                 */
                $user->avatar = "/uploads/users/{$avatarName}";
            }

            /**
             * Save
             */
            $user->save();

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
                'message' => 'Usuário atualizado!'
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
             * User
             */
            $user = User::find($id);

            /**
             * Delete
             */
            $user->delete();

            /**
             * Triggers
             */
            return [
                /**
                 * Message
                 */
                'message' => 'Usuário removido com sucesso!'
            ];
        } catch (\Exception $error) {
            /**
             * Error
             */
            return $error->getMessage();
        }
    }
}
