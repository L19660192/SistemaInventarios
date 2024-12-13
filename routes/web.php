<?php
use App\Http\Controllers\DashboardController; // ultimo cambio
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->get('/', function () {
    return view('home');
});
//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');


Auth::routes(); // Usuarios

Route::middleware('auth')->group(function () {
    Route::middleware('auth')
        ->get('/usuarios', [UsuarioController::class, 'listar'])
        ->name('usuarios.listar');
    Route::middleware('auth')
        ->post('/usuarios', [UsuarioController::class, 'guardar'])
        ->name('usuarios.guardar');
    Route::middleware('auth')
        ->get('/usuarios/{usuario_id}/editar', [UsuarioController::class, 'editar'])
        ->name('usuarios.editar');
    Route::middleware('auth')
        ->put('/usuarios/{usuario_id}', [UsuarioController::class, 'actualizar'])
        ->name('usuarios.actualizar');
    Route::middleware('auth')
        ->delete('/usuarios/{usuario_id}', [UsuarioController::class, 'eliminar'])
        ->name('usuarios.eliminar');
});

// Users
Route::middleware('auth')->prefix('productos')->group(function () {
    Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

});

// productos
Route::middleware('auth')->prefix('productos')->group(function () {
    // Rutas para los productos
    Route::get('/', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/create', [ProductoController::class, 'create'])->name('productos.create');
    Route::post('/', [ProductoController::class, 'store'])->name('productos.store');
    Route::get('/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    Route::delete('/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
});
Route::resource('productos', ProductoController::class);
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
//Route::get('/usuarios', [UsuarioController::class, 'listar'])->name('usuarios.listar');
//Route::middleware('auth')->get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'listar'])->name('usuarios.listar');


// Grupo de rutas para Categorías
Route::middleware('auth')->group(function () {
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index'); // Listar
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store'); // Crear
    Route::get('/categorias/{categoria}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit'); // Obtener datos para editar (opcional)
    Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update'); // Actualizar
    Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy'); // Eliminar
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

/*Route::middleware('auth')
    ->get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');
Route::middleware('auth')
    ->get('/projects', [App\Http\Controllers\HomeController::class, 'projects'])
    ->name('projects');
Route::middleware('auth')
    ->get('/Alumnos', [App\Http\Controllers\HomeController::class, 'Alumnos'])
    ->name('Alumnos');
Route::middleware('auth')
    ->get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])
    ->name('projects');
*/
