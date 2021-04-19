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

Route::resource('animals', AnimalController::class);
Route::resource('adoptions', AdoptionController::class);
Route::get('/home', [App\Http\Controllers\AnimalController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('my', [App\Http\Controllers\AdoptionController::class, 'myRequests'])->name('my');
Route::get('owners', [App\Http\Controllers\AdoptionController::class, 'owners'])->name('owners');
Route::get('denied', [App\Http\Controllers\AdoptionController::class, 'denied'])->name('denied');
Route::get('homeless', [App\Http\Controllers\AnimalController::class, 'homeless'])->name('homeless');
Route::get('pastAdoptions', [App\Http\Controllers\AdoptionController::class, 'pastAdoptions'])->name('pastAdoptions');
Route::get('approve', [App\Http\Controllers\AdoptionController::class, 'approve'])->name('approve');
Route::get('deny', [App\Http\Controllers\AdoptionController::class, 'deny'])->name('deny');
Route::get('sort', [App\Http\Controllers\AnimalController::class, 'sort'])->name('sort');
Route::get('sortName', [App\Http\Controllers\AnimalController::class, 'sortName'])->name('sortName');
Route::get('sortAdmin', [App\Http\Controllers\AnimalController::class, 'sortAdmin'])->name('sortAdmin');
Route::get('sortNameAdmin', [App\Http\Controllers\AnimalController::class, 'sortNameAdmin'])->name('sortNameAdmin');

