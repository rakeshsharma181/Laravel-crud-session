<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[UserController::class,'index'])->name('user.list');
Route::get('/create',[UserController::class,'create'])->name('user.create');
Route::post('/store',[UserController::class,'store'])->name('user.store');
Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('user.edit');
Route::post('/users/{user}',[UserController::class,'update'])->name('user.update');
Route::get('/users/{user}/delete',[UserController::class,'delete'])->name('user.delete');
Route::get('/users/store',[UserController::class,'submit'])->name('userDataBase.store');
Route::get('/table',[UserController::class,'dynamicColumn']);




