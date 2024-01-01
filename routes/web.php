<?php

use App\Http\Controllers\customAuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// CUSTOM LogIn AUTHENTICATION SYSTEM
Route::get('/login',[customAuthController::class,'logIn'])->middleware('alreadyLoggedIn');
Route::get('/registration',[customAuthController::class,'registration'])->middleware('alreadyLoggedIn');
Route::post('/registration/registerUser',[customAuthController::class,'registerUser']);
Route::post('/registration/loginUser',[customAuthController::class,'loginUser']);
Route::get('/dashboard',[customAuthController::class,'dashboard'])->middleware('isLoggedIn');
Route::get('/logout',[customAuthController::class,'logout']);

