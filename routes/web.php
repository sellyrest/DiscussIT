<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\Report as AdminReport;
use App\Http\Controllers\Admin\ResponseController as AdminResponseController;
use App\Http\Controllers\Admin\TopicController as AdminTopicController;
use App\Http\Controllers\Admin\TopikKategoriController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Report;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\FollowingController;
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
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::get('/profile/{id}', [DashboardController::class, 'detailProfile']);
    Route::post('/profile/{id}', [DashboardController::class, 'updateProfile'])->name('profile');
    Route::get('/profile/{user}/{following}', [FollowingController::class, 'index'])->name('following.index');
    Route::post('/profile/{user}', [FollowingController::class, 'store'])->name('following.store');
    Route::resource('/saved', SavedController::class);
    Route::resource('/response', ResponseController::class);
    Route::get('/report', [Report::class, 'report']);

    // Rute untuk menampilkan halaman obrolan dengan pengguna tertentu
    Route::get('/chat/{userId}', [ChatController::class, 'show'])->name('chat');

    // Rute untuk mengirim pesan
    Route::post('/send-message', [ChatController::class, 'sendMessage'])->name('send.message');
    Route::resource('/report', Report::class);
    Route::prefix('/admin')->name('admin.')->middleware(AdminMiddleware::class)->group(function() {
        Route::get('/dashboard', [AdminDashboardController::class, 'index']);
        Route::resource('/user', UserController::class);
        Route::get('topic/status/{id}', [AdminTopicController::class, 'status'])->name('topic.status');
        Route::resource('topic', AdminTopicController::class);
        Route::resource('response', AdminResponseController::class);
        Route::resource('topic-category', TopikKategoriController::class);
        Route::resource('report', AdminReport::class);

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
    Route::get('/chat', function () {
        return view('pages.chat');
    });
    



});



// require __DIR__.'/auth.php';
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
