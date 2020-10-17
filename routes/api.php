<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sample', function () {
    return "text";
});

Route::get('/sample2', [ApiController::class, 'index'])->name('sample');
Route::get('/get-data-place', [ApiController::class, 'dataPlace'])->name('dataPlace');

Route::get('/travel-place', [ApiController::class, 'getTravelPlace'])->name('travel-place');
