<?php

use App\Http\Controllers\adm\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('courses.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::post('/profile/update', [ProfileController::class,'update'])->name('update-profile');
    Route::get('/profile',[ProfileController::class,'index'])->name('index-profile');
    Route::resource('comments',CommentController::class)->only('store','edit','update','destroy');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::put('/courses/{course}',[CourseController::class,'update'])->name('courses.update');
    Route::get('/courses/{course}/edit',[CourseController::class,'edit'])->name('courses.edit');
    Route::delete('/courses/{course}',[CourseController::class,'destroy'])->name('courses.destroy');
    Route::get('courses/{course}',[CourseController::class,'show'])->name('courses.show');
    Route::get('/courses/favorites',[CourseController::class, 'favorites'])->name('courses.favorite');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('chat.store')->middleware('auth');
    Route::post('/courses/{course}/courseLike',[CourseController::class,'courseLike'])->name('course.like');
    Route::get('/questions', [QuestionController::class, 'index'])->name('question.index');
    Route::get('/questions/{question}', [QuestionController::class, 'show'])->name('question.show');
    Route::get('/questions/create', [QuestionController::class, 'create'])->name('question.create');
    Route::post('/questions', [QuestionController::class, 'store'])->name('question.store');
    Route::delete('/questions/{question}',[QuestionController::class,'destroy'])->name('question.destroy');

    Route::post('/answer',[\App\Http\Controllers\AnswerController::class, 'store'])->name('answer.store');

    Route::post('/courses/vcreate', [LessonController::class, 'store'])->name('lesson.store');
    Route::get('/courses/video/{course}', [LessonController::class,'create'])->name('lesson.create');

    Route::get('/game', [GameController::class, 'index']);
    Route::get('/game/{question}', [GameController::class, 'show'])->name('game.show');
    Route::post('/game/{question}/check', [GameController::class, 'checkAnswer'])->name('game.check');
});
Route::get('/courses/category/{category}',[CourseController::class, 'coursesByCat'])->name('course.category');
Route::get('/load-messages/{user}', [ChatController::class,'loadMessages'])->name('load-messages');
Route::resource('categories',CategoryController::class);
Route::get('/search', [SearchController::class,'index'])->name('searchByCourse');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
