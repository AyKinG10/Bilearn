<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return redirect()->route('courses.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/profile/update', [ProfileController::class,'update'])->name('update-profile');
    Route::get('/profile',[ProfileController::class,'index'])->name('index-profile');
});
Route::get('/courses/category/{category}',[CourseController::class, 'coursesByCat'])->name('course.category');
Route::resource('courses',CourseController::class);
Route::resource('categories',CategoryController::class);
