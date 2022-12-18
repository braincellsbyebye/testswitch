<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlaskController;

Route::get('flasks', [FlaskController::class, 'index']);
Route::get('add-item', [FlaskController::class, 'create']);
Route::post('add-item', [FlaskController::class, 'store']);
Route::get('edit/{id}', [FlaskController::class, 'edit']);
Route::put('update/{id}', [FlaskController::class, 'update']);
Route::delete('delete/{id}', [FlaskController::class, 'destroy']);
Route::get('/search', [FlaskController::class, 'search']);

Route::get('/', function () {
    return view('welcome');
});
