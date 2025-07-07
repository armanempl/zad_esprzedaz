<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandleAPIController;
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HandleAPIController::class, 'showForm']);
Route::post('/pet/create', [HandleAPIController::class, 'store']);
Route::get('/pet/show', [HandleAPIController::class, 'get']);
Route::post('/pet/update', [HandleAPIController::class, 'update']);
Route::post('/pet/delete', [HandleAPIController::class, 'delete']);
