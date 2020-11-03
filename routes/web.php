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
use App\Http\Controllers\MitraController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IslandController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Storage;

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
    Route::get('/island', [IslandController::class, 'index'])->name('island');

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
// Route::post('/addSection', [SectionController::class, 'store'])->name('addSection');
// Route::get('/editSection/{id}', [SectionController::class, 'edit'])->name('editSection');
// Route::post('/updateSection/{id}', [SectionController::class, 'update'])->name('updateSection');
// Route::get('/deleteSection/{id}', [SectionController::class, 'destroy'])->name('deleteSection');

//Route Island
Route::post('/addIsland', [IslandController::class, 'store'])->name('addIsland');
Route::get('/editIsland/{id}', [IslandController::class, 'edit'])->name('editIsland');
Route::post('/updateIsland/{id}', [IslandController::class, 'update'])->name('updateIsland');
Route::get('/deleteIsland/{id}', [IslandController::class, 'destroy'])->name('deleteIsland');
Route::post('/importIsland', [IslandController::class, 'fileImport'])->name('file-import');
Route::get('/exportIsland', [IslandController::class, 'fileExport'])->name('file-export');

// Route TypePlace
Route::post('/addTypePlace', [TypePlaceController::class, 'store'])->name('addTypePlace');
Route::get('/editTypePlace/{id}', [TypePlaceController::class, 'edit'])->name('editTypePlace');
Route::post('/updateTypePlace/{id}', [TypePlaceController::class, 'update'])->name('updateTypePlace');
Route::get('/deleteTypePlace/{id}', [TypePlaceController::class, 'destroy'])->name('deleteTypePlace');
Route::post('/importType', [TypePlaceController::class, 'fileImport'])->name('file-import');
Route::get('/exportType', [TypePlaceController::class, 'fileExport'])->name('file-export');

// Route Place
Route::get('/addPlace', [PlaceController::class, 'create']);
Route::post('/addPlace', [PlaceController::class, 'store'])->name('addPlace');
Route::get('/showPlace/{id}', [PlaceController::class, 'show'])->name('showPlace');
Route::get('/editPlace/{id}', [PlaceController::class, 'edit'])->name('editPlace');
Route::post('/updatePlace/{id}', [PlaceController::class, 'update'])->name('updatePlace');
Route::get('/deletePlace/{id}', [PlaceController::class, 'destroy'])->name('deletePlace');
Route::get('/changeActive', [PlaceController::class, 'change'])->name('changeActive');
Route::post('/file-import', [PlaceController::class, 'fileImport'])->name('file-import');
Route::get('/exportPlace', [PlaceController::class, 'fileExport'])->name('file-export');

// Route Profile
Route::get('/showProfile', [ProfileController::class, 'show'])->name('profile');
Route::post('/updateProfile/{id}', [ProfileController::class, 'update'])->name('updateProfile');
Route::get('/changePassword', [ProfileController::class, 'changePassword'])->name('changePassword');
Route::post('/changePassword', [ProfileController::class, 'changePasswordProccess'])->name('changePasswordProccess');

//Route Comment
Route::get('/showComment', [CommentController::class, 'index'])->name('showComment');
Route::get('/detailComment/{id}', [CommentController::class, 'edit'])->name('detailComment');
Route::post('/updateComment/{id}', [CommentController::class, 'update'])->name('updateComment');
Route::get('/deleteComment/{id}', [CommentController::class, 'destroy'])->name('deleteComment');

//Route Contact
Route::get('/showContact', [ContactController::class, 'index'])->name('showContact');
Route::get('/deleteContact/{id}', [ContactController::class, 'destroy'])->name('deleteContact');
Route::get('/detailContact/{id}', [ContactController::class, 'show'])->name('detailComment');
Route::post('/sendEmail', [ContactController::class, 'send'])->name('sendEmail');

Route::get('/images', function () {
    $images = [];
    $files = Storage::disk('gcs')->files('images');
    foreach ($files as $file) {
        $images[] = [
            'name' => str_replace('images/', '', $file),
            'src' => Storage::disk('gcs')->url($file)
        ];
    }
    return response()->json($images);
});
