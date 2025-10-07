

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ProfileController;


Route::get('/rollen', [RolePermissionController::class, 'index'])->middleware('auth');
Route::get('/permissies', [RolePermissionController::class, 'permissions'])->middleware('auth');
Route::post('/rollen/{rol}/permissies', [RolePermissionController::class, 'assignPermission'])->middleware('auth');
Route::post('/gebruikers/{user}/rollen', [RolePermissionController::class, 'assignRole'])->middleware('auth');
Route::get('/gebruikers', [RolePermissionController::class, 'users'])->middleware('auth');

Route::delete('/rollen/{id}', [RolePermissionController::class, 'destroyRol'])->middleware('auth');
Route::delete('/permissies/{id}', [RolePermissionController::class, 'destroyPermissie'])->middleware('auth');
Route::delete('/gebruikers/{id}', [RolePermissionController::class, 'destroyUser'])->middleware('auth');

Route::get('/', function () {
    return redirect()->route('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
