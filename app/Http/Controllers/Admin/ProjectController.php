<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        // Obtener todos los proyectos, incluyendo los deshabilitados
        $projects = Project::withTrashed()->get();
        
        // Devolver la vista 'admin.projects.index' con los proyectos como datos compactos
        return view('admin.projects.index')->with(compact('projects'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario usando las reglas y mensajes definidos en el modelo Project
        $this->validate($request, Project::$rules, Project::$messages);

        // Crear un nuevo proyecto con los datos proporcionados
        Project::create($request->all());

        // Redireccionar de vuelta a la página anterior con una notificación de éxito
        return back()->with('notification', 'El proyecto se ha registrado correctamente.');
    }

    public function edit($id)
    {
        // Buscar el proyecto con el ID proporcionado
        $project = Project::find($id);
        
        // Obtener las categorías y niveles asociados al proyecto
        $categories = $project->categories;
        $levels = $project->levels;
        
        // Devolver la vista 'admin.projects.edit' con el proyecto, categorías y niveles como datos compactos
        return view('admin.projects.edit')->with(compact('project', 'categories', 'levels'));
    }

    public function update($id, Request $request)
    {
        // Validar los datos del formulario usando las reglas y mensajes definidos en el modelo Project
        $this->validate($request, Project::$rules, Project::$messages);
        
        // Actualizar los datos del proyecto con los datos proporcionados
        Project::find($id)->update($request->all());
        
        // Redireccionar de vuelta a la página anterior con una notificación de éxito
        return back()->with('notification', 'El proyecto se ha editado correctamente.');
    }

    public function delete($id)
    {
        // Eliminar el proyecto con el ID proporcionado
        Project::find($id)->delete();
        
        // Redireccionar de vuelta a la página anterior con una notificación de éxito
        return back()->with('notification', 'El proyecto se ha eliminado correctamente.');
    }

    public function restore($id)
    {
        // Restaurar el proyecto con el ID proporcionado (en caso de haber sido deshabilitado previamente)
        Project::withTrashed()->find($id)->restore();

        // Redireccionar de vuelta a la página anterior con una notificación de éxito
        return back()->with('notification', 'El proyecto se ha habilitado correctamente.');
    }
}
