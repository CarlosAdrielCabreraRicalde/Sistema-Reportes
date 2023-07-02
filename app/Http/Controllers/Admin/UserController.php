<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectUser;

class UserController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios con rol de administrador (role = 1)
        $users = User::where('role', 1)->get();
        return view('admin.users.index')->with(compact('users'));
    }

    public function store(Request $request)
    {
        // Definir las reglas de validación para los datos del usuario
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

        // Definir los mensajes de error personalizados para las reglas de validación
        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del usuario.',
            'name.max' => 'El nombre es demasiado extenso.',
            'email.required' => 'Es indispensable ingresar el e-mail del usuario.',
            'email.email' => 'El e-mail ingresado no es válido.',
            'email.max' => 'El e-mail es demasiado extenso.',
            'email.unique' => 'Este e-mail ya se encuentra en uso.',
            'password.required' => 'Olvidó ingresar una contraseña.',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.'
        ];

        // Validar los datos del formulario según las reglas y mensajes definidos
        $this->validate($request, $rules, $messages);

        // Crear una nueva instancia de User y asignar los valores del formulario
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 1;
        $user->save();

        return back()->with('notification', 'Usuario registrado exitosamente.');
    }

    public function edit($id)
    {
        // Obtener el usuario y todos los proyectos
        $user = User::find($id);
        $projects = Project::all();

        // Obtener los proyectos asociados al usuario
        $projects_user = ProjectUser::where('user_id', $user->id)->get();

        return view('admin.users.edit')->with(compact('user', 'projects', 'projects_user'));
    }

    public function update($id, Request $request)
    {
        // Definir las reglas de validación para la actualización del usuario
        $rules = [
            'name' => 'required|max:255',
            'password' => 'min:6'
        ];

        // Definir los mensajes de error personalizados para las reglas de validación
        $messages = [
            'name.required' => 'Es necesario ingresar el nombre del usuario.',
            'name.max' => 'El nombre es demasiado extenso.',
            'password.min' => 'La contraseña debe presentar al menos 6 caracteres.'
        ];

        // Validar los datos del formulario según las reglas y mensajes definidos
        $this->validate($request, $rules, $messages);

        // Obtener el usuario y actualizar los valores del formulario
        $user = User::find($id);
        $user->name = $request->input('name');

        $password = $request->input('password');
        if (!empty($password)) {
            $user->password = bcrypt($password);
        }

        $user->save();

        return back()->with('notification', 'Usuario modificado exitosamente.');
    }

    public function delete($id)
    {
        // Obtener el usuario y eliminarlo
        $user = User::find($id);
        $user->delete();

        return back()->with('notification', 'El usuario se eliminó correctamente.');
    }
}
