<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/viewone', function () {
//     return view('viewone');
// });

Route::resource('dash', ProjectController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // ruta lleva al index junto a show
    Route::get('/inicio', [ProjectController::class, 'index'])->name('inicio');

    // rutas lleva a crear proyecto
    Route::get('/create', [ProjectController::class, 'create'])->name('create');

    Route::post('/create', [ProjectController::class, 'store'])->name('create');

    // Ruta lleva a edit
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');

    Route::patch('/edit/{id}', [ProjectController::class, 'update'])->name('update');

    // Ruta ejecuta destroy
    Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('destroy');
});
