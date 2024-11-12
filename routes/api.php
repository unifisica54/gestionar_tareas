<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\TareaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::prefix('/tarea')
->name('api.tarea.')
->group(function () {
        Route::post('/index', [TareaController::class, 'index'])->name('index');
        Route::post('/store', [TareaController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [TareaController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [TareaController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [TareaController::class, 'delete'])->name('delete');
    });
Route::prefix('/estado')
->name('api.estado.')
->group(function () {
        Route::post('/index', [EstadoController::class, 'index'])->name('index');
        Route::post('/store', [EstadoController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [EstadoController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [EstadoController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [EstadoController::class, 'delete'])->name('delete');
    });
});