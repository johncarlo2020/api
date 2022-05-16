<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\GalleryController;


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

// From stock
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public routes

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/addnote',[NotesController::class,'addNotes']);
Route::post('/getnotes/{id}',[NotesController::class,'getNotes']);
Route::post('/deletenote/{id}',[NotesController::class,'deleteNote']);
Route::post('/addimg/{id}',[GalleryController::class,'addimg']);
Route::post('/getimg/{id}',[GalleryController::class,'getimg']);



// Protected routes

Route::group(['middleware'=>['auth:sanctum']], function(){

    //User
    Route::get('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);

});