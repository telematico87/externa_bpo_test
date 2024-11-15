
# Externa BPO Test

Este es un proyecto basado en el framework Laravel diseñado para demostrar funcionalidades básicas de una API REST para la gestión de tareas, incluyendo autenticación de usuarios y gestión de tareas mediante tokens de acceso.

## Requisitos del Sistema

Antes de instalar y ejecutar este proyecto, asegúrate de tener los siguientes requisitos instalados:

- **PHP**: Versión 8.1 o superior
- **Composer**: Versión 2.0 o superior
- **Laravel**: Versión 9.x o superior
- **Base de Datos**: MySQL o MariaDB
- **Node.js**: Versión 14.x o superior (opcional, para manejar assets front-end)
- **Servidor Web**: Apache, Nginx o Laravel Sail

## Instalación

Sigue los pasos a continuación para instalar y ejecutar el proyecto:

### 1. Clona el Repositorio

Clona este repositorio en tu máquina local:

```bash
git clone https://github.com/telematico87/externa_bpo_test.git
cd externa_bpo_test
```
### 2. Instalacion de dependencias

Ejecuitar Dependencias

```bash
composer install

```

### 3. Instalacion de dependencias

Configurar el env

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=externa_bpo_test
DB_USERNAME=root
DB_PASSWORD=


```

### 4. Generar la Clave de Aplicación

Configurar el env

```bash
php artisan key:generate

```

### 5. Ejecutar Migración

Configurar el env

```bash
php artisan migrate

```
### 6. Iniciar el Servidor Local

Configurar el env

```bash
php artisan serve


```
## Routas definidas
```bash
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); // Listar tareas
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Formulario de creación
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Guardar tarea
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Formulario de edición
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Actualizar tarea
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Eliminar tarea

[
![imagen](https://github.com/user-attachments/assets/e69ae714-32f8-406b-95d0-8815e3ee78bc)](https://github.com/telematico87/externa_bpo_test/blob/main/dasboard.png)

```
## APIS Implementadas

### 1 .Registro

Configurar el env

```bash
Registro de Usuario

    Ruta: /api/register
    Método: POST
    Parámetros:

{
  "name": "Nombre del usuario",
  "email": "correo@example.com",
  "password": "contraseña123",
  "password_confirmation": "contraseña123"
}

```
### 2 .Inicio Sesión

```bash
Registro de Usuario

    Ruta: /api/register
    Método: POST
    Parámetros:

{
  "name": "Nombre del usuario",
  "email": "correo@example.com",
  "password": "contraseña123",
  "password_confirmation": "contraseña123"
}

```

### 3 .Listar tareas

```bash
Listar Tareas

    Ruta: /api/tasks
    Método: GET
    Encabezados:

Authorization: Bearer {token}

```
### 4 .Crear tareas

```bash
Crear Tarea

    Ruta: /api/tasks
    Método: POST
    Parámetros:

{
  "dni": 12345678,
  "title": "Título de la tarea",
  "description": "Descripción de la tarea",
  "due_date": "2024-12-31",
  "status": "pending"
}
```
### 5 .Actualizar tareas

```bash


Actualizar Tarea

    Ruta: /api/tasks/{id}
    Método: PUT
    Parámetros:

{
  "dni": 12345678,
  "title": "Nuevo título de la tarea",
  "description": "Nueva descripción",
  "due_date": "2024-12-31",
  "status": "completed"
}

```

### 6 .Eliminar tareas

```bash


Actualizar Tarea

    Ruta: /api/tasks/{id}
    Método: PUT
    Parámetros:

{
  "dni": 12345678,
  "title": "Nuevo título de la tarea",
  "description": "Nueva descripción",
  "due_date": "2024-12-31",
  "status": "completed"
}

```


