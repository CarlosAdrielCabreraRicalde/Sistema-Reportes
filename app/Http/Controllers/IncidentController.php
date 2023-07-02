<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Incident;
use App\Models\Project;
use App\Models\ProjectUser;

class IncidentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        // Obtener el incidente correspondiente al ID proporcionado
        $incident = Incident::findOrFail($id);
        $messages = $incident->messages;

        // Devolver la vista "show" con el incidente y sus mensajes asociados
        return view('incidents.show')->with(compact('incident', 'messages'));
    }

    public function create()
    {
        // Obtener las categorías del proyecto con ID 1 (se asume que es el proyecto predeterminado)
        $categories = Category::where('project_id', 1)->get();

        // Devolver la vista "report" con las categorías obtenidas
        return view('report')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'sometimes|nullable|exists:categories,id',
            'severity' => 'required|in:M,N,A',
            'title' => 'required|min:5',
            'description' => 'required|min:15'
        ];

        $messages = [
            'category_id.exists' => 'La categoría seleccionada no existe en la base de datos.',
            'title.required' => 'Es necesario ingresar un título.',
            'title.min' => 'El título debe tener al menos 5 caracteres.',
            'description.required' => 'Es necesario ingresar una descripción para la incidencia.',
            'description.min' => 'La descripción debe tener al menos 15 caracteres.'
        ];

        // Validar los datos recibidos según las reglas y mensajes definidos
        $this->validate($request, $rules, $messages);

        // Crear una nueva instancia de Incident y asignar los valores correspondientes
        $incident = new Incident();
        $incident->category_id = $request->input('category_id') ?: null;
        $incident->severity = $request->input('severity');
        $incident->title = $request->input('title');
        $incident->description = $request->input('description');
        $incident->client_id = auth()->user()->id;
        $incident->save();

        // Devolver al formulario anterior
        return back();
    }
}
