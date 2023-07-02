<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Almacena una nueva categoría.
     */

    public function store (Request $request){
        // Validar que el campo 'name' no esté vacío
        $this->validate($request, [
    		'name' => 'required'
    	], [
    		'name.required' => 'Es necesario ingresar un nombre para la categoría.'
    	]);
        // Crear una nueva instancia del modelo Category y llenar los datos con los valores del formulario
    	Category::create($request->all());
    	return back();

    }
    //Actualiza una categoría existente.
	public function update(Request $request)
    {
        // Validar que el campo 'name' no esté vacío
        $this->validate($request, [
            'name' => 'required'
        ], [
            'name.required' => 'Es necesario ingresar un nombre para la categoría.'
        ]);

        // Obtener el ID de la categoría desde el formulario
        $category_id = $request->input('category_id');

        // Buscar la categoría en la base de datos utilizando el ID
        $category = Category::find($category_id);

        // Actualizar el nombre de la categoría con el valor del formulario
        $category->name = $request->input('name');
        $category->save();

        return back();
    }
	public function delete($id)
    {
        // Buscar la categoría en la base de datos utilizando el ID y eliminarla
        Category::find($id)->delete();
        return back();
    }
}
