<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// --- 1. Rutas Públicas (Cualquiera entra) ---
Route::prefix('autenticacion')->group(function () {
    Route::post('iniciar-sesion', [AuthController::class, 'login']);
    // Aquí iría Route::post('registro', ...) para usuarios públicos en el futuro
    Route::post('registrar', [AuthController::class, 'register']);
});

// --- 2. Rutas Protegidas (Necesitas Token "Bearer") ---
Route::middleware('auth:sanctum')->group(function () {
    
    // Ver mis propios datos
    Route::get('autenticacion/perfil', [AuthController::class, 'perfil']);

    // --- ZONA ADMIN (Solo Admin) ---
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('dashboard', function () {
            return response()->json(['mensaje' => 'Hola Admin, tienes control total.']);
        });
        // Aquí iría: crear roles, borrar usuarios, etc.
    });

    // --- ZONA TÉCNICA (Técnicos Y Supervisores) ---
    // Usamos pipe '|' para decir "uno U otro".
    Route::prefix('tecnica')->middleware('role:tecnico|supervisor|admin')->group(function () {
        Route::get('ordenes-trabajo', function () {
            return response()->json(['mensaje' => 'Listado de órdenes de trabajo (Visible para Técnico y Supervisor)']);
        });
    });

    // --- ZONA SUPERVISIÓN (Solo Supervisores) ---
    Route::prefix('supervision')->middleware('role:supervisor|admin')->group(function () {
        Route::get('auditoria', function () {
            return response()->json(['mensaje' => 'Auditoría de calidad (Solo Supervisor)']);
        });
    });

    // --- ZONA REPORTES (Solo Reporter) ---
    Route::prefix('reportes')->middleware('role:reporter|admin')->group(function () {
        Route::get('mensuales', function () {
            return response()->json(['mensaje' => 'Descarga de excel/pdf (Solo Reporter)']);
        });
    });
});