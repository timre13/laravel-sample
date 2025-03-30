<?php

use App\Http\Controllers\ElemController;
use App\Http\Controllers\KategoriaController;
use Illuminate\Support\Facades\Route;

Route::get('/kategoriak', [KategoriaController::class, "index"]);
Route::post('/kategoriak', [KategoriaController::class, "store"]);
Route::get('/kategoriak/{id}', [KategoriaController::class, "show"]);

Route::get('/elemek', [ElemController::class, "index"]);
Route::post('/elemek', [ElemController::class, "store"]);
Route::delete('/elemek/{id}', [ElemController::class, "destroy"]);
Route::patch('/elemek/{id}', [ElemController::class, "update"]);