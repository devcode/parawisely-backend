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

Route::get('/get-data-place', [ApiController::class, 'dataPlace'])->name('dataPlace');
<<<<<<< HEAD

Route::get('/travel-place', [ApiController::class, 'getTravelPlace'])->name('travel-place');
=======
Route::get('/get-data-type', [ApiController::class, 'dataType'])->name('dataType');
>>>>>>> 003be4129b15852855b393e036cb6c9891ff368b
