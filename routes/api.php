<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\userLog;
use App\Http\Controllers\DocumentController;




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
Route::post('/addAppleAccount',[AuthController::class,'addAppleAccount']);
Route::get('/getAppleAccount',[AuthController::class,'getAppleAccount']);
Route::post('/addlog',[UserLog::class,'addlog']);
Route::post('/password/email',[ForgotPasswordController::class,'forgot']);
Route::post('/password/reset',[ForgotPasswordController::class,'reset']);
Route::post('/updateAppleAccountEmail',[AuthController::class,'updateAppleAccountEmail']);


Route::group(['middleware'=>['auth:sanctum']], function(){   

    //User
    Route::post('/edit-user',[AuthController::class,'edituser']);
    Route::post('/changePhoto',[AuthController::class,'updateProfileImage']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/user',[AuthController::class,'user']);
    Route::get('/requestAccountRemoval',[AuthController::class,'requestedDeleteAccount']);

    //gallery
    Route::post('/store-file', [DocumentController::class,'store']);
    Route::get('/view-file/{id}', [DocumentController::class,'view']);
    Route::post('/delete-file/{id}', [DocumentController::class,'delete']);
        
    //notes
    Route::post('/addnote',[NotesController::class,'addNotes']);
    Route::get('/getnotes/{id}',[NotesController::class,'getNotes']);
    Route::post('/deletenote/{id}',[NotesController::class,'deleteNote']);
    Route::post('/editnote/{id}',[NotesController::class,'editNotes']);
    // Protected routes


    
   

    
});