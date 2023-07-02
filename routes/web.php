<?php
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/seleccionar/proyecto/{id}', [App\Http\Controllers\HomeController::class, 'selectProject'])->name('home');

Route::get('/reportar',[App\Http\Controllers\IncidentController::class, 'create'])->name('report');
Route::post('/reportar',[App\Http\Controllers\IncidentController::class, 'store'])->name('report');

Route::group(['middleware'=>'admin','namespace'=>'Admin'],function(){
    //Usuarios
    Route::get('/usuarios',[App\Http\Controllers\Admin\UserController::class, 'index'])->name('users');
    Route::post('/usuarios',[App\Http\Controllers\Admin\UserController::class, 'store'])->name('users');
    Route::get('/usuarios/{id}', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('users');
    Route::post('/usuarios/{id}',[App\Http\Controllers\Admin\UserController::class, 'update'])->name('users');
    Route::get('/usuarios/{id}/eliminar', [App\Http\Controllers\Admin\UserController::class, 'delete'])->name('users');
    //Proyectos
    Route::get('/proyectos',[App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects');
    Route::post('/proyectos',[App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects');
    Route::get('/proyecto/{id}',[App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects');
    Route::post('/proyecto/{id}',[App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects');
    Route::get('/proyecto/{id}/eliminar',[App\Http\Controllers\Admin\ProjectController::class, 'delete'])->name('projects');
    Route::get('/proyecto/{id}/restaurar',[App\Http\Controllers\Admin\ProjectController::class, 'restore'])->name('projects');
    //Categoia
    Route::post('/categorias',[App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('category');
    Route::post('/categoria/editar',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category');
    Route::get('/categoria/{id}/eliminar',[App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('category');

    //Level
    Route::post('/niveles',[App\Http\Controllers\Admin\LevelController::class, 'store'])->name('Levels');
    Route::post('/nivel/editar',[App\Http\Controllers\Admin\LevelController::class, 'update'])->name('Levels');
    Route::get('/nivel/{id}/eliminar',[App\Http\Controllers\Admin\LevelController::class, 'delete'])->name('Levels');

    //Project-User
    Route::post('/proyecto-usuario',[App\Http\Controllers\Admin\ProjectUserController::class, 'store'])->name('ProjectUser');
    Route::get('/proyecto-usuario/{id}/eliminar',[App\Http\Controllers\Admin\ProjectUserController::class, 'delete'])->name('ProjectUser');
    Route::get('/config',[App\Http\Controllers\Admin\ConfigController::class, 'index'])->name('config');
});