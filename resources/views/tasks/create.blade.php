@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Tarea</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="dni">DNI</label>
            <input type="text" id="dni" name="dni" class="form-control" value="{{ old('dni') }}" required>
            @error('dni')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
            @error('title')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea id="description" name="description" class="form-control" required>{{ old('description') }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="due_date">Fecha de Vencimiento</label>
            <input type="date" id="due_date" name="due_date" class="form-control" value="{{ old('due_date') }}" required>
            @error('due_date')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="status">Estado</label>
            <select id="status" name="status" class="form-control" required>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pendiente</option>
                <option value="in_progress" {{ old('status') == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completada</option>
            </select>
            @error('status')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
