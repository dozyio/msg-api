<?php

use App\Http\Controllers\MessageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/messages', [MessageController::class, 'index', 'as' => 'message.index']);
Route::get('/messages/{message}', [MessageController::class, 'show', 'as' => 'message.show'])->whereNumber('message');
Route::post('/messages', [MessageController::class, 'store', 'as' => 'message.store']);
