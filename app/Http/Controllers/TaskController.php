<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Listar todas las tareas
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

   
    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'dni' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

    
        Task::create($request->all());


        return redirect()->route('tasks.index')->with('success', 'Tarea creada con éxito.');
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, $id)
    {
        
        $request->validate([
            'dni' => 'required|numeric',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

    
        $task = Task::findOrFail($id);
    
        $task->update($request->all());

    
        return redirect()->route('tasks.index')->with('success', 'Tarea actualizada con éxito.');
    }

    // Eliminar una tarea
    public function destroy($id)
    {

        $task = Task::findOrFail($id);
        $task->delete();

    
        return redirect()->route('tasks.index')->with('success', 'Tarea eliminada con éxito.');
    }
}
