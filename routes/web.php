
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\ProfileController;

Route::get('/rollen', [RolePermissionController::class, 'index'])->middleware('auth');
Route::get('/permissies', [RolePermissionController::class, 'permissions'])->middleware('auth');
Route::post('/rollen/{rol}/permissies', [RolePermissionController::class, 'assignPermission'])->middleware('auth');
Route::post('/gebruikers/{user}/rollen', [RolePermissionController::class, 'assignRole'])->middleware('auth');

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

require __DIR__.'/auth.php';
