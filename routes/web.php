<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CredentialController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index']);

Route::get('/login', [HomeController::class,'login']);
Route::get('/register', [HomeController::class,'register']);

Route::post('/register', [UserController::class,'store']);
Route::post('/login', [AuthController::class,'login']);


Route::middleware(['auth'])->group(function(){
    Route::post('/logout', [AuthController::class,'logout']);

    Route::get('/manage',[CredentialController::class,'index']);
    Route::get('/credential',[CredentialController::class,'create']);

    Route::post('/credential',[CredentialController::class,'store']);

    Route::delete('/credential/{credential}',[CredentialController::class,'destroy']);
});
