<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TaskController;
use App\Models\User;
use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:sanctum')->group(function () {
    // Rutas para manejar tareas (API)
    Route::apiResource('tasks', TaskController::class);
});


Route::post('/login', function (Request $request) 
{     // Validamos los valores a recibir
    
    $request->validate([ 'email'   => 'required|email',    'password'    => 'required'  ]);     
    // Obtenemos al usuario a autenticar
    $user = User::where('email', $request->email)->first(); 
    
    if (! $user || ! Hash::check($request->password, $user->password)) 
    {        
        return response()->json(['error' => 'Unauthorized'], 401);
    }   
  
        
     $token = $user->createToken('YourAppName')->plainTextToken;  // Crear el token

     return response()->json(['token' => $token]);  // Retornar el token
                        
});

Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->get('/tasks', [TaskController::class, 'index']);
Route::middleware('auth:sanctum')->post('/tasks', [TaskController::class, 'store']);
Route::middleware('auth:sanctum')->get('/tasks/{id}', [TaskController::class, 'show']);
Route::middleware('auth:sanctum')->put('/tasks/{id}', [TaskController::class, 'update']);
Route::middleware('auth:sanctum')->delete('/tasks/{id}', [TaskController::class, 'destroy']);
