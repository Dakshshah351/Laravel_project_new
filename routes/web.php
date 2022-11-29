<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\AddfacultyController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BaseController::class, 'index']);
Route::get('/about/{name}/{lname}', [BaseController::class, 'about']);
Route::get('user-info',[BaseController::class, 'userInfo']);
Route::post('user-info',[BaseController::class, 'userInfoCreate']);
Route::get('register1',[RegisterController::class, 'index']);
Route::post('register1',[RegisterController::class, 'store']);
Route::delete('register1/{id}',[RegisterController::class, 'destroy']);
Route::get('register1/{id}/edit',[RegisterController::class, 'edit']);
Route::put('register1/{id}',[RegisterController::class,'update']);
Route::get('addfaculty',[AddfacultyController::class, 'index']);
Route::post('addfaculty',[AddfacultyController::class, 'store']);
Route::delete('addfaculty/{id}',[AddfacultyController::class, 'destroy']);
Route::get('addfaculty/{id}/edit',[AddfacultyController::class, 'edit']);
Route::put('addfaculty/{id}',[AddfacultyController::class,'update']);
Auth::routes();
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home');
});
Route::middleware(['auth', 'user-access:Faculty'])->group(function () {
  
    Route::get('/Faculty/home', [App\Http\Controllers\HomeController::class, 'FacultyHome'])->name('Faculty.home');
});
 