<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Level;

class LevelController extends Controller
{
    //Obtener todos los niveles por ID de proyecto
    public function byProject($id)
    {
        return Level::where('project_id', $id)->get();
    }
    //------------Almacenar un nuevo nivel
    public function store(Request $request)
    {
    	// Validar que se proporcione un nombre para el nivel
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Es necesario ingresar un nombre para el nivel.'
        ]);

        // Crear un nuevo nivel con los datos proporcionados
        Level::create($request->all());

        // Redireccionar de vuelta a la página anterior
        return back();
    }
    //---------Actualizar un nivel existente
    public function update(Request $request)
    {
        // Validar que se proporcione un nombre para el nivel
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Es necesario ingresar un nombre para el nivel.'
        ]);

        $level_id = $request->input('level_id');

        // Encontrar el nivel por su ID y actualizar el nombre
        $level = Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();

        // Redireccionar de vuelta a la página anterior
        return back();
    }
    //-------------Eliminar un nivel
    public function delete($id)
    {
        // Encontrar el nivel por su ID y eliminarlo
        Level::find($id)->delete();
        return back();
    }
}
