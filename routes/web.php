<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource("/comment", App\Http\Controllers\CommentController::class)->except("create")->middleware("auth");
Route::resource("/post", App\Http\Controllers\PostController::class)->middleware("auth");
Route::prefix("users")
    ->name("users.")
    ->namespace("users")
    ->middleware("auth")
    ->group(function() {
        Route::get('/', [UserController::class, 'index'])->name("index");
        Route::get("/create", [UserController::class, 'create'])->name("create");
        Route::post("/create", [UserController::class, 'store'])->name("store");
    });
