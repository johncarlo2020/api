<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard',[AuthController::class,'userlist'])->middleware(['auth'])->name('dashboard');
Route::get('/dashboard/{id}',[AuthController::class,'userpreview'])->middleware(['auth'])->name('preview');
Route::get('/dashboard/activate/{id}',[AuthController::class,'activate'])->middleware(['auth'])->name('activate');
Route::get('/dashboard/deactivate/{id}',[AuthController::class,'deactivate'])->middleware(['auth'])->name('deactivate');
Route::get('/dashboard/deleteAccount/{id}',[AuthController::class,'deleteAccount'])->middleware(['auth'])->name('deleteAccount');
Route::get('/dashboard/activateSubscription/{id}',[AuthController::class,'activateSubscription'])->middleware(['auth'])->name('activateSubscription');
Route::get('/dashboard/deactivateSubscription/{id}',[AuthController::class,'deactivateSubscription'])->middleware(['auth'])->name('deactivateSubscription');




require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
