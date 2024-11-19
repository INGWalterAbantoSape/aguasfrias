<?php
use Illuminate\Support\Facades\Route;

// pagina inicio del proyecto
Route::view('/', 'welcome');

// detalle de usuario
Route::view('profile', 'profile')->middleware(['auth', 'verified'])->name('profile');
// vistas del aplicativo
Route::view('principal', 'aplicativo.principal')->middleware(['auth', 'verified'])->name('principal');
// Route::view('dashboard', 'aplicativo.principal')->middleware(['auth', 'verified'])->name('dashboard');
Route::view('cliente', 'aplicativo.cliente')->middleware(['auth', 'verified'])->name('cliente');
Route::view('servicio', 'aplicativo.servicio')->middleware(['auth', 'verified'])->name('servicio');
Route::view('asignacion', 'aplicativo.asignacion')->middleware(['auth', 'verified'])->name('asignacion');
Route::view('pago', 'aplicativo.pago')->middleware(['auth', 'verified'])->name('pago');
Route::view('premio', 'aplicativo.premio')->middleware(['auth', 'verified'])->name('premio');
Route::view('iot', 'aplicativo.iot')->middleware(['auth', 'verified'])->name('internet');

// rutas para el administrador
// rutas para el trabajador de la empresa
Route::middleware(['auth', 'nivel:employee'])->group(function(){
    // Route::get('/saludo2', [PruebaController::class, 'index'])->name('index');
});



require __DIR__ . '/auth.php';
