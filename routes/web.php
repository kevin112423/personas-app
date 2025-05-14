<?php

use App\Http\Controllers\ComunaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/comunas', [ComunaController::class, 'index']);
Route::post('/comunas', [ComunaController::class, 'store']);
Route::get('/comunas/create', [ComunaController::class, 'create']);
Route::delete ('/comunas/{comuna}', [ComunaController::class,'destroy']);
Route::put ('/comunas/{comuna}', [ComunaController::class,'update']);
