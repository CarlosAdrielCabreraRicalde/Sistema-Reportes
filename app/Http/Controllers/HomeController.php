<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Incident;
use App\Models\ProjectUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = auth()->user();
        $selected_project_id = $user->selected_project_id;

        if ($selected_project_id) {
            // Verificar si el usuario es de tipo "soporte"
            if ($user->is_support) {
                // Obtener los incidentes asignados al usuario como soporte en el proyecto seleccionado
                $my_incidents = Incident::where('project_id', $selected_project_id)
                    ->where('support_id', $user->id)
                    ->get();

                // Obtener la relación entre el usuario y el proyecto seleccionado
                $projectUser = ProjectUser::where('project_id', $selected_project_id)
                    ->where('user_id', $user->id)
                    ->first();

                if ($projectUser) {
                    // Obtener los incidentes pendientes que corresponden al nivel del usuario
                    $pending_incidents = Incident::where('support_id', null)
                        ->where('level_id', $projectUser->level_id)
                        ->get();
                } else {
                    $pending_incidents = collect(); // Colección vacía cuando no hay un proyecto asociado
                }
            }

            // Obtener los incidentes creados por el usuario cliente en el proyecto seleccionado
            $incidents_by_me = Incident::where('client_id', $user->id)
                ->where('project_id', $selected_project_id)
                ->get();
        } else {
            // Caso en el que no se ha seleccionado ningún proyecto
            $my_incidents = [];
            $pending_incidents = [];
            $incidents_by_me = [];
        }

        // Devolver la vista "home" con los incidentes correspondientes
        return view('home')->with(compact('my_incidents', 'pending_incidents', 'incidents_by_me'));
    }

    public function selectProject($id)
    {
        // Obtener el usuario autenticado y actualizar el proyecto seleccionado
        $user = auth()->user();
        $user->selected_project_id = $id;
        $user->save();

        return back();
    }  
}
