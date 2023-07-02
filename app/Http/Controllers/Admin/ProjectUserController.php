<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectUser;

class ProjectUserController extends Controller
{
    public function store(Request $request)
    {
    	// El nivel pertenezca al proyecto.
    	// Asegurar que el proyecto exista.
    	// Asegurar que el nivel exista.
    	// Asegurar que el usuario exista.

    	$project_id = $request->input('project_id');
        $user_id = $request->input('user_id');

        // Verificar si el usuario ya pertenece a este proyecto
        $project_user = ProjectUser::where('project_id', $project_id)->where('user_id', $user_id)->first();

        if ($project_user) {
            return back()->with('notification', 'El usuario ya pertenece a este proyecto.');
        }

        // Crear una nueva instancia de ProjectUser
        $project_user = new ProjectUser();
        $project_user->project_id = $project_id;
        $project_user->user_id = $user_id;
        $project_user->level_id = $request->input('level_id');
        $project_user->save();

        return back();
    }

    public function delete($id)
    {
        // Eliminar el ProjectUser con el ID proporcionado
        ProjectUser::find($id)->delete();
        return back();
    }


    
}
