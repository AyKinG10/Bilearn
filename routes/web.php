<?php

use App\Http\Controllers\adm\CategoryController;
use App\Http\Controllers\adm\RoleController;
use App\Http\Controllers\adm\UserController;
use App\Http\Controllers\adm\QuestionsController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TaskController;
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
    Route::get('/courses/{course}/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
    Route::get('/courses/{course}/tasks', [TaskController::class, 'getTasks'])->name('courses.tasks');
    Route::post('/courses/{course}/tasks/store', [TaskController::class, 'store'])->name('tasks.store');
    Route::get('/courses/{course}/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show');
    Route::get('/courses/{course}/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::put('/courses/{course}/tasks/{task}/update', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/courses/{course}/tasks/{task}/destroy', [TaskController::class, 'destroy'])->name('tasks.destroy');

    Route::delete('/courses/{course}',[CourseController::class,'destroy'])->name('courses.destroy');
    Route::get('courses/{course}',[CourseController::class,'show'])->name('courses.show');
    Route::get('/coursesfav', [CourseController::class, 'favorites'])->name('courses.favorite');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{user}', [ChatController::class, 'show'])->name('chat');
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('chat.store')->middleware('auth');
    Route::post('/courses/fav/{course}',[CourseController::class,'courseLike'])->name('course.like');
    Route::resource('questions',QuestionController::class);

    Route::post('/answer',[\App\Http\Controllers\AnswerController::class, 'store'])->name('answer.store');

    Route::post('/courses/vcreate', [LessonController::class, 'store'])->name('lesson.store');
    Route::get('/courses/video/{course}', [LessonController::class,'create'])->name('lesson.create');

    Route::get('/game', [GameController::class, 'index'])->name('game');
    Route::get('/game/{question}', [GameController::class, 'show'])->name('game.show');
    Route::get('/game/create', [GameController::class, 'create'])->name('game.create');
    Route::post('/game/store', [GameController::class, 'store'])->name('game.store');
    Route::post('/game/{question}/check', [GameController::class, 'checkAnswer'])->name('game.check');


    Route::post('/courses/{course}/purchase',[CourseController::class,'purchase'])->name('courses.purchase');
    Route::get('/courses/buy/{course}',[CourseController::class,'buyCourse'])->name('courses.buy');
    // web.php

    Route::get('/purchased-courses', [CourseController::class,'purchasedCourses'])->name('courses.purchased');

    Route::get('/courses/category/{category}',[CourseController::class, 'coursesByCat'])->name('course.category');
    Route::get('/load-messages/{user}', [ChatController::class,'loadMessages'])->name('load-messages');
});

Route::prefix('adm')->as('adm.')->middleware('hasrole:admin,teacher')->group(function (){


    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/search',[UserController::class,'index'])->name('users.search');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');
    Route::put('/users/{user}/ban',[UserController::class,'ban'])->name('users.ban');
    Route::put('/users/{user}/unban',[UserController::class,'unban'])->name('users.unban');
    Route::resource('categories',CategoryController::class);
    Route::resource('questions',QuestionsController::class);
    Route::resource('comments',\App\Http\Controllers\adm\CommentController::class);
    Route::resource('games',\App\Http\Controllers\adm\GameController::class);


    Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
    Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
    Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
    Route::delete('/roles/destroy/{role}',[RoleController::class,'destroy'])->name('roles.destroy');



});





Route::get('/search', [SearchController::class,'index'])->name('searchByCourse');




