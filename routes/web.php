<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;


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

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'checkLogin']);

Route::get('/register',[AuthController::class,'register']);
Route::post('/register',[AuthController::class,'storeUser']);

Route::get('/', [ContentController::class,'index']);

Route::middleware(['auth.admin'])->group(function(){
    Route::get('/create', [ContentController::class,'createBlog']);
    Route::post('/blog/store',[ContentController::class,'storeBlog']);
    Route::put('/blog/update/{id}',[ContentController::class,'updateBlog']);
    Route::get('/blog/edit/{id}',[ContentController::class,'editBlog']);
    Route::post('/logout',[AuthController::class,'logout']);
});


