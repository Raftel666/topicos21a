<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Models\User;
use \Spatie\Permission\Models\Role;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('usuario.create')->middleware('auth');

Route::get('usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('usuarios');
Route::post('usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('usuarios/{id}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
Route::put('usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
Route::get('usuarios/{id}/show', [UserController::class,'show'])->name('usuarios.show');

Route::get('/dino', function () {
    return view('usuarios.dino');
})->name('dino');

Route::resource("/clientes",ClientController::class);
Route::resource("/proveedores",ProviderController::class);
Route::resource("/productos",ProductController::class);
Route::resource("/ventas",SalesController::class);

// Crear role: php artisan permission:create-role user
//Asignar Role:
/*Route::get('/abc', function () {
    $user = User::findOrFail(3);
    $user->assignRole('user');
    return "Si, simón";
});*/

