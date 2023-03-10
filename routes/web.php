<?php

use App\Http\Controllers\DataGajiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('data');
});


Route::get('/formgaji', function () {
    return view('form');
});

Route::controller(DataGajiController::class)->group(function () {
    Route::get('/', 'index')->name('data.index');
    Route::get('/formgaji', 'create')->name('form.show');
    Route::post('/formgaji', 'store')->name('formgaji');
});
// Route::post('/formgaji', [DataGajiController::class, 'store'])->name('formgaji');
