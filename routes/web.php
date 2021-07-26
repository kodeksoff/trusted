<?php

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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/user/{user:login}', [\App\Http\Controllers\UserController::class, 'index'])->name('user.show');

Route::get('/testt', [\App\Http\Controllers\TestController::class, 'test']);

Route::get('{path?}', [\App\Http\Controllers\TestController::class, 'category']);
