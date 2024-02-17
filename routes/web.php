<?php

use App\Http\Controllers\RestroController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => "web"], function () {
    Route::get('/', [RestroController::class, 'index']);

    Route::get('/list', [RestroController::class, 'list']);

    Route::post('/list', [RestroController::class, 'add']);

    Route::get('/delete/{id}', [RestroController::class, 'remove']);

    Route::get('edit/{id}', [RestroController::class, 'edit']);

    Route::post('/list', [RestroController::class, 'update']);



    Route::get('/login', function () {
        return view('login');
    });

    Route::get('/signup', function () {
        return view('signup');
    });

    Route::post('/signup', [RestroController::class, 'signup']);

    
});

Route::post('/login', [RestroController::class, "login"]);











