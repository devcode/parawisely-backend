<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\TypePlaceController;
use App\Http\Controllers\PlaceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\MitraController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [AuthController::class, 'index'])->name('default');
Route::get('/registrasi', [AuthController::class, 'registrasi'])->name('registrasi');
Route::post('procesRegister', [AuthController::class, 'procesRegister'])->name('procesRegister');
Route::get('/map', [MapController::class, 'index'])->name('map');
Route::get('/mapData', [MapController::class, 'dataMap'])->name('mapData');
Route::post('/procesLogin', [AuthController::class, 'procesLogin'])->name('proces');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['AuthEmployee'])->group(function () {
    //Admin Site
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/level', [LevelController::class, 'index'])->name('level');
    Route::get('/section', [SectionController::class, 'index'])->name('section');
    Route::get('/type', [TypePlaceController::class, 'index'])->name('type');
    Route::get('/place', [PlaceController::class, 'index'])->name('place');

    //Mitra Site
    Route::get('/add-place', [MitraController::class, 'index'])->name('mitra');
    Route::get('/data-place', [MitraController::class, 'show_data'])->name('dataPlace');
});

// Route Employee
Route::post('/addEmployee', [EmployeeController::class, 'store'])->name('addEmployee');
Route::get('/editEmployee/{id}', [EmployeeController::class, 'edit'])->name('editEmployee');
Route::post('/updateEmployee/{id}', [EmployeeController::class, 'update'])->name('updateEmployee');
Route::get('/deleteEmployee/{id}', [EmployeeController::class, 'destroy'])->name('deleteEmployee');

// Route Level
Route::post('/addLevel', [LevelController::class, 'store'])->name('addLevel');
Route::get('/editLevel/{id}', [LevelController::class, 'edit'])->name('editLevel');
Route::post('/updateLevel/{id}', [LevelController::class, 'update'])->name('updateLevel');
Route::get('/deleteLevel/{id}', [LevelController::class, 'destroy'])->name('deleteLevel');

// Route Section
Route::post('/addSection', [SectionController::class, 'store'])->name('addSection');
Route::get('/editSection/{id}', [SectionController::class, 'edit'])->name('editSection');
Route::post('/updateSection/{id}', [SectionController::class, 'update'])->name('updateSection');
Route::get('/deleteSection/{id}', [SectionController::class, 'destroy'])->name('deleteSection');

// Route TypePlace
Route::post('/addTypePlace', [TypePlaceController::class, 'store'])->name('addTypePlace');
Route::get('/editTypePlace/{id}', [TypePlaceController::class, 'edit'])->name('editTypePlace');
Route::post('/updateTypePlace/{id}', [TypePlaceController::class, 'update'])->name('updateTypePlace');
Route::get('/deleteTypePlace/{id}', [TypePlaceController::class, 'destroy'])->name('deleteTypePlace');

// Route Place
Route::get('/addPlace', [PlaceController::class, 'create']);
Route::post('/addPlace', [PlaceController::class, 'store'])->name('addPlace');
Route::get('/showPlace/{id}', [PlaceController::class, 'show'])->name('showPlace');
Route::get('/editPlace/{id}', [PlaceController::class, 'edit'])->name('editPlace');
Route::post('/updatePlace/{id}', [PlaceController::class, 'update'])->name('updatePlace');
Route::get('/deletePlace/{id}', [PlaceController::class, 'destroy'])->name('deletePlace');
Route::get('/changeActive', [PlaceController::class, 'change'])->name('changeActive');

// Route Profile
Route::get('/showProfile', [ProfileController::class, 'show'])->name('profile');
Route::post('/updateProfile/{id}', [ProfileController::class, 'update'])->name('updateProfile');
Route::get('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
Route::post('/changePassword', [ProfileController::class, 'changePasswordProccess'])->name('changePasswordProccess');
