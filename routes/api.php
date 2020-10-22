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

Route::get('/place', [ApiController::class, 'getAllPlace']);
Route::get('/type/{slug}', [ApiController::class, 'getPlacebyType']);
Route::get('/place-type', [ApiController::class, 'getTypePlace']);
Route::get('/place/{slug}', [ApiController::class, 'getPlaceDetail']);

Route::get('/type-place', [ApiController::class, 'getTypePlace']);
Route::get('/eksplorasi', [ApiController::class, 'getEksplorasi']);

Route::get('/get-island', [ApiController::class, 'dataIsland']);

Route::get('/get-data-place', [ApiController::class, 'dataPlace'])->name('dataPlace');
Route::get('/travel-type', [ApiController::class, 'dataType']);
Route::get('/travel-place', [ApiController::class, 'getTravelPlace'])->name('travel-place');
Route::get('/get-data-section', [ApiController::class, 'dataSection'])->name('dataSection');
Route::get('/destinasi-pilihan', [ApiController::class, 'getDestinasiPilihan']);
Route::get('/travel-place/{category}', [ApiController::class, 'getPlaceByTypeId']);
