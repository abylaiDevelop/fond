<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class,"index"]);
Route::get('/news/{news:id}', [MainController::class,"show"]);
Route::get('/admin', [MainController::class,"admin"]);
Route::get('/about', [MainController::class,"about"]);
