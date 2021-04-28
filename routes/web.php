<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AdoptionController;

Route::resource('animals', AnimalController::class);
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
    return view('welcome');
});

// Route::get('display', ' App\Http\Controllers\AnimalController@display')
//     ->name('display_animal');


Auth::routes();

Route::resource('animals', AnimalController::class)->middleware('auth');
Route::resource('adoptions', AdoptionController::class)->middleware('auth');
Route::get('/home', [App\Http\Controllers\AnimalController::class, 'index'])->name('home')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// Route::get('my', [App\Http\Controllers\AdoptionController::class, 'myRequests'])->name('my');
Route::get('owners', [App\Http\Controllers\AdoptionController::class, 'owners'])->name('owners')->middleware('auth');
Route::get('denied', [App\Http\Controllers\AdoptionController::class, 'denied'])->name('denied')->middleware('auth');
Route::get('homeless', [App\Http\Controllers\AnimalController::class,
'homeless'])->name('homeless')->middleware('auth');
Route::get('pastAdoptions', [App\Http\Controllers\AdoptionController::class,
'pastAdoptions'])->name('pastAdoptions')->middleware('auth');
Route::get('approve', [App\Http\Controllers\AdoptionController::class, 'approve'])->name('approve')->middleware('auth');
Route::get('deny', [App\Http\Controllers\AdoptionController::class, 'deny'])->name('deny')->middleware('auth');
Route::get('sort', [App\Http\Controllers\AnimalController::class, 'sort'])->name('sort')->middleware('auth');
Route::get('sortName', [App\Http\Controllers\AnimalController::class,
'sortName'])->name('sortName')->middleware('auth');
Route::get('sortAdmin', [App\Http\Controllers\AnimalController::class,
'sortAdmin'])->name('sortAdmin')->middleware('auth');
Route::get('sortNameAdmin', [App\Http\Controllers\AnimalController::class, 'sortNameAdmin'])->name('sortNameAdmin')->middleware('auth');

