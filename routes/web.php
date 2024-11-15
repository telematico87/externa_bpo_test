<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí puedes registrar las rutas web para tu aplicación. Estas rutas son
| cargadas por el RouteServiceProvider dentro de un grupo que contiene
| el grupo de middleware "web". ¡Ahora crea algo genial!
|
*/

// Rutas de tareas (Frontend)
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Listar tareas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Formulario de creación
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Guardar tarea
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Formulario de edición
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Actualizar tarea
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Eliminar tarea

// Ruta para obtener usuario autenticado (API)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

