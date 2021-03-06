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


//Route Place
Route::get('/map', [ApiController::class, 'map']);
Route::get('/place', [ApiController::class, 'getAllPlace']);
Route::get('/places', [ApiController::class, 'getPlacePagination']);
Route::get('/place/type/{id}', [ApiController::class, 'getPlaceByType']);
Route::get('/place-type', [ApiController::class, 'getTypePlace']);
Route::get('/place/{slug}', [ApiController::class, 'getPlaceDetail']);
Route::get('/type/{slug}', [ApiController::class, 'getPlacebyType']);
Route::get('/get-data-place', [ApiController::class, 'dataPlace'])->name('dataPlace');
Route::get('/travel-place', [ApiController::class, 'getTravelPlace'])->name('travel-place');
Route::get('/travel-place/{category}', [ApiController::class, 'getPlaceByTypeId']);

//Route Type
Route::get('/type-place', [ApiController::class, 'getTypePlace']);
Route::get('/travel-type', [ApiController::class, 'dataType']);
Route::get('/ck-type', [ApiController::class, 'getPlacebyTypeCk']);

//Route Eksplorasi
Route::get('/eksplorasi', [ApiController::class, 'getEksplorasi']);

//Route Island
Route::get('/island', [ApiController::class, 'dataIsland']);
Route::get('/wisata-daerah', [ApiController::class, 'wisataDaerah']);
Route::get('/wisata-daerah/{islandId}/{idPlace}', [ApiController::class, 'wisataDaerahLah']);
Route::get('/wisata-daerah/{slug}', [ApiController::class, 'wisataDaerahDetail']);

//Route Section
Route::get('/get-data-section', [ApiController::class, 'dataSection'])->name('dataSection');

//Route Destinasi
Route::get('/destinasi-pilihan', [ApiController::class, 'getDestinasiPilihan']);

//Route Comment
Route::get('/getComment/{place_id}', [ApiController::class, 'getComment']);
Route::post('/sendComment', [ApiController::class, 'sendComment']);
Route::post('/sendContact', [ApiController::class, 'sendContact']);

// Route SearchPlace
Route::get("/search/{query}", [ApiController::class, 'getSearch']);
