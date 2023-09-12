<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ResponseController as AdminResponseController;
use App\Http\Controllers\Admin\TopicController as AdminTopicController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\TopicController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
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



Route::middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('topic', TopicController::class);
    Route::get('/search', [DashboardController::class, 'searchTopic'])->name('search.topic');
    Route::resource('/saved', SavedController::class);
    Route::resource('/response', ResponseController::class);
    Route::prefix('/admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function() {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::resource('/user', UserController::class);
        Route::resource('topic', AdminTopicController::class);
        Route::resource('response', AdminResponseController::class);

    });
    Route::get('/test', function(){
        return view('pages.includes.response-list');
    });
    Route::get('/test2', function(){
        return view('pages.admin.dashboard');
    });
    Route::get('/test3', function(){
        return view('pages.admin.user');
    });
    
    
    Route::get('/yt', function () {
        return view('pages.yourthread');
    });
    
    Route::get('/profile', function () {
        return view('pages.profile');
    });



});



// require __DIR__.'/auth.php';
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
