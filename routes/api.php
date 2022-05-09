<?php

use App\Http\Controllers\api\ApiProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\api\ApiNewsController;
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

Route::get("/users",[UserController::class,"index"]);
Route::post("/users",[UserController::class,"store"]);
Route::put("/users/{user}",[UserController::class,"update"]);
Route::delete("/users/{user}",[UserController::class,"destroy"]);
Route::apiResource("news",ApiNewsController::class);
Route::apiResource("projects",ApiProjectController::class);
Route::apiResource("team",\App\Http\Controllers\Api\ApiTeamController::class);
Route::apiResource("report",\App\Http\Controllers\Api\ReportsController::class);
Route::apiResource("slider",\App\Http\Controllers\Api\MainSliderController::class);
Route::apiResource("common",\App\Http\Controllers\Api\CommonController::class);

