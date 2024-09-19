<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\jadwalController;
use App\Http\Controllers\ProfileController;
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

Route::get('/a', function () {
    return view('welcome');
});

Route::get('/jadwal',[jadwalController::class, 'index'])->middleware('auth:crew');
Route::get('/',[AuthController::class, 'index']);
Route::post('/login',[AuthController::class, 'login']);


require __DIR__.'/auth.php';
