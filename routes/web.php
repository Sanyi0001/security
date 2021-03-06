<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HomeController;

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
// Route::resource('/car', CarController::class)->middleware(['auth']); //this is needed because some weird bug on heroku, will be removed soon
Route::resource('/cars', CarController::class)->middleware(['auth']);

Route::resource('/', HomeController::class);

require __DIR__.'/auth.php';
