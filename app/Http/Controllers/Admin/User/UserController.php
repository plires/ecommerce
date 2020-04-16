<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('admin.users.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formValidated = $this->toValidate($request);
        
        if ($formValidated) {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));

            if ($user->save()) {
                $message = 'El Usuario '. $user->name .' fue agregado exitosamente.';
            } else {
                $message = 'Hubo un problema al agregar el usuario, intente nuevamente por favor.';
            }
            return redirect('admin/users')->with('status', $message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Model User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request['id'] = $user->id; // sumo el ID al request para poder exceptuar al email repetido en la validacion
        $formValidated = $this->toValidateFromEdit($request);
        
        if ($formValidated) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->password = bcrypt($request->input('password'));

            if ($user->save()) {
                $message = 'El Usuario '. $user->name .' fue editado exitosamente.';
            } else {
                $message = 'Hubo un problema al editar el usuario, intente nuevamente por favor.';
            }
            return redirect('admin/users')->with('status', $message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        if ($request->ajax()) {
            if ($user->delete()) {
                $message = 'El Usuario <strong> '. $user->name .' </strong>fue borrado.';
            } else {
                $message = 'Hubo un problema al eliminar el usuario, intente nuevamente mas tarde.';
            }
            return $message;
        }
    }

    public function toValidateFromEdit($request)
    {  
        $messages = [
            'name.required' => 'Ingrese el nombre del usuario.',
            'name.min' => 'El nombre del usuario debe tener mas de 3 caracteres.',
            'email.required' => 'Ingrese el correo del usuario.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe, ingrese otro.',
            'password.required' => 'Ingrese la contraseña del usuario.',
            'password.min' => 'La contraseña del usuario debe tener mas de 5 caracteres.',
            'password.max' => 'La contraseña del usuario no puede ser mayor a 10 caracteres.',
            'password.confirmed' => 'La contraseña del usuario no coincide.',
        ];

        if ($request->password === null) {
            $rules = [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'.$request->id.'',
            ];
        } else {
            $rules = [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email,'.$request->id.'',
                'password' => 'required|min:6|max:10|confirmed',
            ];
        }

        if ($this->validate($request, $rules, $messages)) {
            return true;
        }

    }

    public function toValidate($request)
    {
        $messages = [
            'name.required' => 'Ingrese el nombre del usuario.',
            'name.min' => 'El nombre del usuario debe tener mas de 3 caracteres.',
            'email.required' => 'Ingrese el correo del usuario.',
            'email.email' => 'Ingrese un correo válido.',
            'email.unique' => 'El correo ya existe, ingrese otro.',
            'password.required' => 'Ingrese la contraseña del usuario.',
            'password.min' => 'La contraseña del usuario debe tener mas de 5 caracteres.',
            'password.max' => 'La contraseña del usuario no puede ser mayor a 10 caracteres.',
            'password.confirmed' => 'La contraseña del usuario no coincide.',
        ];
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:10|confirmed',
        ];

        if ($this->validate($request, $rules, $messages)) {
            return true;
        }

    }
}
