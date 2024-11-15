<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar todas las tareas
    public function index()
    {
        $tasks = Task::all();
        return response()->json($tasks);
    }

    // Mostrar una tarea específica
    public function show($id)
    {
        $task = Task::findOrFail($id);
        return response()->json($task);
    }

    // Crear una nueva tarea
    public function store(Request $request)
    {
        $request->validate([
            'dni' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task = Task::create($request->all());
        return response()->json($task, 201);
    }

    // Actualizar una tarea existente
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'dni' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    // Eliminar una tarea
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return response()->json(null, 204);
    }
}